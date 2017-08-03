
	<SCRIPT LANGUAGE="JavaScript">
							function go(url){
							    document.getElementById('image').src = url;
							}
	</script>
	
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
				  
				  <script>
				  $(document).ready(function() {
				    $("#vienbao").tabs();
				  });
				  </script>
				  
 <?php 
//echo $this->Session->read('language'); die;
if($this->Session->read('language')=='vn') 
{  
  include('../Vendor/lang_vn.php');
  $duoi=null;  
} 
elseif($this->Session->read('language')=='cn') 
{  
  include('../Vendor/lang_cn.php');
  $duoi="_cn"; 
} 
else { $duoi="_en"; include('../Vendor/lang_en.php');
 }
 ?>
 
<div id="vienbao" class="mainbox">
    <ul>
        <li style="margin-top: -4px;"><a href="#fragment-1"><span><?php echo $gallery ?></span></a></li>
     </ul>
	<div id="fragment-1">
		<?php $anh = $this->requestAction('/comment/anhanh'); //goi ham spmoi ?>
		<div id="slider-wrapper" style="height: 420px; width: 610px">
			
			<?php 
				foreach ($anh as $rows) { ?>
				
				<img id="image" class="anh_gallery" src="<?php echo DOMAIN?>timthumb.php?src=<?php echo DOMAIN; ?>admin/webroot/img/product/<?php echo $rows['Product']['images']; ?>&amp;h=400&amp;w=615&amp;zc=2"/>
			<?php 
				} ?>
		</div>

		
		<div style="text-align: center"><?php echo $click ?></div>
		<div id="gallery" style="margin-top: 10px;">
			
			
			<table id="tblcontent" width="100%" height="100%"  cellpadding="0" cellspacing="8" >
												
							
													<tr >
														
														<?php 
														$numItems = count($listProduct);
														$i = 1;
													foreach ($listProduct as $rows) { ?>
															<td id="td_Sanpham" valign="top">
																<div>
																		<img class="anh_gallery" src="<?php echo DOMAIN?>timthumb.php?src=<?php echo DOMAIN; ?>admin/webroot/img/product/<?php echo $rows['Product']['images']; ?>&amp;h=100&amp;w=113&amp;zc=2"
																		onclick="go('<?php echo DOMAIN?>timthumb.php?src=<?php echo DOMAIN; ?>admin/webroot/img/product/<?php echo $rows['Product']['images']; ?>&amp;h=400&amp;w=615&amp;zc=2')"		/>
																	
																	
																	
																	
																</div>
															</td>
															<?php
															if ($i % 5 == 0) {?>
																
																<tr><td ></td></tr>
															<?php }
															
															$i++;
														}
														?>
													</tr>
												</table>
			
		
		</div>
		<?php echo $this->Html->css(array('pagination')); ?> 
		<div class="pagination" style="text-align: center; margin: 4px auto; text-decoration: none; ">
    <?php	
		if($this->Paginator->counter('{:pages}') > 1){
        echo $this->Paginator->first(" « $dau ", null, null, array('class' => 'disabled'));     
        echo $this->Paginator->prev(" « $truoc ", null, null, array('class' => 'disabled')); 
        echo $this->Paginator->numbers()." ";
        echo $this->Paginator->next(" $tiep » ", null, null, array('class' => 'disabled')); 
        echo $this->Paginator->last(" $cuoi » ", null, null, array('class' => 'disabled')); 
		}
    ?>
	</div>
	</div>
</div>
	


	
	
