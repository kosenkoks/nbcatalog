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
        <div class="col-4">
            <img src="https://fakeimg.pl/500x500/000000/" alt="<?=$arResult["PARENT"]["NAME"]?>" class="img-fluid">
        </div>
        <div class="col-8">
            <p><b>Цена:</b> <?=$arResult["PRICE"]?></p>
            <p><b>Год выпуска:</b> <?=$arResult["YEAR"]?></p>
            <h4>Опции</h4>
            <?php foreach($arResult["OPTIONS"] as $arOption) { ?>
                <p><b><?=$arOption["NAME"]?>:</b> <?=$arOption["VALUE"]?></p>
            <?php } ?>
        </div>
    </div>
</div>



