<div tabindex="-1" role="dialog" id="Modal_Login" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h2 class="h2-inline"><?=LOGIN_TITLE?></h2><span><?=OTHERWISE?> <a href="#"
                                                             data-dismiss="modal"
                                                             type="button"
                                                             data-toggle="modal"
                                                             data-target="#Modal_Register"><?=REGISTER_LINK?></a></span>
            </div>
            <div class="modal-body">
                <form id="Form_Login" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" class="form-control check" name="email" placeholder="<?=EMAIL_PLACEHOLDER?>">
                            <div class="error-label"><?=ERROR_MSG?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" class="form-control check" name="password" placeholder="<?=PASSWORD_PLACEHOLDER?>">
                            <div class="error-label"><?=ERROR_MSG?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-default login-user"><?=SEND_BUTTON?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>