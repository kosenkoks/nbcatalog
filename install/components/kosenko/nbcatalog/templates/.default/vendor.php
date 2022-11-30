<?php

$APPLICATION->IncludeComponent(
    "kosenko:nbcatalog.section",
    "",
    array(
        "CODE" => $arResult["VARIABLES"]["BRAND"],
        "ENTITY_TYPE" => "MODEL",
        "SEF_FOLDER" => $arParams["SEF_FOLDER"],
        "HEADERS" => array("ID","NAME")
    )
);
