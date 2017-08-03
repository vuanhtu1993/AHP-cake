<?php
//echo đa ngôn ngữ
if($this->Session->read('language') == 'vn' || $this->Session->read('language') == "")
{
    include('../Vendor/lang_vn.php');
    $duoi=null;
}
else { $duoi="_en"; include('../Vendor/lang_en.php');
}
?>

<div class="menu_left">
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-3">
                <div class="product_list">
                    <div class="product_list_title">
                        Danh mục sản phẩm
                    </div>
                    <div class="sanpham"><a href="">Bàn ghế cafe</a></div>
                    <div class="sanpham"><a href="">Bàn ghế cafe</a></div>
                    <div class="sanpham"><a href="">Bàn ghế cafe</a></div>
                    <div class="sanpham"><a href="">Bàn ghế cafe</a></div>

                </div>
                <div class="support_online">
                    <div class="product_list_title">
                        HỖ TRỢ TRỰC TUYẾN
                    </div>
                    <div class="icon_support glyphicon glyphicon-phone"></div>
                    <div class="phone_number">
                        0945 365 882 <br>
                        0919 629 759
                    </div>
                </div>
                <div class="menuleft_news">
                    <div class="product_list_title">Tin Tức</div>
                    <?php
                    $menu_left=$this->requestAction('comment/left_news');
                    foreach($menu_left as $row){
                        ?>
                        <div class="menuleft_new">
                            <a href="">
                                <img class="img-responsive" src="<?php echo DOMAIN ?>timthumb.php?src=<?php echo DOMAIN; ?><?php echo $row['News']['images']; ?>" alt="">
                                <p><?php echo $row['News']['name'];?></p>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="menuleft_access">
                    <div class="product_list_title">THỐNG KÊ TRUY CẬP</div>
                    <div class="online "> Đang online: 2</div>
                    <div class="online "> Hôm nay: 12</div>
                    <div class="online "> Tổng số lượt truy cập: 13166</div>

                </div>
            </div>
            <!--  ---------------------------------   end menu left    ------------------------------   -->
            <div class="col-xs-8 col-sm-9 col-sm-9">

                <!--                --><?php //foreach ($listNews as $row){?>
                <!--                <div class="list_new">-->
                <!--                 <div class="images_listnew img-responsive"><img src="--><?php //echo DOMAIN ?><!----><?php //echo $row['News']['images']; ?><!--" alt=""></div>-->
                <!--                --><?php // echo $row['News']['name']; ?>
                <!--                --><?php // echo $row['News']['shortdes']; ?>
                <!--                </div>-->
                <!--                --><?php // } ?>
                <div class="list_news">
                    <div class="product_list_title">mẫu thiết kế</div>
<!--                    --><?php //foreach ($listNews as $row) { ?>
<!--                        <div class="row">-->
<!--                            <div class="list_new">-->
<!--                                <div class="col-xs-4 col-sm-3 col-md-3">-->
<!--                                    <div class="image_listnews"><img class="img-responsive" src="--><?php //echo DOMAIN; ?><!----><?php //echo$row['News']['images']; ?><!--" alt=""></div>-->
<!--                                </div>-->
<!--                                <div class="col-xs-8 col-sm-9 col-md-9">-->
<!--                                    <div class="quote_listnews">-->
<!--                                        <span><a href="">--><?php // echo $row['News']['name']; ?><!--</a></span><br>-->
<!--                                        <a href="">--><?php //echo $row['News']['shortdes']; ?><!--</a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //} ?>
                </div>
            </div>
<!--    end col        -->
        </div>
    </div>
</div>

