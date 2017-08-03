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

<div class="boxmain">
	
	<?php if(!$this->Session->check('username')) {?>
	<a class="a_admin" id="a_dangnhap" rel="nofollow" href="<?php echo DOMAIN?>dang-nhap" ><img src="<?php echo DOMAIN; ?>images/user_03.png" >&nbsp<?php echo $dangnhap ?>&nbsp&nbsp&nbsp&nbsp</a>
	<a class="a_admin" rel="nofollow" href="<?php echo DOMAIN?>dang-ky">&nbsp&nbsp&nbsp&nbsp<img src="<?php echo DOMAIN; ?>images/dangki_03.png" >&nbsp<?php echo $dangki ?></a>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<?php } else {?>    
		<img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 
	src="http://c.gigcount.com/wildfire/IMP/CXNID=2000002.0NXC/bT*xJmx*PTEyOTQ5Mzk2NjY4NzUmcHQ9MTI5NDkzOTcxODQwNiZwPTUzMTUxJmQ9Jmc9MiZvPWY2NTlmY2ZkNzY4YTQwNGI5Yjk1/MTBkYWNjZDQ5NWQ3Jm9mPTA=.gif" />

	<embed src="http://www.xatech.com/web_gear/chat/chat.swf" quality="high" bgcolor="#000000" width="540" height="405" name="chat" 
	FlashVars="id=128557322" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" 
	pluginspage="http://xat.com/update_flash.shtml" /><br><small>
	<a target="_BLANK" href="http://xat.com/web_gear/?cb">Get your own Chat Box!</a> <a target="_BLANK" href="http://xat.com/web_gear/chat/go_large.php?id=128557322">Go Large!</a>
	</small>
	<br>					
	<?php }?>


						
					
				         
</div> 