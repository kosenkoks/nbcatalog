<?php

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Entity\Base;

Loc::loadMessages(__FILE__);

class kosenko_notebookshop extends \CModule
{
    public function __construct()
    {
        $arModuleVersion = [];
        include __DIR__ . '/version.php';

        $this->MODULE_ID            = "kosenko.notebookshop";
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = Loc::getMessage("IBSNOTEBOOKSHOP_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("IBSNOTEBOOKSHOP_DESCRIPTION");
        $this->MODULE_SORT = 0;
        $this->PARTNER_NAME = Loc::getMessage("IBSNOTEBOOKSHOP_AUTHOR");
        $this->PARTNER_URI = "mailto: kirill@kosenko.pro";
        $this->MODULE_GROUP_RIGHTS = "Y";
    }

    public function doInstall()
    {
        global $APPLICATION;

        $request = Application::getInstance()->getContext()->getRequest();

        // проверяем, что версия ядра поддерживает D7
        if (CheckVersion(ModuleManager::getVersion("main"), "14.00.00")) {
            // шаг 1
            if ($request["step"] == 1 || !isset($request["step"])) {
                $APPLICATION->IncludeAdminFile(
                    sprintf(
                        '%s %s',
                        Loc::getMessage("IBSNOTEBOOKSHOP_INSTALL_TITLE"),
                        Loc::getMessage("IBSNOTEBOOKSHOP_NAME")
                    ),
                    __DIR__ . "/step1.php"
                );
            } elseif ($request["step"] == 2) {
                ModuleManager::registerModule($this->MODULE_ID);

                if ($request["deletetables"] == "Y") {
                    $this->unInstallDB();
                }
                $this->installFiles();
                $this->installDB();

                $APPLICATION->IncludeAdminFile(
                    sprintf(
                        '%s %s',
                        Loc::getMessage("IBSNOTEBOOKSHOP_INSTALL_TITLE"),
                        Loc::getMessage("IBSNOTEBOOKSHOP_NAME")
                    ),
                    __DIR__ . "/step2.php"
                );
            }
        } else {
            $APPLICATION->ThrowException(
                Loc::getMessage("IBSNOTEBOOKSHOP_INSTALL_ERROR_VERSION")
            );
        }

        return false;
    }

    public function installDB()
    {
        Loader::includeModule($this->MODULE_ID);


        $tables = [
            [
                "connection" => Application::getConnection(Kosenko\notebookshop\VendorTable::getConnectionName()),
                "name" => Base::getInstance('Kosenko\notebookshop\VendorTable')->getDBTableName(),
                "instance" => Base::getInstance('Kosenko\notebookshop\VendorTable')
            ],
            [
                "connection" => Application::getConnection(Kosenko\notebookshop\OptionTable::getConnectionName()),
                "name" => Base::getInstance('Kosenko\notebookshop\OptionTable')->getDBTableName(),
                "instance" => Base::getInstance('Kosenko\notebookshop\OptionTable')
            ],
            [
                "connection" => Application::getConnection(Kosenko\notebookshop\NotebookTable::getConnectionName()),
                "name" => Base::getInstance('Kosenko\notebookshop\NotebookTable')->getDBTableName(),
                "instance" => Base::getInstance('Kosenko\notebookshop\NotebookTable')
            ],
            [
                "connection" => Application::getConnection(Kosenko\notebookshop\ModelTable::getConnectionName()),
                "name" => Base::getInstance('Kosenko\notebookshop\ModelTable')->getDBTableName(),
                "instance" => Base::getInstance('Kosenko\notebookshop\ModelTable')
            ],
            [
                "connection" => Application::getConnection(Kosenko\notebookshop\NotebookOptionTable::getConnectionName()),
                "name" => Base::getInstance('Kosenko\notebookshop\NotebookOptionTable')->getDBTableName(),
                "instance" => Base::getInstance('Kosenko\notebookshop\NotebookOptionTable')
            ],
        ];

        foreach ($tables as $table) {
            if (!$table["connection"]->isTableExists($table["name"])) {
                $table["instance"]->createDbTable();
            }
        }

        // заполенени тестовой инфой
        $testData = [];

        include(__DIR__ . "/testdata.php");

        $generateCode = function ($name) {
            return Cutil::translit($name, "ru", ["replace_space" => "-","replace_other" => "-"]);
        };

        foreach ($testData["VENDORS"] as $item) {
            \Kosenko\notebookshop\VendorTable::add([
                "ID" => $item["ID"],
                "NAME" => $item["NAME"],
                "CODE" => $generateCode($item["NAME"])
            ]);
        }

        foreach ($testData["MODELS"] as $item) {
            \Kosenko\notebookshop\ModelTable::add([
                "ID" => $item["ID"],
                "NAME" => $item["NAME"],
                "CODE" => $generateCode($item["NAME"]),
                "VENDOR_ID" => $item["VENDOR_ID"]
            ]);
        }

        foreach ($testData["NOTEBOOKS"] as $item) {
            \Kosenko\notebookshop\NotebookTable::add([
                "ID" => $item["ID"],
                "NAME" => $item["NAME"],
                "YEAR" => $item["YEAR"],
                "PRICE" => $item["PRICE"],
                "CODE" => $generateCode($item["NAME"]),
                "MODEL_ID" => $item["MODEL_ID"]
            ]);
        }

        foreach ($testData["OPTIONS"] as $item) {
            \Kosenko\notebookshop\OptionTable::add([
                "ID" => $item["ID"],
                "NAME" => $item["NAME"],
            ]);
        }

        foreach ($testData["NOTEBOOK_OPTIONS"] as $item) {
            foreach ($item["OPTIONS"] as $optionId => $value) {
                \Kosenko\notebookshop\NotebookOptionTable::add([
                    "NOTEBOOK_ID" => $item["NOTEBOOK_ID"],
                    "OPTION_ID" => $optionId,
                    "VALUE" => $value
                ]);
            }
        }
    }

    public function doUninstall()
    {

        global $APPLICATION;

        $request = Application::getInstance()->getContext()->getRequest();

        if ($request["step"] == 1 || !isset($request["step"])) {
            $APPLICATION->IncludeAdminFile(
                sprintf(
                    '%s %s',
                    Loc::getMessage("IBSNOTEBOOKSHOP_INSTALL_TITLE"),
                    Loc::getMessage("IBSNOTEBOOKSHOP_NAME")
                ),
                __DIR__ . "/unstep1.php"
            );
        } elseif ($request["step"] == 2) {
            if ($request["deletetables"] == "Y") {
                $this->unInstallDB();
            }
            ModuleManager::unRegisterModule($this->MODULE_ID);

            $APPLICATION->IncludeAdminFile(
                sprintf(
                    '%s %s',
                    Loc::getMessage("IBSNOTEBOOKSHOP_INSTALL_TITLE"),
                    Loc::getMessage("IBSNOTEBOOKSHOP_NAME")
                ),
                __DIR__ . "/unstep2.php"
            );
        }

        return false;
    }

    public function InstallFiles()
    {
        $path = __DIR__ . "/components";

        if (\Bitrix\Main\IO\Directory::isDirectoryExists($path)) {
            CopyDirFiles($path, $_SERVER["DOCUMENT_ROOT"] . "/local/components", true, true);
        } else {
            throw new \Bitrix\Main\IO\InvalidPathException($path);
        }
    }
    public function uninstallDB()
    {
        Loader::includeModule($this->MODULE_ID);

        $tables = [
            [
                "connection" => Application::getConnection(Kosenko\notebookshop\VendorTable::getConnectionName()),
                "name" => Base::getInstance('Kosenko\notebookshop\VendorTable')->getDBTableName()
            ],
            [
                "connection" => Application::getConnection(Kosenko\notebookshop\OptionTable::getConnectionName()),
                "name" => Base::getInstance('Kosenko\notebookshop\OptionTable')->getDBTableName()
            ],
            [
                "connection" => Application::getConnection(Kosenko\notebookshop\NotebookTable::getConnectionName()),
                "name" => Base::getInstance('Kosenko\notebookshop\NotebookTable')->getDBTableName()
            ],
            [
                "connection" => Application::getConnection(Kosenko\notebookshop\ModelTable::getConnectionName()),
                "name" => Base::getInstance('Kosenko\notebookshop\ModelTable')->getDBTableName()
            ],
            [
                "connection" => Application::getConnection(Kosenko\notebookshop\NotebookOptionTable::getConnectionName()),
                "name" => Base::getInstance('Kosenko\notebookshop\NotebookOptionTable')->getDBTableName()
            ],
        ];

        foreach ($tables as $table) {
            if ($table["connection"]->isTableExists($table["name"])) {
                $table["connection"]->dropTable($table["name"]);
            }
        }
    }
}
