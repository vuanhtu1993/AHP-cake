<div  id="navgallery" class="clearfix">
  <h3>Đối tác</h3>
  <div id="container-wapper">
    <div class="list_carousel">
      <ul id="foo">
          <?php $project = $this->requestAction('/comment/project');
           foreach ($project as $parents) { ?>
        <li>
          <div class="box-item">
            <div class="box-img"> <a title="<?php echo $parents['Project']['name'] ?>" href="<?php echo $parents['Project']['link'] ?>">
            <img class="imgnav"  src="<?php echo DOMAIN.$parents['Project']['images'] ?>" alt="" width="205" height="164"></a></div>
          </div>
        </li>
       <?php }?>
      </ul>
      <div class="clearfix"></div>
      <a id="prev" class="prev_bot" href="#"><img  src="<?php echo DOMAIN ?>images/back.png"/></a> <a id="next" class="next_bot" href="#"><img  src="<?php echo DOMAIN ?>images/next.png"/></a> 
      </div>
  </div>     
</div>
