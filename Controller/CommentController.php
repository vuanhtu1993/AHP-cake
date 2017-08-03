<?php
/**
 * Description of CommentController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class CommentController extends AppController {
    
    public $name = 'Comment';
    public $uses = array('Catalogue', 'News', 'Slideshow', 'Banner' , 'Logo',  
        'Setting', 'Advertisement', 'Catproduct', 'Product', 'Support', 'Parent', 'Project', 'Video');
    
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
    public function get_menuleft($id = null) {
        // Gallery
        $this->paginate = array(
            'conditions' => array(
              'Catproduct.status' => 1,
              'Catproduct.parent_id' => $id,

            ),
            'order' => 'Catproduct.pos ASC',
            'limit' => '10'
        );
        $menuleft = $this->paginate('Catproduct');
        return $menuleft;
           // $this->set('gallery', $gallery);

    }
    
    // Menu top
    public function menutop() {

        
    //echo đa ngôn ngữ
    if($this->Session->read('language') == 'vn' || $this->Session->read('language') == "") 
    {  
      include('../Vendor/lang_vn.php');
      $duoi=null; 
    } 
    else { $duoi="_en"; include('../Vendor/lang_en.php');
     }

      
        $mntop = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.status' => 1,
                'Catproduct.parent_id' => ''
            ),
            'order' => 'Catproduct.pos ASC, Catproduct.id ASC'
        ));

        $mntin = $this->Catalogue->find('all', array(
            'conditions' => array(
                'Catalogue.status' => 1,
                'Catalogue.parent_id' => ''
            ),
            'order' => 'Catalogue.pos ASC'
        ));

        $dmmn = "<ul>";
        $dmmn .= '<li><a ' . ' href="' . DOMAIN . '">' .$trangchu. '</a></li>';   
        $dmmn .= '<li><a ' . ' href="' . DOMAIN . 'gioi-thieu.html'  . '">' .$gt. '</a></li>';
		$dmmn .= '<li><a ' . ' href="' . DOMAIN . 'san-pham.html'  . '">' .$sanpham. '</a>';

        
			// Gan vao menu cap 2
			if (count($mntop) > 0) {
				$dmmn .= "<ul>";
				foreach ($mntop as $row) {
					$dmmn .= '<li><a href="' . DOMAIN . 'san-pham/' . $row['Catproduct']['id'] . '/' . $row['Catproduct']['alias'] . '.html">' . $row['Catproduct']['name'] . '</a>';
								$spcap2 = $this->Catproduct->find('all', array(
								'conditions' => array(
									'Catproduct.status' => 1,
									'Catproduct.parent_id' => $row['Catproduct']['id']
								),
								'order' => 'Catproduct.pos ASC, Catproduct.id ASC'
							));
						// Gan vao menu cap 3
						if (count($spcap2) > 0) {
							$dmmn .= "<ul>";
							foreach ($spcap2 as $row) {
								$dmmn .= '<li><a href="' . DOMAIN . 'san-pham/' . $row['Catproduct']['id'] . '/' . $row['Catproduct']['alias'] . '.html">' . $row['Catproduct']['name'] . '</a></li>';
							}
							$dmmn .= "</ul>";
						}
					$dmmn .= "</li>";
				}
				$dmmn .= "</ul>";
			}
				
					
        $dmmn .= "</li>";
        $cl = '';
			
        // Gan vao menu cap 1
        foreach ($mntin as $field) {
            $dmmn .= '<li><a   ' . $cl . ' href="' . DOMAIN . 'thong-tin/' . $field['Catalogue']['id'] . '/' . $field['Catalogue']['alias'] . '.html">' . $field['Catalogue']['name'] . '</a>';
				// Gan vao menu cap 2
				$tincap2 = $this->Catalogue->find('all', array(
					'conditions' => array(
						'Catalogue.status' => 1,
						'Catalogue.parent_id' => $field['Catalogue']['id']
					),
					'order' => 'Catalogue.pos ASC'
				));
				
				if (count($tincap2) > 0) {
                    $dmmn .= "<ul>";
                    foreach ($tincap2 as $row) {
                        $dmmn .= '<li><a href="' . DOMAIN . 'thong-tin/' . $row['Catalogue']['id'] . '/' . $row['Catalogue']['alias'] . '.html">' . $row['Catalogue']['name'] . '</a></li>';
                    }
                    $dmmn .= "</ul>";
				}
            $dmmn .= "</li>";  
        }
        $dmmn .= '<li><a ' . ' href="' . DOMAIN . 'lien-he.html'  . '">' .$lienhe. '</a></li>';
        $dmmn .= "</ul>";
        //pr($dmmn);die;
        return $dmmn;

    }

    public function menuleft() {
        
        //echo đa ngôn ngữ
        if($this->Session->read('language') == 'vn' || $this->Session->read('language') == "") 
        {  
          include('../Vendor/lang_vn.php');
          $duoi=null; 
        } 
        else { $duoi="_en"; include('../Vendor/lang_en.php');
         }


        $mntop = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.status' => 1,
                'Catproduct.parent_id' => ''
            ),
            'order' => 'Catproduct.pos ASC, Catproduct.id ASC'
        ));

        $dmmn = "<ul>";
            foreach ($mntop as $field) {
                $dmmn .= '<li><a  href="' . DOMAIN . 'san-pham/' . $field['Catproduct']['id'] . '/' . $field['Catproduct']['alias'] . '.html">' . $field['Catproduct']['name'.$duoi] . '</a>';

                    $tt = $this->Catproduct->find('all', array(
                        'conditions' => array(
                            'Catproduct.status' => 1,
                            'Catproduct.parent_id' => $field['Catproduct']['id']
                        ),
                        'order' => 'Catproduct.pos ASC, Catproduct.id DESC'
                    ));

                    if (count($tt) >= 0) {
                        $dmmn .='<ul>';
                        foreach ($tt as $k => $row) {
                            $dmmn .= '<li><a href="' . DOMAIN . 'san-pham/' . $row['Catproduct']['id'] . '/'  . $row['Catproduct']['alias']. '.html">' . $row['Catproduct']['name'.$duoi].'</a></li>';
                        }
                        $dmmn .='</ul>';
                    }

                $dmmn .= "</li>";      
                             
                }
            $dmmn .= "</ul>";
        return $dmmn;
    }
	
	// Menu top
    public function menufoot() {

        
		//echo đa ngôn ngữ
		if($this->Session->read('language') == 'vn' || $this->Session->read('language') == "") 
		{  
		  include('../Vendor/lang_vn.php');
		  $duoi=null; 
		} 
		else { $duoi="_en"; include('../Vendor/lang_en.php');
		 }

      
        $mntop = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.status' => 1,
                'Catproduct.parent_id' => ''
            ),
            'order' => 'Catproduct.pos ASC, Catproduct.id ASC'
        ));

        $mntin = $this->Catalogue->find('all', array(
            'conditions' => array(
                'Catalogue.status' => 1,
                'Catalogue.parent_id' => ''
            ),
            'order' => 'Catalogue.pos ASC'
        ));

        $dmmn = "<ul>";
        $dmmn .= '<li><a ' . ' href="' . DOMAIN . '">' .$trangchu. '</a></li>';   
        $dmmn .= '<li><a ' . ' href="' . DOMAIN . 'gioi-thieu.html'  . '">' .$gt. '</a></li>';
		$dmmn .= '<li><a ' . ' href="' . DOMAIN . 'san-pham.html'  . '">' .$sanpham. '</a>';

        
               
				
					
        $dmmn .= "</li>";
         //code menu 3 cấp here
        $cl = '';
			
        
        foreach ($mntin as $field) {
            $dmmn .= '<li><a   ' . $cl . ' href="' . DOMAIN . 'thong-tin/' . $field['Catalogue']['id'] . '/' . $field['Catalogue']['alias'] . '.html">' . $field['Catalogue']['name'] . '</a>';
				
				
            $dmmn .= "</li>";  
        }
        $dmmn .= '<li><a ' . ' href="' . DOMAIN . 'lien-he.html'  . '">' .$lienhe. '</a></li>';
        $dmmn .= "</ul>";
        //pr($dmmn);die;
        return $dmmn;

    }

    // Thay Banner
    public function banner() {
        $banner = $this->Banner->find('all', array(
            'conditions' => array(
                'Banner.status' => 1
            ),
            
            'limit' => 1
        ));
        /* pr($banner);die; */
        return $banner;
    }
    
    // Thay Logo
    public function logo() {
        $logo = $this->Logo->find('all', array(
            'conditions' => array(
                'Logo.status' => 1
            ),
            
            'limit' => 1
        ));
        // pr($logo);die; 
        return $logo;
    }
    

     // Ho tro
    public function support() {
        $support = $this->Support->find('all', array(
            'conditions' => array(
                'Support.status' => 1,
                'Support.type' => 1
            ),
            'order' => 'Support.pos ASC'
        ));
        return $support;
    }
     // Ho tro
    public function call() {
        $support = $this->Support->find('all', array(
            'conditions' => array(
                'Support.status' => 1,
                'Support.type ' => NULL
            ),
            'order' => 'Support.pos ASC'
        ));
        //pr($support);die;
        return $support;

    }

    public function video1st() {
        $video = $this->Video->find('first', array(
            'conditions' => array(
                'Video.status' => 1
            ),
            
        ));
        return $video;
    }

    public function video() {
        $video = $this->Video->find('all', array(
            'conditions' => array(
                'Video.status' => 1
            ),
            'order' => 'Video.pos ASC'
        ));
        return $video;
    }

     // San pham ưa chuộng
    public function sp_banchay() {
        $spm = $this->Product->find('all', array(
            'conditions' => array(
                'Product.status' => 1,
                'Product.new' => 1
            ),
            'order' => 'Product.pos ASC, Product.modified DESC',
            'limit' => '6'
        ));
        return $spm;
    }

     // San pham nổi bật
    public function sp_noibat() {
        $spm = $this->Product->find('all', array(
            'conditions' => array(
                'Product.status' => 1,
                'Product.hot' => 1
            ),
            'order' => 'Product.pos ASC, Product.modified DESC',
            'limit' => '9'
        ));
        return $spm;
    }

     // San pham ưa chuộng
    public function sp_uachuong() {
        $spm = $this->Product->find('all', array(
            'conditions' => array(
                'Product.status' => 1,
                'Product.saleoff' => 1
            ),
            'order' => 'Product.pos ASC, Product.modified DESC',
            'limit' => '4'
        ));
        return $spm;
    }
     // San pham ưa chuộng
    public function parent() {
        $spm = $this->Product->find('all', array(
            'conditions' => array(
                'Product.status' => 1,
                'Product.highlight' => 1
            ),
            'order' => 'Product.pos ASC, Product.modified DESC',
            'limit' => '20'
        ));
        return $spm;
    }
   
        // San pham liên quan
    public function splienquan() {
        $spm = $this->Product->find('all', array(
            'conditions' => array(
                'Product.status' => 1,
                'Product.hot' => 1
            ),
            'order' => 'Product.pos ASC',
            'limit' => '3'
        ));
        return $spm;
    }

    public function homecat() {
        $spm = $this->Catalogue->find('all', array(
            'conditions' => array(
                
            ),
            'order' => 'Catalogue.pos ASC',
            'limit' => '2'
        ));
        return $spm;
    }

    public function homenews($cat_id) {
        $spm = $this->News->find('all', array(
            'conditions' => array(
                'News.status' => 1,
                'News.cat_id' => $cat_id
            ),
            'order' => 'News.modified DESC, News.pos ASC',
            'limit' => '3'
        ));
        return $spm;
    }
    public function left_news() {
        $spm = $this->News->find('all', array(
            'conditions' => array(
                'News.status' => 1,  //show tin hot, moi
                'News.hot' =>1
            ),
            'order' => 'News.modified DESC, News.pos ASC',
            'limit' => '4'
        ));
        return $spm;
    }

    public function homeprd($cat_id) {
        $spm = $this->Product->find('all', array(
            'conditions' => array(
                'Product.status' => 1,
                'Product.cat_id' => $cat_id
            ),
            'order' => 'Product.pos ASC , Product.modified DESC',
            'limit' => '6'
        ));
        return $spm;
    }

    public function tinNB() {
        $spm = $this->News->find('all', array(
            'conditions' => array(
                'News.status' => 1,
                'News.hot' => 1
            ),
            'order' => 'News.modified DESC, News.pos ASC',
            'limit' => '5'
        ));
        return $spm;
    }
    
    // Cau hinh website
    public function setting() {
        $setting = $this->Setting->find('first');
        return $setting;
    }
    
    // Slide show
   

    public function slideshow() {
        $slideshow = $this->Slideshow->find('all', array(
            'conditions' => array(
                'Slideshow.status' => 1
            ),
            'order' => 'Slideshow.pos ASC'
        ));
        return $slideshow;
    }

    public function quangcao_trai1() { 
        $qcao = $this->Advertisement->find('all', array(
            'conditions' => array(
                'Advertisement.status' => 1,
                'Advertisement.display' => 1
                
            ),
            'order' => 'Advertisement.pos ASC',
            'limit' => 10,
            ));
        return $qcao;
    }


	public function quangcao_trai() { 
        $qcao = $this->Advertisement->find('all', array(
            'conditions' => array(
                'Advertisement.status' => 1,
                'Advertisement.display' => 5
                
            ),
            'order' => 'Advertisement.pos ASC',
            'limit' => 1,
            ));
			//pr($qcao);die;
        return $qcao;
    }
	public function quangcao_phai() { 
        $qcao = $this->Advertisement->find('all', array(
            'conditions' => array(
                'Advertisement.status' => 1,
                'Advertisement.display' => 6
                
            ),
            'order' => 'Advertisement.pos ASC',
            'limit' => 1,
            ));
			//pr($qcao);die;
        return $qcao;
    }

    // Đối tác
    public function project() {
        $spm = $this->Project->find('all', array(
            'conditions' => array(
                'Project.status' => 1
            ),
            'order' => 'Project.pos ASC, Project.modified DESC',
            'limit' => '20'
        ));
        return $spm;
    }

   function getProduct3($catId = null) 
  {$cat1 = array();
        $cat1[0]=$catId;$i=1;
        $cat = $this->Catproduct->find('all', array('conditions' => array('Catproduct.status' => 1, 'Catproduct.parent_id' => $catId)));

        foreach ($cat as $row){
            $cat1[$i++]=$row['Catproduct']['id'];
        }
        return $this->Product->find('all', array('conditions' => array('Product.status' => 1, 'Product.cat_id' => $cat1), 'order' => 'Product.pos DESC','limit'=>3));
    }

}