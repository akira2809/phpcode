
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
        <p>Grind on the go! Shop our selection of hand grinders - starting at $89. SHOP</p>
    </div>
    <div class="product-container2">
  <?php foreach ($result as $product): ?>
    <div class="product-card2">
        <h1 class="sort-h1"><?=$product['NAME']?></h1>
        <a href="indexphp?trang=detail&id=<?= $product['id'] ?>&idCat=<?= $product['idCat'] ?>">
        <img src="./<?= $product['picture'] ?>" alt="<?= $product['NAME'] ?>"></a>
      <div class="product-info2">
        <p class="price2"><?= $product['price'] ?></p>
        <div class="tags2">
          <span class="tag2">Light Roast</span>
          <span class="tag2">Single Origin</span>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
