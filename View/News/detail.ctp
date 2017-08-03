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
                    <div class="product_list_title">Chi Tiết Tin</div>
                    <div class="detail_news">
                        <?php foreach ($detailNews as $row1) { ?>
                            <div class="image_detailnews">
                            <img src="<?php echo DOMAIN ?><?php echo $row1['images']; ?>" alt="">
                            </div>
                            <div class="name_detailnews"> <?php echo $row1['name']; ?></div>

                            <div class="shortdes_detailnews"><?php echo $row1['shortdes']; ?></div>
                            <div class="content_detailnews"><?php echo $row1['content']; ?></div>
                        <?php } ?>
                    </div>
            </div>
        </div>
    </div>
</div>

<style>
    .detail_news {
        text-align: center;
        margin-top: 20px;
    }
    .name_detailnews {
        margin-top: 10px;
        font-size: 16px;
    }
    .shortdes_detailnews {
        text-align: left;
        margin-top: 20px;
        font-size: 16px;
    }
    .content_detailnews{
        text-align: left;
        margin-top: 20px;
        font-size: 16px;
    }
</style>