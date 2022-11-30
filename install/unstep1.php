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
    <input type="hidden" name="uninstall" value="Y">
    <input type="hidden" name="step" value="2">
    <?php echo CAdminMessage::ShowMessage(Loc::getMessage('IBSNOTEBOOKSHOP_DELETE_TABLE_WARNING')) ?>
    <p>
      <input type="checkbox" name="deletetables" id="deletetables" value="Y" checked>
      <label for="deletetables"><?=Loc::getMessage('IBSNOTEBOOKSHOP_DELETE_TABLE_LABEL')?></label>
    </p>
    <input type="submit" value="<?=Loc::getMessage('IBSNOTEBOOKSHOP_STEP1_UNINSTALL_BUTTON')?>">
</form>