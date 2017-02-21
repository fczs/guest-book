<div tabindex="-1" role="dialog" id="Modal_Register" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h2><?=REGISTER_TITLE?></h2>
            </div>
            <div class="modal-body">
                <form id="Form_Register" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" class="form-control check" name="name" placeholder="<?=NAME_PLACEHOLDER?>">
                            <div class="error-label"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" class="form-control check" name="email" placeholder="<?=EMAIL_PLACEHOLDER?>">
                            <div class="error-label"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" class="form-control check" name="password1" placeholder="<?=PASSWORD_PLACEHOLDER?>">
                            <div class="error-label"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" class="form-control check" name="password2" placeholder="<?=NAME_PLACEHOLDER?>">
                            <div class="error-label"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <?include(TEMPLATE_DIR . '/elements/captcha.php'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-default register-user"><?=SEND_BUTTON?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>