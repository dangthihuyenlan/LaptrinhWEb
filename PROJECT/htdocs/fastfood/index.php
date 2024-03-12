<?php require_once __DIR__. '/autoload/autoload.php';
    //_debug($_SESSION['cart']);
    // unset($_SESSION['cart']);
    $category = $db->fetchsql("SELECT * FROM category WHERE level=0 AND home=1");
    $sqlRated = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY rated DESC LIMIT 3";
    $productRated = $db->fetchsql($sqlRated);
    $sqlNew = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY id DESC LIMIT 3";
    $productNew = $db->fetchsql($sqlNew);
    $sqlSale = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY sale DESC LIMIT 3";
    $productSale = $db->fetchsql($sqlSale);
    $sqlCheap = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY price LIMIT 3";
    $productCheap = $db->fetchsql($sqlCheap);
    $sqlAcc = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 1 ORDER BY price LIMIT 3";
    $productAcc = $db->fetchsql($sqlAcc);
    ?>
<?php require_once __DIR__. '/layouts/header.php'; ?>
<section class="banner">
    <div class="container">
    <div class="search2 col-md-6 container">
        <form class="form-inline" style="margin-top: 20px;" action="/fastfood/thucdon.php">
            <input type="text" name="keywork" placeholder=" Tìm kiếm" class="form-control" style="width: 450px;">
            <button type="submit" class="btn btn-default ban1"><i class="fa fa-search"></i></button>
            <?php if(isset($_SESSION['error_s'])) :?>
            {
            echo "<script>alert('<?php echo $_SESSION['error_s'];unset($_SESSION['error_s']); ?>');location.href='index.php'</script>";
            }
        
    </div>
    <?php endif; ?>
    </form>
    <div class="category-list-filter">
            <a href="thucdon.php"><span class="category-item">All</span></a>
            <a href="thucdon.php?the=ga-ran#"><span class="category-item">Gà rán</span></a>
            <a href="thucdon.php?the=combo#"><span class="category-item">Combo</span></a>
            <a href="thucdon.php?the=burger#"><span class="category-item">Burger</span></a>
            <a href="thucdon.php?the=com-ga#"><span class="category-item">Cơm</span></a>
            <a href="thucdon.php?the=set#"><span class="category-item">Set</span></a><br>
            <a href="thucdon.php?the=sushi#"><span class="category-item">Sushi</span></a>
            <a href="thucdon.php?the=kem#"><span class="category-item">Kem</span></a>
            <a href="thucdon.php?the=tra#"><span class="category-item">Trà</span></a>
            <a href="thucdon.php?the=tra-sua#"><span class="category-item">Trà sữa</span></a>
            <a href="thucdon.php?the=nuoc#"><span class="category-item">Cola</span></a>
        </div>
    </div>
    <div class="container col-md-6 trai pull-right" style="margin-top: 20px;">

        <section class="box-main1 clearfix">
            <a href="thucdon.php?the=hot" class="xemthem">Xem thêm <i class="fas fa-redo font12"></i></a>
            <h3 class="title-main tt" style=""><a href="javascript:void(0)"> Nổi bật </a> </h3>
            <div class="showitem">
                <?php foreach ($productRated as $item): ?>
                <div class="col-md-4 item-product1 bor ">
                    <a href="san_pham.php?id=<?php echo $item['id'] ?>">
                    <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" width="100%" height="100">
                    <label class="hot">
                    Hot!!!!
                    </label>
                    </a>
                    <div class="info-item">
                        <a href="san_pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                        <p>
                            <?php if ($item['sale'] > 0): ?>
                            <strike class="sale"><?php echo formatPrice($item['price']) ?> đ</strike>
                            <?php endif ?>
                            <b class="price"><?php echo formatPrice(formatSale($item['price'],$item['sale'])) ?> đ</b>
                        </p>
                        <div class="ratingresult">
                            <i class="fa fa-star<?php if ($item['rated']<1): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<2): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<3): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<4): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<5): ?>-o<?php endif ?>"></i>
                            <span class="chu"><?php echo $item['comment'] ?> đánh giá </span>
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
        <section class="box-main1 clearfix">
            <a href="thucdon.php?the=new" class="xemthem">Xem thêm <i class="fas fa-redo font12"></i></a>
            <h3 class="title-main tt" style="" id="order"><a href="javascript:void(0)"> Sản phẩm mới </a> </h3>
            <div class="showitem">
                <?php foreach ($productNew as $item): ?>
                <div class="col-md-4 item-product1 bor">
                    <a href="san_pham.php?id=<?php echo $item['id'] ?>">
                    <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" width="100%" height="100">
                    <label class="new">
                    Mới ra mắt
                    </label>
                    </a>
                    <div class="info-item">
                        <a href="san_pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                        <p>
                            <?php if ($item['sale'] > 0): ?>
                            <strike class="sale"><?php echo formatPrice($item['price']) ?> đ</strike>
                            <?php endif ?>
                            <b class="price"><?php echo formatPrice(formatSale($item['price'],$item['sale'])) ?> đ</b>
                        </p>
                        <div class="ratingresult">
                            <i class="fa fa-star<?php if ($item['rated']<1): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<2): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<3): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<4): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<5): ?>-o<?php endif ?>"></i>
                            <span class="chu"> <?php echo $item['comment'] ?> đánh giá </span>
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
        <section class="box-main1 clearfix">
<a href="thucdon.php?the=sale" class="xemthem"> Xem thêm <i class="fas fa-redo font12"></i></a>
            <h3 class="title-main tt" style=""><a href="javascript:void(0)"> Siêu giảm giá </a> </h3>
            <div class="showitem">
                <?php foreach ($productSale as $item): ?>
                <div class="col-md-4 item-product1 bor">
                    <a href="san_pham.php?id=<?php echo $item['id'] ?>">
                    <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" width="100%" height="100">
                    <label class="giamgia">
                    Giảm giá <?php echo$item['sale'] ?>%
                    </label>
                    </a>
                    <div class="info-item">
                        <a href="san_pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                        <p>
                            <?php if ($item['sale'] > 0): ?>
                            <strike class="sale"><?php echo formatPrice($item['price']) ?> đ</strike>
                            <?php endif ?>
                            <b class="price"><?php echo formatPrice(formatSale($item['price'],$item['sale'])) ?> đ</b>
                        </p>
                        <div class="ratingresult">
                            <i class="fa fa-star<?php if ($item['rated']<1): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<2): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<3): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<4): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<5): ?>-o<?php endif ?>"></i>
                            <span class="chu" > <?php echo $item['comment'] ?> đánh giá </span>
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

        <section class="box-main1 clearfix">
        <a href="thucdon.php?the=cheap" class="xemthem">Xem thêm <i class="fas fa-redo font12"></i></a>
        <h3 class="title-main tt" style=""><a href="javascript:void(0)">Sản phẩm bán chạy</a> </h3>
        <div class="showitem">
            <?php foreach ($productCheap as $item): ?>
            <div class="col-md-4 item-product1 bor">
                <a href="san_pham.php?id=<?php echo $item['id'] ?>">
                <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" width="100%" height="100">
                <label class="giare">
                Siêu giảm giá
                </label>
                </a>
                <div class="info-item">
                    <a href="san_pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                    <p>
                        <?php if ($item['sale'] > 0): ?>
                        <strike class="sale"><?php echo formatPrice($item['price']) ?> đ</strike>
                        <?php endif ?>
                        <b class="price"><?php echo formatPrice(formatSale($item['price'],$item['sale'])) ?> đ</b>
                    </p>
                    <div class="ratingresult">
                        <i class="fa fa-star<?php if ($item['rated']<1): ?>-o<?php endif ?>"></i>
                        <i class="fa fa-star<?php if ($item['rated']<2): ?>-o<?php endif ?>"></i>
                        <i class="fa fa-star<?php if ($item['rated']<3): ?>-o<?php endif ?>"></i>
                        <i class="fa fa-star<?php if ($item['rated']<4): ?>-o<?php endif ?>"></i>
                        <i class="fa fa-star<?php if ($item['rated']<5): ?>-o<?php endif ?>"></i>
                        <span class="chu"> <?php echo $item['comment'] ?> đánh giá </span>
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

    </div>
</div>
</section>
<div class="col-md-12 bor">
    <!--Banner -->
    <!--Danh mục -->
    <div class="companyMenu group flexContain">
        <?php foreach ($category as $item): ?>
        <button><a href="danh-muc.php?id=<?php echo $item['id'] ?>"><img src="public/uploads/company/<?php echo $item['images'] ?>"></a></button>
        <?php endforeach ?>
    </div>
    <!--end Danh mục -->
</div>
<?php require_once __DIR__. '/layouts/footer.php'; ?>