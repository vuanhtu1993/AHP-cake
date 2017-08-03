<!--slide-->
<!-- Start WOWSlider.com BODY section -->

<div id="wowslider-container1">
    <div class="ws_images"><ul>
            <?php $slideshow = $this->requestAction('comment/slideshow');
            foreach ($slideshow as $row) { ?>
        <li><img src="<?php echo DOMAIN ?><?php echo $row['Slideshow']['images']; ?>" alt="image-slide" title="image-slide" id="wows1_0"/></li>
            <?php } ?>
    </ul></div>
    <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com"></a> </div>
    <div class="ws_shadow"></div>
</div>
<script type="text/javascript" src="<?php echo DOMAIN ?>engine1/wowslider.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN ?>engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->

