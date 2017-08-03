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
  $this->set('title_for_layout', $sitemap );
 ?>
 
<div id="vienbao" class="mainbox">
    <ul>
        <li style="margin-top: -4px;"><a href="#fragment-1"><span><?php echo $sitemap ?></span></a></li>
     </ul>
<div id="fragment-1">
<div id="sitemap">
<h3><a href="http://develop11.vtmgroup.com.vn/lienhoa"><?php echo $home ?> </a>
<?php echo $capnhatcuoi ?>
</h3>


<table cellpadding="0" cellspacing="0" border="0" style=" width:609px">

<tr valign="top">
<td class="lpart" colspan="100"><div class="lhead">/
<span class="lcount">10 pages</span></div>

<table cellpadding="0" cellspacing="0" border="0" width="609px">

<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/" title="
            Welcome to Lien Hoa trading CO., LTD        ">
            <?php echo $trangchu ?>        </a></td></tr>
<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/lien-he" title="
            Contact        ">
            <?php echo $lienhe ?>        </a></td></tr>
<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/gioi-thieu" title="
            Welcome to Lien Hoa trading CO., LTD        ">
            <?php echo $gt ?>       </a></td></tr>
<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/san-pham.html" title="
            Product        ">
            <?php echo $sanpham ?>        </a></td></tr>
<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/tin-tuc" title="
            News        ">
            <?php echo $tintuc ?>        </a></td></tr>
<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/sp-moi" title="
            Product        ">
            <?php echo $spmoi ?>         </a></td></tr>
<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/gio-hang" title="
            Product        ">
            <?php echo $giohang ?>        </a></td></tr>
<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/khuyen-mai" title="
            Product        ">
            <?php echo $spkm ?>        </a></td></tr>
<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/khieu-nai" title="
            Contact        ">
            <?php echo $khieunai ?>        </a></td></tr>

</table>
</td>
</tr>

<tr valign="top">
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lpart" colspan="99"><div class="lhead">chi-tiet-san-pham/
<span class="lcount">31 pages</span></div>


</td>
</tr>

<tr valign="top">
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lpart" colspan="99"><div class="lhead">chi-tiet-tin/
<span class="lcount">6 pages</span></div>


</td>
</tr>

<tr valign="top">
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lpart" colspan="99"><div class="lhead">news/
</div>

<table cellpadding="0" cellspacing="0" border="0" width="100%">

</table>
</td>
</tr>

<tr valign="top">
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lpart" colspan="98"><div class="lhead">index/
<span class="lcount">2 pages</span></div>

<table cellpadding="0" cellspacing="0" border="0" width="100%">

<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/news/index/page:2" title="
            News        ">
            <?php echo $tintuc ?>         </a></td></tr>
<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/news/index/page:1" title="
            News        ">
            <?php echo $tintuc ?>         </a></td></tr>
</table>
</td>
</tr>

<tr valign="top">
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lpart" colspan="99"><div class="lhead">product/
</div>

<table cellpadding="0" cellspacing="0" border="0" width="100%">

</table>
</td>
</tr>

<tr valign="top">
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lpart" colspan="98"><div class="lhead">listproduct/
<span class="lcount">2 pages</span></div>

<table cellpadding="0" cellspacing="0" border="0" width="100%">

<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/product/listproduct/page:2" title="
            Product        ">
            <?php echo $sanpham ?>        </a></td></tr>
<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/product/listproduct/page:1" title="
            Product        ">
            <?php echo $sanpham ?>        </a></td></tr>
</table>
</td>
</tr>

<tr valign="top">
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lpart" colspan="99"><div class="lhead">san-pham/
</div>

<table cellpadding="0" cellspacing="0" border="0" width="100%">

</table>
</td>
</tr>

<tr valign="top">
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lpart" colspan="98"><div class="lhead">12/
<span class="lcount">1 pages</span></div>

<table cellpadding="0" cellspacing="0" border="0" width="100%">

<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/san-pham/12/dồ-gia-dụng.html" title="
            Product        ">
            <?php echo $sanpham ?>        </a></td></tr>
</table>
</td>
</tr>

<tr valign="top">
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lpart" colspan="98"><div class="lhead">27/
<span class="lcount">1 pages</span></div>

<table cellpadding="0" cellspacing="0" border="0" width="100%">

<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/san-pham/27/dồ-diện.html" title="
            Product        ">
            <?php echo $sanpham ?>        </a></td></tr>
</table>
</td>
</tr>

<tr valign="top">
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lpart" colspan="98"><div class="lhead">28/
<span class="lcount">1 pages</span></div>

<table cellpadding="0" cellspacing="0" border="0" width="100%">

<tr><td class="lpage"><a href="http://develop11.vtmgroup.com.vn/lienhoa/san-pham/28/dồ-diện.html" title="
            Product        ">
            <?php echo $sanpham ?>        </a></td></tr>
</table>
</td>
</tr>

<tr valign="top">
<td class="lbullet">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="lpart" colspan="99"><div class="lhead">them-vao-gio/
<span class="lcount">31 pages</span></div>
</td>
</tr>
</table>



<!--
Please note:
You are not allowed to remove the copyright notice below.
Thank you!
www.xml-sitemaps.com
-->

</div>
</div>