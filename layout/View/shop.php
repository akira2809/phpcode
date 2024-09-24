<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
  <div class="sort-container">
    <div class="sort-0">
    <h1>
        Shop COFFEE+
    </h1>
</div>
    <div class="sort-1">
    <p>
        Clear All
    </p>
    <p>Filter

    </p>
</div>
</div>
<div class="text-sort">
    <p>Buy 3, Get 1 FREE on Coffee, Tea, Syrup & Merch is just in time for Father's Day! No code needed. Shop Now</p>
</div>
<div class="textbl">
    ALL COFFEE
</div>
<form id="search-form" method="get">
        <label for="search">Search Products:</label>
        <input type="text" id="search" name="search" placeholder="Enter product name...">
    </form>

    <div id="search-results">
        <!-- Kết quả tìm kiếm sẽ được hiển thị ở đây -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search').on('input', function () {
                var searchQuery = $(this).val();

                $.ajax({
                    url: 'index.php?trang=products',
                    type: 'GET',
                    data: { search: searchQuery },
                    success: function (response) {
                        $('#search-results').html(response);
                    }
                });
            });
        });
    </script>

<div class="container-coffee">
        <?php if (!empty($this->listPro) && is_array($this->listPro)): ?>
            <?php
            $products = $this->listPro;
            foreach ($products as $product): ?>
                <div class="coffee-item">
                    <h2><?php echo htmlspecialchars($product['NAME'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <a href="indexphp?trang=detail&id=<?= $product['id'] ?>&idCat=<?= $product['idCat'] ?>"><img
                            src="./<?php echo htmlspecialchars($product['picture'], ENT_QUOTES, 'UTF-8'); ?>"
                            alt="<?php echo htmlspecialchars($product['NAME'], ENT_QUOTES, 'UTF-8'); ?>"></a>
                    <p><?php echo htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Price: <?php echo htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8'); ?> $</p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sản phẩm nào.</p>
        <?php endif; ?>
    </div>
    
    <div class="shop-about">
        <div class="text-shop-about">
            <h1>
        Caring about coffee starts with caring about people
        </h1>
        <p>
        From planting to pour, coffee is a collective effort. We honor the community behind every cup by exclusively offering premium quality coffees,
        transparently sourced from estates and farms that treat both the land, and the people who work it, with respect.
        </p>
        </div>
        <div class="img-shop-about">
            <img src="./layout/public/img/guy.jpg" alt="">
        </div>
    </div>
    <div class="sort-about-shop">
        <div class="sort-text-shop">
        Seeking something special? We’ve got a few notes. Start your search with specific coffee characteristics.
        <br>
        <p class="text-p-shop">Narrow your options<i class="bi bi-arrow-down"></i></p>
        </div>
        <div class="option2">
        <?php foreach($listCat as $key => $value){
            echo '<a href="index.php?trang=sort&idCat='.$value['id'].'"><p>'.$value['NAME'].'</p></a>';
        } ?>
    </div>
    <div class="rooster-shop">
        <img src="./layout/public/img/illustration-rooster-blocks.svg" alt="">
    </div>
    </div>
    <div class="container-main3">
    <div class="logo-fix2">
        <img src="./layout/public/img/logo-fix.svg" alt="">
    </div>
    <div class="text-main5">
        <h1>
        Small lot coffees worthy of savoring
        </h1>
        <p>
        Unique small-lot coffees from our globe-spanning network of artisan producers, roasted to perfection and delivered to you each month.
        </p>
        <button class="btn-coffe3">
            Learn more about the Fix
        </button>
    </div>
    <div class="img-main3">
        <img src="./layout/public/img/11.webp" alt="">
    </div>
</div>
<div class="container-main4">
    <div class="cook">
        <img src="./layout/public/img/cook1.png" alt="">
        <img src="./layout/public/img/cook2.png" alt="">
        <img src="./layout/public/img/cook3.png" alt="">
    </div>
    <div class="text-main4">
        <p>Plus, if you choose an annual plan*, we’ll send you amazing brew gear
            like the Fellow Stagg EKG kettle or a Moccamaster brewer for free.</p>
        <p class="test">*First annual plan only</p>
    </div>
</div>
<div class="shop-img">
    <div class="img1">
        <div class="text-img1">
           Want it sweet?
           <br>
        Treat yourself and try a syrup
        </div>
        <button class="btn-coffe4">
            Learn more about the Fix
        </button>
        <img src="./layout/public/img/drink.webp" alt="">
        <button class="btn-coffe4">
           Check out our syrups
        </button>
    </div>
    <div class="img2">
    <div class="text-img1">
    Looking for a different kick? 
    <br>
    See our range of teas
        </div>
        <button class="btn-coffe4">
            Check out our teas
        </button>
        <img src="./layout/public/img/tea.webp" alt="">
        
    </div>
</div>
  

</body>
</html>