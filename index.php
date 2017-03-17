<?php require_once(dirname(__FILE__) . "/engine/Prolog.php"); ?>

<?php include(TEMPLATE_DIR . '/header.php'); ?>

    <div class="gb-header">
        <h1 class="gb-title"><?=$LANG["INDEX_TITLE"]?></h1>
        <p class="lead gb-description"><?=$LANG["INDEX_SUB_TITLE"]?></p>
    </div>

    <div class="gp-buttons">
        <button type="button"
                class="btn btn-info"
                data-toggle="modal"
                <?php if ($users->isUser()): ?>
                    data-target="#Modal_Message"
                <?php else: ?>
                    data-target="#Modal_Terms"
                <?php endif; ?>><?=$LANG["WRITE_MESSAGE_BUTTON"]?></button>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-8 gb-main">
            <?php include(TEMPLATE_DIR . '/elements/gb_messages.php'); ?>
        </div>
    </div>

<?php include(TEMPLATE_DIR . '/elements/pagination.php'); ?>

<?php include(TEMPLATE_DIR . '/footer.php'); ?>