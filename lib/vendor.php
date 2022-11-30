<?php

namespace Kosenko\notebookshop;

use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;

class VendorTable extends \Bitrix\Main\ORM\Data\DataManager
{
    public static function getTableName()
    {
        return 'nbshop_vendor';
    }

    public static function getMap()
    {
        return array(
            //ID
            new IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            //символьный код
            // TODO: контроль уникальности
            new StringField('CODE', array(
                'required' => true,
            )),
            //Название
            new StringField('NAME', array(
                'required' => true,
            )),
        );
    }

    /**
     * Returns selection by entity's code
     *
     * @param string $code Entity's code
     * @return QueryResult
     */
    public static function getByCode($code)
    {
        return static::getList(["filter" => [
            "CODE" => $code
        ]]);
    }
}
