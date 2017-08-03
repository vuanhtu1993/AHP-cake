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
            <!--  ---------------------------------   end menu left    ------------------------------   -->
            <div class="col-xs-8 col-sm-9 col-sm-9">

                <!--                --><?php //foreach ($listNews as $row){?>
                <!--                <div class="list_new">-->
                <!--                 <div class="images_listnew img-responsive"><img src="-->
                <?php //echo DOMAIN ?><!----><?php //echo $row['News']['images']; ?><!--" alt=""></div>-->
                <!--                --><?php // echo $row['News']['name']; ?>
                <!--                --><?php // echo $row['News']['shortdes']; ?>
                <!--                </div>-->
                <!--                --><?php // } ?>
                <div class="list_news">
                    <div class="product_list_title">Tin tức</div>
                    <?php foreach ($listnews as $row) { ?>
                        <div class="row">
                            <div class="list_new">
                                <div class="col-xs-4 col-sm-3 col-md-3">
                                    <a href="<?php echo DOMAIN ?>chi-tiet-tin/<?php echo $row['News']['id'];  ?>"> <div class="image_listnews"><img class="img-responsive"
                                    src="<?php echo DOMAIN; ?><?php echo $row['News']['images']; ?>" alt=""></div></a>
                                </div>
                                <div class="col-xs-8 col-sm-9 col-md-9">
                                    <div class="quote_listnews">
                                        <span><a href="<?php echo DOMAIN ?>chi-tiet-tin/<?php echo $row['News']['id'];  ?>"><?php echo $row['News']['name']; ?></a></span><br>
                                        <?php echo $row['News']['shortdes']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

