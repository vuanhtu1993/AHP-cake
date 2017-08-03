
<?php
/**
 * Description of HomeComtroller
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class HomeController extends AppController {
    
    public $name = 'Home';
    public $uses = array('Setting', 'Post' , 'Product', 'Usermember', 'Catproduct');


    public function beforeFilter() {
    	parent::beforeFilter();
    	
        $setting = $this->Setting->find('first');
        $this->set('title_for_layout', $setting['Setting']["title"]);
        $this->set('keywords_for_layout', $setting['Setting']['meta_key']);
        $this->set('description_for_layout', $setting['Setting']['meta_des']);
    }

    public function index($catId = null) {


    	
        $listCat = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.status' => 1,
                'Catproduct.saleoff' => 1
                
            ),
            'order' => 'Catproduct.pos ASC',
            'limit' => '5'
        ));
        $this->set('listCat', $listCat);
 

    	//pr($listCat);die;

    	/*$cat1 = array();
        $cat1[0]=$catId;$i=0;
        $cat = $this->Catproduct->find('all', array(
        	'conditions' => array(
        		'Catproduct.status' => 1,
        		'Catproduct.parent_id' => $catId
        		)));

        foreach ($cat as $row){
            $cat1[$i++]=$row['Catproduct']['id'];
        }
        
        $listProduct = $this->Product->find('all', array(
        	'conditions' => array(
        		'Product.status' => 1,
        		'Product.cat_id' => $cat1), 
        	'order' => 'Product.pos DESC','limit'=>18
        	));
        $this->set('listProduct', $listProduct);
        $this->set('cat1', $cat1);
        pr($listProduct);die;*/
    }

    public function multiMenuProductabc($parentid = null, $trees = NULL) {
    $parmenu = $this->Catproduct->find('all', array(
        'conditions' => array(
            'Catproduct.parent_id' => $parentid,
            'Catproduct.status' => 1
        ),
        'order' => 'Catproduct.id ASC'
        ));
    if (count($parmenu) > 0) {
        foreach ($parmenu as $field) {
            $trees[$field['Catproduct']['id']] = $field['Catproduct']['id'];
            $trees = $this->multiMenuProductabc($field['Catproduct']['id'], $trees);
        }
    }
    return $trees;
	}
     
     public function intro() {
       // Gioi thieu
        $gioithieu = $this->Post->find('first');
        $this->set('gioithieu', $gioithieu);
    }
	 
	
	public function baohanh() {
		$this->set('title_for_layout', 'BẢO HÀNH');
		$this->set('title_for_layout_en', 'WARRANTY');
		$this->set('title_for_layout_cn', '保修');
        $bh = $this->Post->find('all', array(
            'conditions' => array(
                'Post.id' => 2
            ),
            'order' => 'Post.pos ASC'
        ));
        return $bh;
    }
	
		//Dang Ki
		// Kiem tra dang nhap
	public function checklogin(){
			if ($this->request->is('post')) {
				$email = $this->request->data['email'];
				$pass = $this->request->data['password'];
				$chek = $this->Usermember->findByEmail($email);
				//pr($chek);die;
				
				//pr(md5($pass));die;
				if ($chek['Usermember']['password'] == md5($pass)){
					//pr($chek['Usermember']['password']);die;
					$this->Session->write('id', $chek['Usermember']['id']);
					$this->Session->write('username', $chek['Usermember']['name']);
					$this->Session->write('password', $chek['Usermember']['password']);
					$this->Session->write('email', $chek['Usermember']['email']);
					$this->Session->write('phone', $chek['Usermember']['phone']);
					if ($this->Session->check('urlThanhToan') && $this->Session->check('cart')) {
						$this->redirect($this->Session->read('urlThanhToan'));
						exit();
					}
					$this->redirect('/home/');
					echo '<script language="javascript" type="text/javascript"> alert("Đăng nhập thành công");</script>';
				} 
				else {
						$this->Session->setFlash(__('Mật khẩu không đúng !', true));
						$this->redirect('/home/memberlogin#log');
						echo '<script language="javascript" type="text/javascript"> alert("Đăng nhập không thành công");</script>';
					}
				
			}
			$this->redirect('/home/memberlogin#log');
			//header('Location:home/index/');
			exit;
	}
	public function loginsuccess() {

	}

	public function memberlogin() {

	}
		
	public function registend() {

	}
	public function logout() {
		  $this->Session->delete('id');
		  $this->Session->delete('username');
		  $this->Session->delete('shopingcart');
		  $this->redirect('/home/');
	}
	
	public function registagent(){
	
    if ($this->request->is('post')) {
		$check=$this->Usermember->findByEmail($_POST['email']);
		   //pr($check);die;
		   if($check){
			 echo "<script>alert('Email này đã được đăng ký');</script>";
			 echo "<script>history.back(-1);</script>";
		   }
	
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $pasword = isset($_POST['password']) ? $_POST['password'] : '';
		$kiemtra = $this->Usermember->findByEmail('email'); 
		
		
			$member_register['Usermember'] = array(
				'email' => $email,
				'password' => md5($pasword),
				'name' => $name,
				'phone' => $phone,
			);
			$this->Usermember->save($member_register);
			echo '<script language="javascript" type="text/javascript"> alert("Đăng kí thành công!");</script>';
			echo "<script>history.back(-1);</script>";
    }
    
}


	

}