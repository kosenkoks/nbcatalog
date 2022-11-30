<?php

$APPLICATION->IncludeComponent(
    "kosenko:nbcatalog.section",
    "",
    array(
        "CODE" => "",
        "ENTITY_TYPE" => "VENDOR",
        "SEF_FOLDER" => $arParams["SEF_FOLDER"],
        "HEADERS" => array("ID","NAME")
    )
);
