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



<div id="left" align="center">
	<div id="danhmuc" align="left" style="border: none; background-color: #e30000;">
        <!-- <div id="div_danhmuc">Danh mục sản phẩm</div>  -->
        <div id="smoothmenu2" class="ddsmoothmenu-v">
			<?php
				$menuleft = $this->requestAction('/comment/menuleft');
				echo $menuleft;
			?>
		</div>
    </div>
	

		<?php 
			$quangcao_left1=$this->requestAction('comment/quangcao_trai1');

		?>

	<div id="danhmuc" align="left">
        <div id="div_danhmuc">Tin tức nổi bật</div> 
        
			<?php
				$tinNB = $this->requestAction('/comment/tinNB');
				
			?>
			<table id="tbl_news"  width="100%" border="0" cellspacing="4" cellpadding="4">	
                <?php foreach ($tinNB as $rows) { ?>
                    <tr>
                        <td id="td_news" style="padding-bottom: 6px; padding-left: 5px; padding-right: 5px;">
							<div id="div_noidung_tin2" align="justify">
                                <?php if ($rows['News']['images'] != "") { ?>
                                    <div style="float: left; margin-right: 5px;"><a title="<?php echo $rows['News']["name$duoi"]; ?>" href="<?php echo DOMAIN; ?>chi-tiet-tin/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['alias']; ?>.html"><img  class="imgproductad"  src="<?php echo DOMAIN; ?><?php echo $rows['News']['images']; ?>" /></a></div>
                                <?php } ?>
                                <span class="noidung_tin">
                                	<?php
										$descsk = substr(strip_tags($rows['News']['shortdes'] ), 0, 100);
										
										if ((strlen($rows['News']['shortdes'] )  ) > 100) {
										 // trim the description back to the last period or space so words aren't cut off
										 $period_pos = strrpos($descsk, ".");
										 $space_pos = strrpos($descsk, " ");
										 // find the character that we should trim back to. -1 on space pos for a space that follows a period, so we dont end up with 4 periods
										 if ($space_pos - 1 > $period_pos) {
										  $pos = $space_pos;
										 }
										 else {
										  $pos = $period_pos;
										 }
										 $descsk = substr($descsk, 0, $pos);
										 $descsk .= "...";
										 echo $descsk;
										}else echo $rows['News']['shortdes'] ;
									?>
                                </span>
                                
                                
                            </div>

						</td>
						
                    </tr>
					
                <?php } ?>
                
            </table>
		            
    </div>

    <div id="danhmuc" align="left">
        <div id="div_danhmuc">Liên kết facebook</div> 
        <div class="facebook">
			<div style="background: #fff;" class="fb-like-box fb_iframe_widget" data-href="<?php echo $setting['Setting']['facebook'] ?>" data-width="209" data-height="290" data-show-faces="true" data-stream="false" data-header="600" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=209&amp;header=false&amp;height=290&amp;href=<?php echo $setting['Setting']['facebook'] ?>&amp;locale=vi_VN&amp;sdk=joey&amp;show_faces=true&amp;stream=false&amp;width=209">
                            <span style="vertical-align: bottom; width: 209; height: 290px;">
                            <iframe name="f12101cb1" style="width: 209px !impotant;" width="209" height="290px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like_box Facebook Social Plugin" src="http://www.facebook.com/v2.3/plugins/like_box.php?app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2FKvoNGODIqPG.js%3Fversion%3D41%23cb%3Df350dcdfd8%26domain%3Danmac.vn%26origin%3Dhttp%253A%252F%252Fanmac.vn%252Ff16363dd0c%26relation%3Dparent.parent&amp;container_width=209&amp;header=false&amp;height=290&amp;href=<?php echo $setting['Setting']['facebook'] ?>&amp;locale=vi_VN&amp;sdk=joey&amp;show_faces=true&amp;stream=false&amp;width=209" style="border: none; visibility: visible; width: 209; height: 290px;" class=""></iframe></span></div>
			
		</div>
    </div>

	
		
	
	<div id="danhmuc" align="left">
        <div id="div_danhmuc">Bộ đếm truy cập</div> 
        <?php echo $this->element('counter'); ?>
        <div id="div_adv"> 
			<?php foreach($quangcao_left1 as $row) {
			?>
				<a  href="<?php echo $row['Advertisement']['link']?>" rel="nofollow">
					<img id="img_adv"  src="<?php echo DOMAIN ?><?php echo $row['Advertisement']['images'] ?>"/>
				</a>
			<?php
			} 
			?>
		</div>
    </div>

						
		
</div>

