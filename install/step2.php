<?php

use Bitrix\Main\Localization\Loc;

if (!check_bitrix_sessid()) {
    return;
}

Loc::loadMessages(__FILE__);
?>
<form action="<?php echo $APPLICATION->GetCurPage()?>">
    <?=bitrix_sessid_post()?>
    <input type="hidden" name="lang" value="<?php echo LANGUAGE_ID?>">
    <input type="hidden" name="id" value="kosenko.notebookshop">
    <?php echo CAdminMessage::ShowNote(Loc::getMessage('IBSNOTEBOOKSHOP_COMPLETE_INTSTALL_MESSAGE')) ?>
    <input type="submit" value="<?=Loc::getMessage('IBSNOTEBOOKSHOP_STEP2_BUTTON')?>">
</form>
