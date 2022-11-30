<?php

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

class NbcatalogSection extends CBitrixComponent
{
    private function checkModules()
    {
        if (!Main\Loader::includeModule('kosenko.notebookshop')) {
            throw new Main\LoaderException(Loc::getMessage('NBSHOP_MODULE_NOT_INSTALLED'));
        }
    }

    private function selectData()
    {


        /*$iterator = $nav->getOffset();
        while ($iterator < $nav->getOffset()+$nav->getLimit()) {
            $this->arResult["ROWS"][] = [
                "data" => [
                    "ID" => $iterator,
                    "NAME" => "Вендор " . $iterator
                ]
            ];
            $iterator++;
        }*/
        $this->arResult = [];
        $this->arResult["ROWS"] = [];

        switch ($this->arParams["ENTITY_TYPE"]) {
            case "VENDOR":
                $entityClass = "Kosenko\\notebookshop\\VendorTable";
                break;
            case "MODEL":
                $entityClass = "Kosenko\\notebookshop\\ModelTable";
                $entityParentClass = "Kosenko\\notebookshop\\VendorTable";
                $filterField = "VENDOR_ID";
                break;
            case "NOTEBOOK":
                $entityClass = "Kosenko\\notebookshop\\NotebookTable";
                $entityParentClass = "Kosenko\\notebookshop\\ModelTable";
                $filterField = "MODEL_ID";
                break;
            default:
                throw new Main\LoaderException("Неверно указана сущность");
        }

        $grid_options = new Bitrix\Main\Grid\Options($this->arParams["ENTITY_TYPE"]);
        $sort = $grid_options->GetSorting(['sort' => ['ID' => 'ASC'], 'vars' => ['by' => 'by', 'order' => 'order']]);
        $nav_params = $grid_options->GetNavParams();
        $nav = new Bitrix\Main\UI\PageNavigation($this->arParams["ENTITY_TYPE"]);
        $nav->allowAllRecords(true)
            ->setPageSize($nav_params['nPageSize'])
            ->initFromUri();

        $this->arResult["NAV"] = $nav;
        $select = array_merge($this->arParams["HEADERS"], ["CODE"]);

        $params = [
            'select'  => $select,
            'order'   => $sort["sort"],
            'count_total' => true,
            'limit'   => $nav->getLimit(),
            'offset'  => $nav->getOffset(),
        ];

        if ($this->arParams["CODE"] != "") {
            $resultParent = $entityParentClass::getByCode($this->arParams["CODE"]);
            if ($parent = $resultParent->fetch()) {
                $this->arResult["PARENT"] = $parent;
            } else {
                // TODO: 404
                return;
            }
            if (isset($filterField)) {
                $params["filter"] = [$filterField => $this->arResult["PARENT"]["ID"]];
            }
        }

        $result = $entityClass::getList($params);
        $this->arResult["TOTAL"] = $result->getCount();
        $nav->setRecordCount($this->arResult["TOTAL"]);


        $this->arResult["HEADERS"] = [];
        foreach ($this->arParams["HEADERS"] as $header) {
            $this->arResult["HEADERS"][] = [
                'id' => $header,
                'name' => $header,
                'sort' => $header,
                'default' => true
            ];
        }

        while ($row = $result->fetch()) {
            // TODO: переделать формирование юрлов по человечески
            switch ($this->arParams["ENTITY_TYPE"]) {
                case "VENDOR":
                    $row["LINK"] = $this->arParams["SEF_FOLDER"] . $row["CODE"] . "/";
                    break;
                case "MODEL":
                    $row["LINK"] = $this->arParams["SEF_FOLDER"] . $this->arParams["CODE"] . "/" . $row["CODE"] . "/";
                    break;
                case "NOTEBOOK":
                    $row["LINK"] = $this->arParams["SEF_FOLDER"] . "detail/" . $row["CODE"] . "/";
                    break;
                default:
                    throw new Main\LoaderException("Неверно указана сущность");
            }



            $row["NAME"] = "<a href=\"" . $row["LINK"] . "\">" . $row["NAME"] . "</a>";
            $this->arResult["ROWS"][] = [
                "data" => $row,
                'actions' => [
                    [
                        'text'    => 'Открыть',
                        'onclick' => 'document.location.href="' . $row["LINK"] . '"'
                    ],
                ],
            ];
        }
    }
    public function executeComponent()
    {
        $this->includeComponentLang('class.php');
        $this->checkModules();
        $this->selectData();
        $this->includeComponentTemplate();
    }
}
