<div class="detail-container">
    <div class="detail-pic">
    <img src="./<?=$result[0]['picture']?>" alt="">
    </div>

    <div class="detail-text">
        <h1>
        <?=$result[0]['NAME']." ".$result[0]['price']."$"?>
        </h1>
        <div class="list">
            <p>
                Light Roast
            </p>
            <p>
                Single Origin
            </p>
        </div>
        <p class="detail-about">
            Innovative producer Jhon Samboni brings us this experimental anaerobic gesha lot from his family farm in
            Huila,
            Colombia. Gesha is considered to be in the top-tier of specialty coffee and is known for its sweet and
            delicate flavors. The anaerobic fermentation process enhances the unique characteristics of this varietal
            resulting in a lovely rose aroma with a pineapple sweetness, grapefruit acidity, and blueberry finish.
        </p>
        <hr>
        <div class="mini">
            <p>
                Tasting Notes
            </p>
            <ul class="min">
                <li><span class="color1"></span> pineapple</li>
                <li><span class="color2"></span> grapefruit</li>
                <li><span class="color3"></span> blueberry</li>
            </ul>
        </div>
        <hr>
        <div class="mini2">
            <p>
                Size
            </p>
            <ul class="min1">
                <li> pineapple</li>
                <li>grapefruit</li>
                <li>blueberry</li>
            </ul>

        </div>
        <hr>
       
    <form method="post" action="index.php?trang=cart">
        <input type="hidden" name="product_id" value="<?= $result[0]['id'] ?>">
        <input type="hidden" name="quantity" value="1">
        <button type="submit" name="add_to_cart" class="cart">Add To Cart</button>
    </form>


    </div>
</div>
    <?php 
    foreach($CategorySame as $key => $value){
        foreach($value as $pro){
            if (is_array($pro)) {
                if (isset($pro['NAME'])) {
                    echo $pro['NAME'];
                }
                if (isset($pro['price'])) {
                    echo $pro['price'];
                }
                if (isset($pro['picture'])) {
                    echo $pro['picture'];
                }
            } else {
                // Handle the case where $pro is not an array
               
            }
        }
    }
?>
    <section>
    <div class="container-detail">
    <?php for($i=0; $i<10; $i++) {
        if(isset($CategorySame[$i]['NAME'])) {
    ?> 
        <div class="product-detail">
            <p><?= htmlspecialchars($CategorySame[$i]['NAME']) ?></p>
            <p><?= htmlspecialchars($CategorySame[$i]['price']) ?></p>
           <a href="indexphp?trang=detail&id=<?php echo $CategorySame[$i]['id']?>&idCat=<?php echo $CategorySame[$i]['idCat']?>"> <img src="../<?= htmlspecialchars($CategorySame[$i]['picture']) ?>" alt=""></a>
        </div>
    <?php 
        } else {
            continue; // Skip to the next iteration
        }
    }
    ?>
</div>
    </section>

<main>
        <div class="container_main_detail">
           <div class="detail_main_text">
           Kalita Wave
           </div>
           <div class="detail_main_video">
           <video src="./layout/public/img/Brewing Coffee with the Kalita Wave.mp4" autoplay controls></video>
           </div>
           <div class="main-postion">
            <img src="./layout/public/img/5d84f0f75c20989da95a6d0860f85e18ecfa8541-271x166.svg" alt="">
           </div>
           <div class="text-main-postion">
           The flat bottom of this handy brewer is the key to<br>  making a consistently 
           <br>delicious cup, forcing water to reach all crevices <br> of the ground coffee 
           and developing a 
           <br>richer flavor along the way.
           </div>
        </div>
</main>