<?php

namespace Kosenko\notebookshop;

use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\FloatField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Fields\Relations\ManyToMany;
use Bitrix\Main\ORM\Query\Join;

class NotebookTable extends \Bitrix\Main\ORM\Data\DataManager
{
    public static function getTableName()
    {
        return 'nbshop_notebook';
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
            // Год выпуска
            new IntegerField('YEAR', array(
                'required' => true,
            )),
            // Цена
            new FloatField('PRICE', array(
                'required' => true,
            )),
            // Модель
            new IntegerField('MODEL_ID', array(
                'required' => true,
            )),
            (new Reference(
                'MODEL',
                ModelTable::class,
                Join::on('this.MODEL_ID', 'ref.ID')
            ))->configureJoinType('inner'),
           /* (new ManyToMany('OPTIONS', OptionTable::class))
                ->configureTableName('nbshop_notebook_option')*/
        );
    }

    public static function getByCode($code)
    {
        return static::getList(["filter" => [
            "CODE" => $code
        ]]);
    }
}
