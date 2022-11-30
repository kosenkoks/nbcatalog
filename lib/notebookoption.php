<?php

namespace Kosenko\notebookshop;

use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\FloatField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Fields\Relations\ManyToMany;
use Bitrix\Main\ORM\Query\Join;

class NotebookOptionTable extends \Bitrix\Main\ORM\Data\DataManager
{
    public static function getTableName()
    {
        return 'nbshop_notebook_option';
    }

    public static function getMap()
    {
        return array(
            (new IntegerField('NOTEBOOK_ID'))->configurePrimary(true),
            (new Reference(
                'NOTEBOOK',
                NotebookTable::class,
                Join::on('this.NOTEBOOK_ID', 'ref.ID')
            ))
                ->configureJoinType('inner'),

            (new IntegerField('OPTION_ID'))->configurePrimary(true),
            (new Reference(
                'OPTION',
                OptionTable::class,
                Join::on('this.OPTION_ID', 'ref.ID')
            ))
                ->configureJoinType('inner'),
            new StringField('VALUE', array(
            )),
        );
    }
}
