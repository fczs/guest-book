<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/Prolog.php"); ?>

<?php if(!$users->isAdmin()) header("Location: /"); ?>

<?php include(TEMPLATE_DIR . '/header.php'); ?>

<?php
$message = $messages->getDetailPage();
$authorFields = $users->getUserFields(array($message["AUTHOR_ID"]));
?>
    <div class="gb-header">
        <h1 class="gb-title"><?=$message["TITLE"]?></h1>
    </div>

    <div class="row">
        <div class="col-xs-12 gb-main">
            <div class="gb-post">
                <div class="gb-post-meta">
                    <span class="meta-title"><?=AUTHOR_LABEL?></span>
                    <span><?=$authorFields[$message["AUTHOR_ID"]]["NAME"]?></span>
                </div>
                <div class="gb-post-meta">
                    <span class="meta-title"><?=EMAIL_LABEL?></span>
                    <span><?=$authorFields[$message["AUTHOR_ID"]]["EMAIL"]?></span>
                </div>
                <div class="gb-post-meta">
                    <span class="meta-title"><?=DATE_LABEL?></span>
                    <span><?=$message["DATE"]?></span>
                </div>
                <p><?=$message["MESSAGE"]?></p>
            </div>
        </div>
    </div>

    <div class="gp-buttons">
        <?php if ($message["PUBLISHED"] == "N"): ?>
            <button type="button" class="btn btn-success btn-success publish" data-id="<?=$message["ID"]?>"><?=PUBLISH_BUTTON?></button>
        <?php endif; ?>
        <button type="button" class="btn btn-danger delete" data-id="<?=$message["ID"]?>"><?=DELETE_BUTTON?></button>
    </div>
    <div class="gp-back">
        <button type="button" class="btn btn-info back-btn"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> <?=BACK_BUTTON?></button>
    </div>

<?php include(TEMPLATE_DIR . '/footer.php'); ?>