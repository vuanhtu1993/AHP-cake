<?php
/**
 * Description of ProductController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class GalleryController extends AppController {
    
    public $name = 'Gallery';
    public $uses = array('Catproduct', 'Product', 'Email');  

	public function gallery() {        
        // Gallery
		$this->set('title_for_layout', 'Thư viện ảnh');
		$this->set('title_for_layout_en', 'Photo Gallery');
		$this->set('title_for_layout_cn', '照相馆');
        $this->paginate = array(
            'conditions' => array(
              'Product.status' => 1
            ),
            'order' => 'Product.pos ASC',
            'limit' => '10'
        );
        $listProduct = $this->paginate('Product');
        $this->set('listProduct', $listProduct);
		
    }



}