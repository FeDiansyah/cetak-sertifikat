<?php
$pagerGroup = isset($pagerGroup) ? $pagerGroup : 'default';
$pager->setSurroundCount(2);
$links = $pager->links($pagerGroup);
?>

<ul class="pagination">
    <!-- Tombol Previous -->
    <?php if ($pager->hasPreviousPage()) : ?>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getFirst(); ?>">First</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getPreviousPage(); ?>">Previous</a>
        </li>
    <?php endif; ?>

    <!-- Nomor halaman -->
    <?php foreach ($links as $link) : ?>
        <li class="page-item <?= $link['active'] ? 'active' : ''; ?>">
            <a class="page-link" href="<?= $link['uri']; ?>"><?= $link['title']; ?></a>
        </li>
    <?php endforeach; ?>

    <!-- Tombol Next -->
    <?php if ($pager->hasNextPage()) : ?>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getNextPage(); ?>">Next</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getLast(); ?>">Last</a>
        </li>
    <?php endif; ?>
</ul>