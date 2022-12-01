## Порядок установки

Склонировать репозиторий в папку /local/modules/kosenko.notebookshop <br>
Установить модуль через админку /bitrix/admin/partner_modules.php?lang=ru <br>
Разместить комплексный компонент Магазин ноутбуков (nbcatalog) и настроить ЧПУ <br>

## Пример настроек компонента

'''php
$APPLICATION->IncludeComponent(
	"kosenko:nbcatalog",
	"",
	Array(
		"SEF_FOLDER" => "/catalog/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => Array("detail"=>"detail/#NOTEBOOK#/","model"=>"#BRAND#/#MODEL#/","vendor"=>"#BRAND#/","vendors"=>"")
	)
);
'''
