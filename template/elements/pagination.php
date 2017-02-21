<?php
$pagesNum = $messages->countPages($messages->getPageUri());
if ($pagesNum > 1): ?>
    <nav>
        <ul class="pagination pagination-lg">
            <?php for ($i = 1; $i <= $pagesNum; $i++): ?>
                <li<?php if ($messages->getPageNum() == $i): ?> class="active"<?php endif; ?>><a href="?PAGE=<?=$i?>"><?=$i?></a></li>
            <?php endfor; ?>
        </ul>
    </nav>
<?php endif; ?>