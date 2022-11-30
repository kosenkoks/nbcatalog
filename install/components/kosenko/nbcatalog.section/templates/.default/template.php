<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\UI\Extension;
Extension::load('ui.bootstrap4');
?>

<div class="container"> 
    <div class="row">
        <h1><?=$arResult["PARENT"]["NAME"]?></h1>
        <a href="<?=$arParams["SEF_FOLDER"]?>">Каталог</a>
    </div> 
    <div class="row">
        <div class="col-8 col-md-12 align-self-center">
            <?php $APPLICATION->IncludeComponent('bitrix:main.ui.grid', '', [
                'GRID_ID' => $arParams["ENTITY_TYPE"],
                'HEADERS' => $arResult["HEADERS"],
                'ROWS' => $arResult["ROWS"],
                'SHOW_ROW_CHECKBOXES' => false,
                'TOTAL_ROWS_COUNT' => $arResult["TOTAL"],
                'NAV_OBJECT' => $arResult["NAV"],
                'AJAX_MODE' => 'Y',
                'AJAX_ID' => \CAjax::getComponentID('bitrix:main.ui.grid', '.default', ''),
                'PAGE_SIZES' =>  [
                    ['NAME' => '1', 'VALUE' => '1'],
                    ['NAME' => '5', 'VALUE' => '5'],
                    ['NAME' => '10', 'VALUE' => '10'],
                    ['NAME' => '20', 'VALUE' => '20'],
                    ['NAME' => '50', 'VALUE' => '50']
                ],
                'AJAX_OPTION_JUMP'          => 'N',
                'SHOW_CHECK_ALL_CHECKBOXES' => true,
                'SHOW_ROW_ACTIONS_MENU'     => true,
                'SHOW_GRID_SETTINGS_MENU'   => true,
                'SHOW_NAVIGATION_PANEL'     => true,
                'SHOW_PAGINATION'           => true,
                'SHOW_SELECTED_COUNTER'     => false,
                'SHOW_TOTAL_COUNTER'        => true,
                'SHOW_PAGESIZE'             => true,
                'SHOW_ACTION_PANEL'         => true,
                'ALLOW_COLUMNS_SORT'        => true,
                'ALLOW_COLUMNS_RESIZE'      => true,
                'ALLOW_HORIZONTAL_SCROLL'   => true,
                'ALLOW_SORT'                => true,
                'ALLOW_PIN_HEADER'          => true,
                'AJAX_OPTION_HISTORY'       => 'N'
            ]);?>
        </div>
    </div>
</div>
