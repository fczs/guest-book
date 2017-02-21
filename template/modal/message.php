<div tabindex="-1" role="dialog" id="Modal_Message" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h2><?=MESSAGE_TITLE?></h2>
            </div>
            <div class="modal-body">
                <form id="Form_Message" class="form-horizontal">
                    <input type="hidden" name="email" value="<?=$_SESSION["LOGIN_USER"]?>">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" class="form-control check" name="messageTitle" placeholder="<?=MESSAGE_TITLE_PLACEHOLDER?>">
                            <div class="error-label"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <textarea class="form-control check" rows="7" name="messageText" placeholder="<?=MESSAGE_TEXT_PLACEHOLDER?>"></textarea>
                            <div class="error-label"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-default message-submit"><?=SEND_BUTTON?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>