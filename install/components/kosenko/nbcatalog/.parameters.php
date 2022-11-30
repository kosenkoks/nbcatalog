<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}


$arComponentParameters = array(
	"PARAMETERS" => array(
		'SEF_MODE' => array( 
            'vendors' => array(
                'NAME' => 'Список производителей',
                'DEFAULT' => '',
            ),
			'vendor' => array(
                'NAME' => 'Список моделей производителя',
                'DEFAULT' => '#BRAND#/',
				"VARIABLES" => array("BRAND"),
            ),
			'model' => array(
                'NAME' => 'Список ноутбуков модели',
                'DEFAULT' => '#BRAND#/#MODEL#/',
				"VARIABLES" => array("BRAND","MODEL"),
            ),
			'detail' => array(
                'NAME' => 'Страница ноутбука',
                'DEFAULT' => 'detail/#NOTEBOOK#/',
				"VARIABLES" => array("NOTEBOOK"),
            ),
        ),
	),
);
?>