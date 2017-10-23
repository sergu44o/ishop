<?php
/* @var $array array */
/* @var $category string */
?>

<div id="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li><?=($category)?></li>
        </ul>
    </div>
    <!-- / container -->
</div><!-- / body -->

<div id="body">
    <div class="container">
        <?=\yii\widgets\LinkPager::widget(['pagination' => $array['pages']])?>
        <div class="products-wrap">
            <aside id="sidebar">
                <div class="widget">
                    <h3>Products per page:</h3>
                    <fieldset>
                        <label><input checked type="radio"> 8</label>
                        <label><input type="radio"> 16</label>
                        <label><input type="radio"> 32</label>
                    </fieldset>
                </div>
                <div class="widget">
                    <h3>Sort by:</h3>
                    <fieldset>
                        <input checked type="checkbox"> <label>Popularity</label> <input type="checkbox">
                        <label>Date</label> <input type="checkbox"> <label>Price</label>
                    </fieldset>
                </div>
                <div class="widget">
                    <h3>Condition:</h3>
                    <fieldset>
                        <input checked type="checkbox"> <label>New</label> <input type="checkbox"> <label>Used</label>
                    </fieldset>
                </div>
                <div class="widget">
                    <h3>Price range:</h3>
                    <fieldset>
                        <div id="price-range"></div>
                    </fieldset>
                </div>
            </aside>
            <div id="content">
                <section class="products">
                    <?php foreach ($array['products'] as $product): ?>
                        <article>
                            <a href="product.html"><img src="<?=$product['file']?>" alt=""></a>
                            <h3><a href="product.html">Lorem ipsum dolor</a></h3>
                            <h4><a href="product.html">$990.00</a></h4>
                            <a href="cart.html" class="btn-add">Add to cart</a>
                        </article>
                    <?php endforeach; ?>
                </section>
            </div>
            <!-- / content -->
        </div>
        <?=\yii\widgets\LinkPager::widget(['pagination' => $array['pages']])?>
    </div>
    <!-- / container -->
</div><!-- / body -->
