<?php
$authorIdArr = [];
$tmpMessages = [];
foreach ($messages->getUserPage() as $k => $v) {
    $authorIdArr[$k] = $v["AUTHOR_ID"];
    $tmpMessages[$k] = $v;
}
$authorFields = $users->getUserFields($authorIdArr);

foreach ($tmpMessages as $message): ?>
    <div class="gb-post">
        <h2 class="gb-post-title"><?=$message["TITLE"]?></h2>
        <p class="gb-post-meta"><?=$message["DATE"]?> | <?=$authorFields[$message["AUTHOR_ID"]]["NAME"]?></p>
        <p><?=$message["MESSAGE"]?></p>
    </div>
<? endforeach; ?>