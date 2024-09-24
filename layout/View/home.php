<section>
    <img class="header-background" src="./layout/public/img/background.jpg" alt="">
    <div class="uppercase">
        <p class="mb-1 text-mono-14 font-mono uppercase">Red Rooster Coffee</p>
        <h1 class="font-serif">Exquisite coffees roasted
            <br> with expert care
        </h1>
        <a href="index.php?trang=shop"> <button class="btn-coffe">
                Shop All Coffes

            </button> </a>
    </div>
    <p class="special-about">
        Red Rooster roasts coffees of exceptional <br>quality, with unmatched attention to social <br> and
        environmental responsibility.
        <!-- <!-- search--->

    </p>
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

    </div>

</section>
<main>
    <div class="container-main">
        <div class="text-main">
            <h1>
                CARING ABOUT COFFEE STARTS WITH CARING ABOUT PEOPLE
            </h1>
            <p>
                From planting to pour, coffee is a collective effort. We honor the community behind every cup by
                exclusively
                offering premium quality coffees, transparently sourced from estates and farms that treat both the
                land, and the people who work it, with respect.
            </p>
        </div>
        <div class="img-main">
            <img src="./layout/public/img/guy.jpg" alt="">
        </div>
    </div>
    <p class="special-about">
        “Our business is built on the radical idea that world class quality, amazing employees, stellar customer
        service, and sustainable business practices are things that customers really care about.”
    </p>
    <div class="container-main">
        <div class="img-main">
            <img src="./layout/public/img/tree.png" alt="">
        </div>
        <div class="text-main">
            <h1>
                NEW IN 2024
            </h1>
            <p>
                After years of research and debate, the team at Red Rooster is thrilled to announce the launch of
                our new reforestation partnership with Our Forest. Beginning January 1st, 1% of every purchase
                contributes to the rebuilding of native forest landscapes in Kenya and Tanzania.
            </p>
            <button class="btn-coffe2">
                Learn More
            </button>
        </div>
    </div>
</main>
<aside>
    <div class="container-aside">
        <div class="img-aside">
            <img src="./layout/public/img/man1.png" alt="">
        </div>
        <div class="img-aside">
            <img src="./layout/public/img/coffe-img.img" alt="">
        </div>
    </div>
    <marquee behavior="scroll" direction="left" scrollamount="10">Community focused roasters of exquisite coffee,
        making an impact at origin and at home</marquee>
</aside>

<div class="container-main3">
    <div class="logo-fix">
        <img src="./layout/public/img/logo-fix.svg" alt="">
    </div>
    <div class="text-main3">
        <h1>
            SMALL LOT COFFEES CURATED WITH YOU IN MIND
        </h1>
        <p>
            Unique small-lot coffees from our globe-spanning network of artisan producers, roasted to perfection and
            delivered to you each month.
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
</aside>
<main>
    <div class="special-about1">
        Seeking something special? We’ve got a few notes.<b>Start your search with specific coffee
            characteristics.</b>
        <div class="badge">
            <img src="./layout/public/img/badge-quality.svg" alt="">
        </div>
        <div class="text">
            <p>Narrow your options<i class="bi bi-arrow-down"></i></p>
        </div>
    </div>
</main>
<section>
    <div class="option">
        <?php foreach ($listCat as $key => $value) {
            echo '<a href="index.php?trang=sort&idCat=' . $value['id'] . '"><p>' . $value['NAME'] . '</p></a>';
        } ?>
    </div>
</section>
</body>

</html>