<?php

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;
use Kosenko\notebookshop\VendorTable;

class Nbcatalog extends CBitrixComponent
{
    private function checkModules()
    {
        if (!Main\Loader::includeModule('kosenko.notebookshop')) {
            throw new Main\LoaderException(Loc::getMessage('NBSHOP_MODULE_NOT_INSTALLED'));
        }
    }

    public function executeComponent()
    {
        $this->includeComponentLang('class.php');
        $this->checkModules();

        if ($this->arParams['SEF_MODE'] != 'Y') {
            throw new Main\LoaderException("Только в режиме ЧПУ");
        }

        $arVariables = $arComponentVariables = $arVariableAliases = [];

        // определим страницу компонента по шаблону
        $componentPage = CComponentEngine::ParseComponentPath(
            $this->arParams['SEF_FOLDER'],
            $this->arParams['SEF_URL_TEMPLATES'],
            $arVariables
        );

        // если не определено и юрл совбадает с базовой папкой
        if ($componentPage === false) {
            $requestURL = Bitrix\Main\Context::getCurrent()->getRequest()->getRequestedPageDirectory();
            if ($requestURL == $this->arParams['SEF_FOLDER']) {
                  $componentPage = 'vendors';
            }
        }

        CComponentEngine::initComponentVariables(
            $componentPage,
            $arComponentVariables,
            $arVariableAliases,
            $arVariables
        );

        $this->arResult = array(
            "FOLDER" => $this->arParams["SEF_FOLDER"],
            "VARIABLES" => $arVariables,
        );
        $this->includeComponentTemplate($componentPage);
    }
}
