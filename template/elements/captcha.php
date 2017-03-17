<?php session_start(); ?>
<img src="captcha/?<?=session_name()?>=<?=session_id()?>">
<input type="text" class="form-control check" name="keystring" placeholder="<?=$LANG["CAPTCHA_PLACEHOLDER"]?>">
<div class="error-label"></div>