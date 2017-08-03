<?php
/**
 * Description of MemberController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class SitemapController extends AppController {
    
    public $name = 'Sitemap';
    public $uses = array('Catalogue', 'News', 'Slideshow', 'Banner', 'Setting', 'Advertisement', 'Catproduct', 'Product', 'Support');
    
	public function index() {        
        // Gallery
        $this->paginate = array(
            'conditions' => array(
              'Product.status' => 1
            ),
            'order' => 'Product.pos ASC',
            'limit' => '10'
        );
        $gallery = $this->paginate('Product');
        $this->set('gallery', $gallery);
		
    }
	

	
}