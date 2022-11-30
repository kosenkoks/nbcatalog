<?php

namespace Kosenko\notebookshop;

/*use Bitrix\Main;
use Bitrix\Main\Entity;
*/

use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;

class ModelTable extends \Bitrix\Main\ORM\Data\DataManager
{
    public static function getTableName()
    {
        return 'nbshop_model';
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
            // Производитель
            new IntegerField('VENDOR_ID', array(
                'required' => true,
            )),
            (new Reference(
                'VENDOR',
                VendorTable::class,
                Join::on('this.VENDOR_ID', 'ref.ID')
            ))
            ->configureJoinType('inner')
        );
    }

    public static function getByCode($code)
    {
        return static::getList(["filter" => [
            "CODE" => $code
        ]]);
    }

}
