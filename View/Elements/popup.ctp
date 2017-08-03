 <div id="order_popup">
  <div id="div_goingay" >Gọi ngay để đặt hàng: <?php
      $setting = $this->requestAction('/comment/setting');
      echo $setting['Setting']['hotline'];
    ?> </div>
  <a href="#" class="btn_popup show" style="display: none;"></a>
  <a href="#" class="btn_popup hide" style="display: block;"></a>   
  <div class="clear"></div>
  <div id="content_popup_order" style="display: block;">
      <div class="img_tel bg"><img  src="<?php echo DOMAIN; ?>images/img_call.png "/>
      </div>
    <div class="list_number">
      <?php 
        $call = $this->requestAction('/comment/call');
        foreach ($call as $rows) 
          { ?>
            <div><?php echo $rows['Support']['name'];?>: <?php echo $rows['Support']['hotline'];?></div>
        <?php
          }
        ?>
        
      
    </div>
  </div>
</div>