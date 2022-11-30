<?php

$APPLICATION->IncludeComponent(
    "kosenko:nbcatalog.detail",
    "",
    array(
        "CODE" => $arResult["VARIABLES"]["NOTEBOOK"],
        "SEF_FOLDER" => $arParams["SEF_FOLDER"],
    )
);
