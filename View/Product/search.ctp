<?php 
	//echo đa ngôn ngữ
	if($this->Session->read('language') == 'vn' || $this->Session->read('language') == "") 
	{  
	  include('../Vendor/lang_vn.php');
	  $duoi=null; 
	} 
	else { $duoi="_en"; include('../Vendor/lang_en.php');
	 }

	 $this->set('title_for_layout', "Kết quả tìm kiếm" );
	 ?>	


<div class="content">
    <div id="div_hot">
			<div id="cata">
				<span class="txt_cata">Kết quả tìm kiếm</span>
				<span><img src="<?php echo DOMAIN ?>images/cata_end.png" ></span>
			</div>
	        <table><tr><td>
					<?php 
						$numItems = count($listProduct);        
						if ( $numItems == 0 ) {
							echo "Sản phẩm bạn tìm kiếm hiện không có!!!";
						}
					foreach ($listProduct as $rows) { ?>
						<div id="posts" align="center">
							
								<div id="img_sam">
									<a  title="<?php echo $rows['Product']['name'.$duoi]; ?>"  href="<?php echo DOMAIN;?>chi-tiet/<?php echo $rows['Product']['id']; ?>/<?php echo $rows['Product']['alias']; ?>.html">
										<img class="bgproduct" src="<?php echo DOMAIN; ?><?php echo $rows['Product']['images']; ?>"   />
										
									</a>
									
								</div>

								<div class="txtTenSP"><a class="tieude" title="<?php echo $rows['Product']['name'.$duoi]; ?>" href="<?php echo DOMAIN;?>chi-tiet/<?php echo $rows['Product']['id']; ?>/<?php echo $rows['Product']['alias']; ?>.html">
										<?php echo $rows['Product']['name'.$duoi]; ?></a>
									</div>
	                     
								<div class="txtCode">
										Mã số: <?php echo $rows['Product']['code']; ?>
								</div>
								<div style="padding-top: 5px;">
									<a  title="<?php echo $rows['Product']['name'.$duoi]; ?>"  href="<?php echo DOMAIN;?>chi-tiet/<?php echo $rows['Product']['id']; ?>/<?php echo $rows['Product']['alias']; ?>.html">
										<img  src="<?php echo DOMAIN; ?>images/detail_btn.png"   />
										
									</a>
								</div>
								
							</div>	
					<?php 
						}
					?>
			</td></tr></table>	
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