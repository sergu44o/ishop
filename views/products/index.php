<?php
/* @var $array array */
/* @var $category string */
/* @var $sort string */
/* @var $condition string */
/* @var $per_page int */

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
                        <input <?= $per_page == 9 ? "checked" : "" ?> name="per-page"  type="checkbox"> <label>9</label>
                        <input <?= $per_page == 18 ? "checked" : "" ?> name="per-page" type="checkbox"> <label>18</label>
                        <input <?= $per_page == 36 ? "checked" : "" ?> name="per-page" type="checkbox"> <label>36</label>
                    </fieldset>
                </div>
                <div class="widget">
                    <h3>Sort by:</h3>
                    <fieldset>
                        <input <?= $sort == 'popularity'? "checked" : "" ?>  type="checkbox" name="sort"> <label>Popularity</label>
                        <input <?= $sort == 'date' ? "checked" : "" ?> type="checkbox" name="sort"> <label>Date</label>
                        <input <?= $sort == 'price' ? "checked" : "" ?> type="checkbox" name="sort"> <label>Price</label>
                    </fieldset>
                </div>
                <div class="widget">
                    <h3>Condition:</h3>
                    <fieldset>
                        <input <?= strpos($condition,'new') !== false ? "checked" : "" ?> type="checkbox" name="condition"> <label>New</label>
                        <input <?= strpos($condition,'used') !== false ? "checked" : "" ?> type="checkbox" name="condition"> <label>Used</label>
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
                            <a href="<?=$category . '/' . $product['id']?>"><img src="<?=$product['file']?>" alt=""></a>
                            <h3><a href="<?=$category . '/' . $product['id']?>">Lorem ipsum dolor</a></h3>
                            <h4><a href="<?=$category . '/' . $product['id']?>"><?=$product['price']?> $</a></h4>
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
<script>
    $(document).ready(function () {
        var params = {};
        var checked_inputs = $('input:checked');
        var slider = $('div#price-range');
        slider.slider({min:1, max:500});
        var full_url = window.location.href;
        var url = full_url.split('?')[0] + '?';
        var request = full_url.split('?')[1];
        if (request)
        {
            request = request.split('&');
            $.each(request, function (index, value) {
                var param = value.split('=');
                params[param[0]] = param[1];
                if (params.minprice) {
                    slider.slider({values:[params.minprice,params.maxprice]});
                    $('div#price-range a:first-of-type span').text('$' + params.minprice);
                    $('div#price-range a:last-of-type span').text('$' + params.maxprice);
                }
            });
        } else {
            slider.slider({values:[1,500]});
            $('div#price-range a:first-of-type span').text('$' + 1);
            $('div#price-range a:last-of-type span').text('$' + 500);
            params.minprice = 1;
            params.maxprice = 500;
        }
        
        $('input').on('change', function () {
            var checked = $(this).prop('checked');
            var param = $(this).attr('name');
            var value = this.labels[0].innerText;
            if (param !== 'condition') {
                params[param] = value;
            } else {
                params.condition = $("input[name=condition]").map(function () {
                    if ($(this).prop('checked'))
                    {
                        return $(this).next().text()
                    }
                }).get().join('+').toLowerCase();
            }
            url += $.param(params);
            window.location.href = url;
        });
        
        $('div#price-range a').on("mouseup", function () {
            price_range = $('div#price-range').text().split("$");
            params.minprice = price_range[1];
            params.maxprice = price_range[2];
            url += $.param(params);
            url = url.replace(/\%\d+B/g, '%2B');
            window.location.href = url;
        })

    })
</script>
