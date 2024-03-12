<?php require_once __DIR__ . '/autoload/autoload.php';

$f = intval(getInput('f'));
$l = intval(getInput('l'));
$the = getInput('the');
$sx = getInput('sx');

$category = $db->fetchsql("SELECT * FROM category WHERE level=0 AND home=1");
if ($f == 0 && $l == 0) {
    if ($sx == "") {
        if ($the == "hot") {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY rated DESC";
            $ten = "nổi bật nhất";
        } else
        if ($the == "new") {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY id DESC";
            $ten = "mới nhất";
        } else
        if ($the == "sale") {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY sale DESC";
            $ten = "giảm giá mạnh";
        } else
        if ($the == "cheap") {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY price";
            $ten = "giá rẻ";
        } else {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 AND product.slug LIKE'%" . $the . "%' ";
            $ten = $the;
        }
    } else {
        $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY price " . $sx;
        if ($sx == "ASC") $sx2 = "tăng dần";
        else $sx2 = "giảm dần";
        $ten = "sắp xếp " . $sx2;
    }
} else {
    $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 AND product.price*(100-product.sale)/100 > " . $f . "000000 AND product.price*(100-product.sale)/100 < " . $l . "000000";
    $ten = "từ " . $f . "tr đến " . $l . "tr";
    if ($l == 1000) {
        $ten = "trên " . $f . "tr";
    }
}



$total = count($db->fetchsql($sql));

if (isset($_GET['page'])) {
    $p = $_GET['page'];
} else {
    $p = 1;
}

$keyword = getInput('keywork');
if (isset($keyword)) {
    $sql = "SELECT product.* FROM product WHERE name LIKE '%$keyword%'";
}

$product = $db->fetchJones("product", $sql, $total, $p, 30, true);

if (isset($product)) {
    $sotrang = $product['page'];
    unset($product['page']);
}

?>
<?php require_once __DIR__ . '/layouts/header.php'; ?>
<h1 class="container tieude">Thực đơn mỗi ngày</h1>

<div class="col-md-12 " style="border-top: none; border-color: #889cff; min-height: 300px">

    <div style="margin:30px 0 10px 0;" class="companyMenu group flexContain">
        <?php foreach ($category as $item) : ?>
            <button><a href="danh-muc.php?id=<?php echo $item['id'] ?>"><img src="public/uploads/company/<?php echo $item['images'] ?>"></a></button>
        <?php endforeach ?>
    </div>

    <!--end Danh mục -->

    <?php if (count($product) > 1) : ?>
        <section class="box-main1 clearfix">
            <div class="showitem container">
                <?php foreach ($product as $item) : ?>
                    <div class="col-md-3 item-product1 bor">
                        <a href="san_pham.php?id=<?php echo $item['id'] ?>">
                            <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" width="100%" height="150">
                        </a>
                        <div class="info-item">
                            <a href="san_pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                            <p>
                                <?php if ($item['sale'] > 0) : ?>
                                    <strike class="sale"><?php echo formatPrice($item['price']) ?> đ</strike>
                                <?php endif ?>

                                <b class="price"><?php echo formatPrice(formatSale($item['price'], $item['sale'])) ?> đ</b>
                            </p>

                            <div class="ratingresult">
                                <i class="fa fa-star<?php if ($item['rated'] < 1) : ?>-o<?php endif ?>"></i>
                                <i class="fa fa-star<?php if ($item['rated'] < 2) : ?>-o<?php endif ?>"></i>
                                <i class="fa fa-star<?php if ($item['rated'] < 3) : ?>-o<?php endif ?>"></i>
                                <i class="fa fa-star<?php if ($item['rated'] < 4) : ?>-o<?php endif ?>"></i>
                                <i class="fa fa-star<?php if ($item['rated'] < 5) : ?>-o<?php endif ?>"></i>
                                <span> <?php echo $item['comment'] ?> đánh giá </span>
                            </div>

                        </div>
                        <div class="hidenitem">
                            <p><a href="san_pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>

                            <p><a href="cart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>

        <li aria-label="Page navigation" style="text-align: center">
            <ul class="pagination pullright container">

                <?php for ($i = 1; $i <= $sotrang; $i++) : ?>

                    <?php
                    if (isset($_GET['page'])) {
                        $p = $_GET['page'];
                    } else {
                        $p = 1;
                    }

                    ?>

                    <li class="page-item <?php echo ($i == $p) ? 'active' : '' ?>">
                        <a class="page-link" href="?the=<?php echo $the ?>&&sx=<?php echo $sx ?>&&f=<?php echo $f ?>&&l=<?php echo $l ?>&&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>

                <?php endfor; ?>

            </ul>
        </li>
    <?php else :; ?>
        <h1 class="w-100 text-center p-4 text-danger">Không tìm thấy sản phẩm</h1>
    <?php endif; ?>
</div>


<?php require_once __DIR__ . '/layouts/footer.php'; ?>