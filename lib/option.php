<?php

namespace Kosenko\notebookshop;

use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\FloatField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Fields\Relations\ManyToMany;
use Bitrix\Main\ORM\Query\Join;


class OptionTable extends \Bitrix\Main\ORM\Data\DataManager
{
    public static function getTableName()
    {
        return 'nbshop_option';
    }

    public static function getMap()
    {
        return array(
            //ID
            new IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            //Название
            new StringField('NAME', array(
                'required' => true,
            )),
           /* (new ManyToMany('NOTEBOOKS', NotebookTable::class))
                ->configureTableName('nbshop_notebook_option')*/
        );
    }
}