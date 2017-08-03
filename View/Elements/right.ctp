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
<div id="right">
	
<div id="danhmuc" align="center">			
		<div id="div_danhmuc"><?php echo $tructuyen ?></div>		
			
			<!-- 
	    	<script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
	    	 -->
		<!-- <table style="width: 190px;">
				<?php $hotro = $this->requestAction('/comment/support');  ?>
					<?php 
					foreach ($hotro as $rows) { ?>
						<tr>
							<td style="width: 80px;"><div class="chucvu"><?php echo $rows['Support']['duty'.$duoi]; ?></div></td>
							<td>
								<div >
									<a href="ymsgr:SendIM?<?php echo $rows['Support']['yahoo']; ?>">
										<img border="0" width="62px"  src="http://opi.yahoo.com/online?u=mrbean155&amp;m=g&amp;t=2">
									</a>
								</div>
							</td>
							<td>
								<div id="btnSky">
									<a href="skype:${<?php echo $rows['Support']['skype']; ?>}?message">
										<img src="<?php echo DOMAIN  ?>images/skype.png" style="border: none;" alt="My status">
									</a>
								</div>
							</td>
						</tr>
					<?php	
						}
					?>		
			</table> -->
			<div id="div_support">
				<div id="abs_phone">
			    		<?php echo $setting['Setting']['phone']; ?>
			    </div>
				<div  id="hotline">
					<div id="txt_hotline">HOTLINE</div>
					<div id="txt_phone">
			    		<?php echo $setting['Setting']['hotline']; ?>
			    	</div>
							
		    	</div>

		    	<div class="div_email">
		    		<b>Email:</b> <?php echo $setting['Setting']['email']; ?>	    	
		    	</div>
		    	<div class="div_email">
		    		<b>Điện thoại:</b> <?php echo $setting['Setting']['telephone']; ?>	    	
		    	</div>
		    	<div class="div_email">
		    		<b>Website:</b> <?php echo $setting['Setting']['url']; ?>	    	
		    	</div>

		    </div>
	    </div>


	    <div id="danhmuc" align="center">

	    	<?php $video1st = $this->requestAction('/comment/video1st'); ?>	
			<?php
				$video = $this->requestAction('/comment/video');
			?>
			<div id="div_danhmuc">Video tiêu biểu</div>
			<div id="video">
				<div id="aaa">
					<iframe id="frame" width="205px" height="160px" src="<?php echo $video1st['Video']['youtube'] ; ?>" frameborder="0" allowfullscreen></iframe>
				</div>
			
			  
				<?php foreach ($video as $rows) { ?>

					<div class="list_video" 
					onclick='go(" <?php echo $rows['Video']['youtube'] ; ?> ")'
					 >
						
							<?php echo $rows['Video']['name'] ; ?>
						
					</div>	

					<?php
					} ?>

				<SCRIPT LANGUAGE="JavaScript">
					function go(url){
					    document.getElementById('frame').src = url;
					}
				</script>
			</div>
			

		</div>
	    		
		<div id="danhmuc" align="center">			
			<div id="div_danhmuc">Đối tác tiêu biểu</div>
			<div class="newsticker-jcarousellite">
	            <ul>
	            <?php 
	            $project = $this->requestAction('/comment/project');
	            foreach ($project as $rows) { ?>
	                    <li>
	                        <div class="thumbnail quangcao" style=" height: auto; ">
	                            <a title="<?php echo $rows['Project']['name']?>" href='<?php echo $rows['Project']['link']?>'>
	                                <img src="<?php echo DOMAIN.$rows['Project']['images'] ?>"/>
	                            </a>
	                        </div>
	                    </li>
	                <?php } ?>
	            </ul>
			 </div><!-- End newsticker-jcarousetiltl-->

		</div>
</div>