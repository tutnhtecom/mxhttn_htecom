<?php if ($wo['config']['classified'] == 1): ?>
    <div id="sidebar-latest-products" class="sidebar-latest-products">
        <?php $get_latest_products = Wo_GetProducts(array('limit' => 4)); ?>
        <ul class="list-group">
            <li class="list-group-item text-muted sidebar-title-back" contenteditable="false"><a href="<?php echo Wo_SeoLink('index.php?link1=products') ?>" data-ajax="?link1=products"><?php echo $wo['lang']['market'] ?></a></li>
            <li class="activities-wrapper sidebar-product-slider">
                <?php
                foreach ($get_latest_products as $key => $wo['product']) {
                    echo Wo_LoadPage('sidebar/product-style');
                }
                ?>
            </li>
        </ul>
    </div>
<?php endif ?>