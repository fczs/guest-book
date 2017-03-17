<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/Prolog.php"); ?>

<?php if(!$users->isAdmin()) header("Location: /"); ?>

<?php include(TEMPLATE_DIR . '/header.php'); ?>

<div class="gb-header">
    <h1 class="gb-title"><?=$LANG["MESSAGES_TITLE"]?></h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <table class="table table-hover">
            <? include(TEMPLATE_DIR . '/elements/admin_messages.php'); ?>
        </table>
    </div>
</div>

<?php include(TEMPLATE_DIR . '/elements/pagination.php'); ?>

<?php include(TEMPLATE_DIR . '/footer.php'); ?>
