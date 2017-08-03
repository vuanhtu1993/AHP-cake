<div class="col-xs-4 col-sm-3 col-md-3">
    <div class="product_list">
        <div class="product_list_title">
            Danh mục sản phẩm
        </div>
        <?php
        $menu_left_product = $this->requestAction('comment/get_menuleft');
        foreach ($menu_left_product as $row) {
        ?>
        <div class="sanpham"><a href="<?php echo DOMAIN ?><?php echo $row['Catproduct']['alias'].'.htm'; ?>"><?php echo $row['Catproduct']['name']; ?></a></div>
        <?php } ?>

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
        <!--        tin tuc            -->
        <div class="product_list_title">Tin Tức</div>
        <?php
        $menu_left = $this->requestAction('comment/left_news');
        foreach ($menu_left as $row) {
            ?>
            <div class="menuleft_new">
                <a href="">
                    <img class="img-responsive"
                         src="<?php echo DOMAIN ?>timthumb.php?src=<?php echo DOMAIN; ?><?php echo $row['News']['images']; ?>"
                         alt="">
                    <p><?php echo $row['News']['name']; ?></p>
                </a>
            </div>
        <?php } ?>
    </div>
    <!--       thong ke          -->
    <div class="menuleft_access">
        <div class="product_list_title">THỐNG KÊ TRUY CẬP</div>
        <div class="online "> Đang online: 2</div>
        <div class="online "> Hôm nay: 12</div>
        <div class="online "> Tổng số lượt truy cập: 13166</div>

    </div>
</div>