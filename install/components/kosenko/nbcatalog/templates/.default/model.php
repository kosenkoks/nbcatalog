<?php

$APPLICATION->IncludeComponent(
    "kosenko:nbcatalog.section",
    "",
    array(
        "CODE" => $arResult["VARIABLES"]["MODEL"],
        "ENTITY_TYPE" => "NOTEBOOK",
        "SEF_FOLDER" => $arParams["SEF_FOLDER"],
        "HEADERS" => array("ID","NAME","YEAR","PRICE")
    )
);
