<?php require 'inc/head.php';

session_start();
?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach($_SESSION['cart'] as $product => $quantity): ?>
            <li><?= $product . ': ' . $quantity ?></li>
        <?php endforeach; ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
