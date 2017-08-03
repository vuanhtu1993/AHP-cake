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
                    <div class="product_list_title"><?php echo $typeName['Catproduct']['name'] ?></div>
                    <?php
                    $i = 0;
                    foreach ($listProduct as $row1) {
                        $i++;
                        ?>
                        <div class="col-xs-6 col-sm-4 col-lg-4" >
                            <div class="main_box" >
                                <a href="<?php echo DOMAIN ?><?php echo $row1['Product']['slug'] . '.html' ?>" title="">
                                    <div class="product-image">
                                        <img class="img-responsive"
                                             src="<?php echo DOMAIN ?><?php echo $row1['Product']['images'] ?>" alt="">
                                    </div>
                                </a>
                                    <div class="desc">
                                        <span><?php echo $row1['Product']['name'] ?><?php echo $row1['Product']['code'] ?></span><br>
                                        <span style=" color: red">

                                            <span id="gia"><?php echo number_format($row1['Product']['price']); ?>
                                                VNĐ</span></span>
                                    </div>

                                <div class="code_listproduct">
                                   <span>Mã SP: <?php echo $row1['Product']['code']; ?></span>
                                </div>
                                <div class="purchase"><a href="">Đặt Mua</a></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .main_box {
        margin-top: 10px;
        text-align: center;
        background-color: #eeeeee;
        height: 325px;
    }
    .product-image {
        padding-top: 10px;
        padding-left: 10px;
        padding-right: 10px;
    }
    .desc span {
        font-size: 16px;

    }
    .code_listproduct{
        float: left;
        margin-left: 10px;
        margin-top: 8px;
    }
    .purchase{
        float: right;
        margin-right: 20px;
        background: #00aeef;
        padding: 5px;
        border-radius: 5px;
        color: white;

    }
</style>