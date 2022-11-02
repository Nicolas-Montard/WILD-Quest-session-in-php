<?php require 'inc/data/products.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] === 'GET') {
    $command = array_map('trim', $_GET);
    $command = array_map('htmlentities', $command);
    
    $commandAdd = match ($command['add_to_cart']) {
        '46' => 'Pecan nuts',
        '36' => 'Chocolate chips',
        '58' => 'full chocolate cookie',
        '32' => 'M&M\'s cookies',
        default => 'invalid'
    };

    if (!array_key_exists('cart', $_SESSION)) {
        $_SESSION['cart'] = [
            'Pecan nuts' => 0,
            'Chocolate chips' => 0,
            'full chocolate cookie' => 0,
            'M&M\'s cookies' => 0
        ];
    }
    $_SESSION['cart'][$commandAdd]++;
}
?>
<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>