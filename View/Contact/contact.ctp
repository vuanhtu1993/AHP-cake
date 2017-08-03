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
                    <div class="product_list_title">Liên Hệ</div>
                    <div class="col-xs-12 col-sm-6 col-ms-6">
                        <div class="form-area">
                            <form role="form">
                                <br style="clear:both">
                                <h3 style="margin-bottom: 25px; text-align: center;">Contact Form</h3>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                                    <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>
                                </div>

                                <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Submit Form</button>
                            </form>
                        </div>
                    </div>
                    <div class="info_contact">
                    <div class="col-xs-12 col-sm-6 col-ms-6">
                        <p style="font-weight: bolder; font-size: 18px">CÔNG TY TNHH CÔNG NGHIỆP HOÀNG PHÁT</p>
                        <span style="font-weight: 600">Địa chỉ:</span><span>Thị Trấn Như Quỳnh, Huyện Văn Lâm, Tỉnh Hưng Yên</span><br>

                        <span style="font-weight: 600">Hotline:</span><span>0945.365.882 </span><br>

                        <span style="font-weight: 600">Email:</span><span>Congnghiephoangphat@gmail.com</span><br>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

    .red{
        color:red;
    }
    .form-area
    {
        background-color: #FAFAFA;
        padding: 10px 40px 60px;
        margin: 10px 0px 60px;
        border: 1px solid GREY;
    }
    .info_contact {
        margin-top: 10px;
    }
</style>
<script>
    $(document).ready(function(){
        $('#characterLeft').text('140 characters left');
        $('#message').keydown(function () {
            var max = 140;
            var len = $(this).val().length;
            if (len >= max) {
                $('#characterLeft').text('You have reached the limit');
                $('#characterLeft').addClass('red');
                $('#btnSubmit').addClass('disabled');
            }
            else {
                var ch = max - len;
                $('#characterLeft').text(ch + ' characters left');
                $('#btnSubmit').removeClass('disabled');
                $('#characterLeft').removeClass('red');
            }
        });
    });

</script>