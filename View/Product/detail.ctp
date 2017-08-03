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
                    <div class="product_list_title">Chi Tiết Sản Phẩm</div>
                    <div class="product_detail">
                        <div class="row">
                            <div class="col-xs-12 col-sm-5 col-md-5">
                                <div class="image_product_detail">
                                    <img src="<?php echo DOMAIN ?><?php echo $detailNews['Product']['images']; ?>"
                                         alt="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-7">
                                <div class="title_product_detail">
                                    <?php echo $detailNews['Product']['name'] ?>
                                </div>
                                <div class="price_product_detail">
                                    Giá: <?php echo $detailNews['Product']['price']; ?> VNĐ
                                </div>
                                <div class="code_product_detail">
                                    Mã SP: <?php echo $detailNews['Product']['code']; ?>
                                </div>
                                <div class="purchase_immediately">
                                    <a href=""><img src="images/datmua.png" alt=""></a>
                                </div>

                            </div>
                        </div>
                    </div> <!--  end product_detail    -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .product_detail {
        margin-top: 20px;

    }
    .title_product_detail {
        font-size: 25px;
        text-transform: uppercase;
    }
    .price_product_detail {
        margin-top: 20px;
        font-size: 20px;
        color: red;
    }
    .code_product_detail {
        margin-top: 10px;
        font-size: 16px;
    }
</style>