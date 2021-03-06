<?php

/* @var $model app\models\Products */

?>
<div id="slider">
    <ul>
        <li style="background-image: url(/web/images/0.jpg)">
            <h3>Make your life better</h3>
            <h2>Genuine diamonds</h2>
            <a href="#" class="btn-more">Read more</a>
        </li>
        <li class="purple" style="background-image: url(/web/images/01.jpg)">
            <h3>She will say “yes”</h3>
            <h2>engagement ring</h2>
            <a href="#" class="btn-more">Read more</a>
        </li>
        <li class="yellow" style="background-image: url(/web/images/02.jpg)">
            <h3>You deserve to be beauty</h3>
            <h2>golden bracelets</h2>
            <a href="#" class="btn-more">Read more</a>
        </li>
    </ul>
</div>
<div id="body">
    <div class="container">
        <div class="last-products">
            <h2>Last added products</h2>
            <section class="products">
                <? foreach ($products as $product): ?>
                    <article>
                        <img src="<?=$product['file']?>" alt="">
                        <h3>Excepteur sint occaecat</h3>
                        <h4>$<?=$product['price']?></h4>
                        <a href="cart.html" class="btn-add">Add to cart</a>
                    </article>
                <? endforeach; ?>
            </section>
        </div>
        <section class="quick-links">
            <article style="background-image: url(/web/images/2.jpg)">
                <a href="#" class="table">
                    <div class="cell">
                        <div class="text">
                            <h4>Lorem ipsum</h4>
                            <hr>
                            <h3>Dolor sit amet</h3>
                        </div>
                    </div>
                </a>
            </article>
            <article class="red" style="background-image: url(/web/images/3.jpg)">
                <a href="#" class="table">
                    <div class="cell">
                        <div class="text">
                            <h4>consequatur</h4>
                            <hr>
                            <h3>voluptatem</h3>
                            <hr>
                            <p>Accusantium</p>
                        </div>
                    </div>
                </a>
            </article>
            <article style="background-image: url(/web/images/4.jpg)">
                <a href="#" class="table">
                    <div class="cell">
                        <div class="text">
                            <h4>culpa qui officia</h4>
                            <hr>
                            <h3>magnam aliquam</h3>
                        </div>
                    </div>
                </a>
            </article>
        </section>
    </div>
</div>
