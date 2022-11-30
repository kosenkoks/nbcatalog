<?
/**
 * Created by PhpStorm
 * User: Sergey Pokoev
 * www.pokoev.ru
 * @ Академия 1С-Битрикс - 2015
 * @ academy.1c-bitrix.ru
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
	"GROUPS" => array(
		/*'MAIN_SETTINGS' => array(
            'NAME' => 'Настройки главной страницы',
            'SORT' => 800
        ),*/
	),
	"PARAMETERS" => array(
        "CODE" => [
			"NAME" => "Символьный код родителя",
			"TYPE" => "STRING",
			"DEFAULT" => "",
            "GROUP" => "BASE"
        ],
        "SEF_FOLDER" => [
            "NAME" => "SEF_FOLDER",
            "GROUP" => "BASE"
        ],
        "ENTITY_TYPE" => [
            "NAME" => "Тип сущности",
            "TYPE" => "LIST",
            "VALUES" => [
                "VENDOR" => "Производители",
                "MODEL" => "Модели",
                "NOTEBOOK" => "Ноутбуки"
            ],
            "GROUP" => "BASE",
        ],
        "HEADERS" => [
            "NAME" => "Поля",
            "TYPE" => "LIST",
            "VALUES" => [
                "ID" => "ID",
                "NAME" => "Название",
                "YEAR" => "Год выпуска",
                "PRICE" => "Цена",
            ],
            "MULTIPLE" => "Y",
            "GROUP" => "BASE",
        ]
	),
);
?>