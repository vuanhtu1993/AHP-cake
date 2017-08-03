<?php
//echo đa ngôn ngữ
if ($this->Session->read('language') == 'vn' || $this->Session->read('language') == "") {
    include('../Vendor/lang_vn.php');
    $duoi = null;
} else {
    $duoi = "_en";
    include('../Vendor/lang_en.php');
}
?>

<div class="menu_left">
    <div class="container">
        <div class="row">
            <?php echo $this->element('left_menu'); ?>
            <!----------------------------------------refactor ------------------------------------     -->
            <!--  ---------------------------------   end menu left    ------------------------------   -->
            <div class="col-xs-8 col-sm-9 col-sm-9">
                <div class="list_news">
                    <div class="product_list_title">Sản Phẩm</div>

                    <?php foreach ($listProduct as $row) { ?>
                        <a href="<?php echo DOMAIN ?><?php echo $row['Product']['alias'].'.html' ?>">
                            <div class="col-xs-6 col-sm-3 col-md-3">
                                <div class="row">
                                    <div class="product_index">
                                        <div class="image_slide2">
                                            <img class="img-responsive"
                                                 src="<?php echo DOMAIN ?><?php echo $row['Product']['images']; ?>" alt="">
                                        </div>
                                        <div class="title_slide2">
                                            <span> <?php echo $row['Product']['name'] ?></span>
                                        </div>
                                        <div class="price_slide2">
                                            <span> Giá:<?php echo $row['Product']['price'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

