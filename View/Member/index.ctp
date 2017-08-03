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
  $this->set('title_for_layout', $gocthanhvien );
 ?>
 

<div id="vienbao" class="mainbox">
    <ul>
        <li style="margin-top: -4px;"><a href="#fragment-1"><span><?php echo $gocthanhvien ?></span></a></li>
     </ul>
    <div id="fragment-1">
        <embed wmode="transparent" src="http://www.xatech.com/web_gear/chat/chat.swf" quality="high" width="615" height="405" name="chat" FlashVars="id=206893150" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://xat.com/update_flash.php" /><br><small> <a target="_BLANK" href="http://xat.com/web_gear/chat/go_large.php?id=206893150"></a></small><br>				
	</div>
</div> 