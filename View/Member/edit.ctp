<?php echo $this->Form->create('product', array( 'url' => DOMAINAD.'products/edit','type' => 'post','enctype'=>'multipart/form-data','name'=>'image')); ?>

<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lýu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Tr? giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD?>products" class="toolbar"> <span class="icon-32-cancel"></span> H?y </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>C?p nh?t s?n ph?m</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box"><!-- Start Content Box -->
    <div class="content-box-header">
        <h3>C?p nh?t s?n ph?m</h3>
        <div class="clear"></div>
    </div>
    <!-- End .content-box-header -->
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table class="input">
                <tr>
                    <td width="120" class="label">Tên s?n ph?m:</td>
                    <td><?php echo $this->Form->input('Product.name',array('label'=>'','class'=>'text-input medium-input','maxlength' => '250','onchange' => 'get_alias()','id' => 'idtitle'));?></td>
                </tr>
				<tr>
                    <td width="120" class="label">Tên s?n ph?m(EN):</td>
                    <td><?php echo $this->Form->input('Product.name_en',array('label'=>'','class'=>'text-input medium-input','maxlength' => '250','onchange' => 'get_alias()','id' => 'idtitle','allowEmpty' => 'false'));?></td>
                </tr>
				<tr>
                    <td width="120" class="label">Tên s?n ph?m(CN):</td>
                    <td><?php echo $this->Form->input('Product.name_cn',array('label'=>'','class'=>'text-input medium-input','maxlength' => '250','onchange' => 'get_alias()','id' => 'idtitle','allowEmpty' => 'false'));?></td>
                </tr>
                <tr>
                    <td class="label">Liên k?t t?nh:</td>
                    <td><?php echo $this->Form->input('Product.alias',array('label'=>'','class'=>'text-input alias-input','maxlength' => '250','id' => 'idalias'));?> <img width="16" height="16" alt="" onclick="get_alias();" style="cursor: pointer; vertical-align: middle;" src="<?php echo DOMAINAD; ?>images/refresh.png"></td>
                </tr>
                <tr>
                    <td width="120" class="label">M? s?n ph?m:</td>
                    <td><?php echo $this->Form->input('Product.code',array('label'=>'','class'=>'text-input medium-input','maxlength' => '250','id' => 'idtitle'));?></td>
                </tr>
                <tr>
                    <td width="120" class="label">Ch?t li?u:</td>
                    <td><?php echo $this->Form->input('Product.material',array('label'=>'','class'=>'text-input medium-input','maxlength' => '250','id' => 'idtitle'));?></td>
                </tr>
				<tr>
                    <td width="120" class="label">Ch?t li?u(EN):</td>
                    <td><?php echo $this->Form->input('Product.material_en',array('label'=>'','class'=>'text-input medium-input','maxlength' => '250','id' => 'idtitle'));?></td>
                </tr>
				<tr>
                    <td width="120" class="label">Ch?t li?u(CN):</td>
                    <td><?php echo $this->Form->input('Product.material_cn',array('label'=>'','class'=>'text-input medium-input','maxlength' => '250','id' => 'idtitle'));?></td>
                </tr>
                <tr>
                    <td class="label">Thu?c danh m?c:</td>
                    <td>
                        <select name="data[Product][cat_id]" id="jumpMenu">
                            <?php foreach ($list_cat as $k => $v) { ?>
                            <option value="<?php echo $k; ?>" <?php if($this->Session->check('catId') && $this->Session->read('catId') == $k) {echo 'selected="selected"';} ?>><?php echo $v; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">Ki?u ti?n</td>
                    <td>
                    <?php $options = array(
                            1 => 'VND',
                            2 => 'USD',
                      );
                        echo $this->Form->input('Product.type', array('type'=>'select','name'=>'data[Product][type]','options'=>$options,'class'=>'small-input','label'=>''));
                     ?>
                    </td>
                </tr>
                <tr>
                    <td width="120" class="label">Giá :</td>
                    <td><?php echo $this->Form->input('Product.price',array('label'=>'','class'=>'text-input medium-input','maxlength' => '250','style' => 'width:200px !important'));?></td>
                </tr>
                <tr>
                    <td class="label">Khuy?n m?i:</td>
                    <td><input type="radio" value="1" id="Sale1" name="data[Product][saleoff]">
                        SP khuy?n m?i
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" checked="checked" value="0" id="Sale0" name="data[Product][saleoff]">
                    SP không khuy?n m?i </td>
                </tr>
                <tr>
                    <td class="label">Trang thái:</td>
                    <td><input type="radio" value="0" id="ProductStatus0" name="data[Product][status]">
                        Chýa Active a
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" checked="checked" value="1" id="ProductStatus1" name="data[Product][status]">
                        Ð? Active </td>
                </tr>
                <tr>
                    <td class="label">&nbsp;</td>
                    <td>
                        <img src="<?php echo IMAGEAD; ?>product/<?php echo $edit['Product']['images']; ?>" height="100">
                        <input name="data[Product][id]" type="hidden" id="pid" value="<?php echo $edit['Product']['id']; ?>">
                        <input name="oldimg" type="hidden" id="imgid" value="<?php echo $edit['Product']['images']; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="label">H?nh ?nh ð?i di?n:</td>
                    <td>&nbsp;
                        <input name="userfile" type="file" id="userfile" size="50"></td>
                </tr>
                <tr>
                    <td class="label">Mô t? s?n ph?m(EN)</td>
                    <td>
                        
                        <?php
                            $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
                            $CKEditor->basePath = DOMAINAD . "js/ckeditor";
                            $CKEditor->config['width'] = '98%';
                            $CKEditor->config['height'] = '300';
                            
                            CKFinder::SetupCKEditor( $CKEditor ) ;
                            
                            // Advanced toolbar menu
//                            $CKEditor->config['toolbar'] = array(
//                                array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ),
//                                array( 'Image', 'Link', 'Unlink', 'Anchor' )
//                            );
//                            $CKEditor->textareaAttributes = array("cols" => 80, "rows" => 10);
                            $initialValue = $edit['Product']['content_en'];
                            echo $CKEditor->editor("data[Product][content_en]", $initialValue, "");
                        ?>
                    
                    </td>
                </tr>
				<tr>
                    <td class="label">Mô t? s?n ph?m(CN)</td>
                    <td>
                        
                        <?php
                            $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
                            $CKEditor->basePath = DOMAINAD . "js/ckeditor";
                            $CKEditor->config['width'] = '98%';
                            $CKEditor->config['height'] = '300';
                            
                            CKFinder::SetupCKEditor( $CKEditor ) ;
                            
                            // Advanced toolbar menu
//                            $CKEditor->config['toolbar'] = array(
//                                array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ),
//                                array( 'Image', 'Link', 'Unlink', 'Anchor' )
//                            );
//                            $CKEditor->textareaAttributes = array("cols" => 80, "rows" => 10);
                            $initialValue = $edit['Product']['content_cn'];
                            echo $CKEditor->editor("data[Product][content_cn]", $initialValue, "");
                        ?>
                    
                    </td>
                </tr>
                <tr>
                    <td class="label">Title Seo</td>
                    <td><?php echo $this->Form->input('Product.title_seo',array('label'=>'','class'=>'text-input medium-input','maxlength' => '250','id' => 'idtitle'));?></td>
                </tr>
                <tr>
                    <td class="label">Meta keyword</td>
                    <td><?php echo $this->Form->input('Product.meta_key',array('label'=>'','class'=>'text-input medium-input'));?></td>
                </tr>
                <tr>
                    <td class="label">Meta description</td>
                    <td><?php echo $this->Form->input('Product.meta_des',array('label'=>'','class'=>'text-input medium-input'));?></td>
                </tr>
            </table>
            <div class="clear"></div>
        </div>
        <!-- End #tab1 -->
        <div class="tab-content" id="tab2">
            <div class="clear"></div>
            <!-- End .clear --> 
        </div>
        <!-- End #tab2 --> 
    </div>
    <!-- End .content-box-content --> 
</div>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lýu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Tr? giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD?>products" class="toolbar"> <span class="icon-32-cancel"></span> H?y </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>C?p nh?t s?n ph?m</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>