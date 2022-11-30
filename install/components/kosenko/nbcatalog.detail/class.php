<?php

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

class NbcatalogDetail extends CBitrixComponent
{
    private function checkModules()
    {
        if (!Main\Loader::includeModule('kosenko.notebookshop')) {
            throw new Main\LoaderException(Loc::getMessage('NBSHOP_MODULE_NOT_INSTALLED'));
        }
    }

    private function selectData()
    {
        $this->arResult = [];

        $result = Kosenko\notebookshop\NotebookTable::getByCode($this->arParams["CODE"]);
        if ($data = $result->fetch()) {
            $this->arResult = $data;
        } else {
            // TODO: 404
        }

        $params = [
            'select'  => array('VALUE', "OPTION.NAME"),
            'order'   => array('OPTION.NAME' => 'ASC'),
            'filter' => ["NOTEBOOK_ID" => $this->arResult["ID"]]
        ];
        $resultOptions = Kosenko\notebookshop\NotebookOptionTable::getList(
            $params
        );
        $this->arResult["OPTIONS"] = [];
        while ($row = $resultOptions->fetch()) {
            $this->arResult["OPTIONS"][] = [
                "NAME" => $row["KOSENKO_NOTEBOOKSHOP_NOTEBOOK_OPTION_OPTION_NAME"],
                "VALUE" =>  $row["VALUE"]
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
