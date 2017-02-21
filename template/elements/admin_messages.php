<?php
$authorIdArr = [];
$tmpMessages = [];
foreach ($messages->getAdminPage() as $k => $v) {
    $authorIdArr[$k] = $v["AUTHOR_ID"];
    $tmpMessages[$k] = $v;
}
$authorFields = $users->getUserFields($authorIdArr);

foreach ($tmpMessages as $message): ?>
    <tr<?php if ($message["PUBLISHED"] == "N"): ?> class="warning"<?php endif; ?> id="<?=$message["ID"]?>">
        <td>
            <div><?=$authorFields[$message["AUTHOR_ID"]]["NAME"]?></div>
            <div><?=$message["DATE"]?></div>
        </td>
        <td>
            <a href="detail.php?ID=<?=$message["ID"]?>"><?=$message["TITLE"]?></a>
        </td>
        <td class="hidden-xs">
            <?=substr($message["MESSAGE"], 0, ADMIN_MESSAGE_LENGTH)?>... <a href="detail.php?ID=<?=$message["ID"]?>">[...]</a>
        </td>
        <td class="hidden-xs">
            <?php if ($message["PUBLISHED"] == "N"): ?>
                <button type="button"
                        class="btn btn-xs btn-success publish"
                        data-id="<?=$message["ID"]?>"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="<?=PUBLISH_BUTTON?>">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                </button>
            <?php endif; ?>
        </td>
        <td class="hidden-xs">
            <button type="button"
                    class="btn btn-xs btn-danger delete"
                    data-id="<?=$message["ID"]?>"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="<?=DELETE_BUTTON?>">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </td>
    </tr>
<?php endforeach; ?>