<?php

App::uses('CakeEmail', 'Network/Email');
/**
 * Description of ProductController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class ProductController extends AppController {
    
    public $name = 'Product';
    public $uses = array('Catproduct', 'Product');  
    public $components = array('Email');

    public function beforeFilter() {
        parent::beforeFilter();

    }
    

    public function index($id = null) {

        $typeName = $this->Catproduct->read(null, $id);
        $this->set('typeName', $typeName);
        
       $this->paginate = array(
            'conditions' => array(
                'Product.cat_id' => $id,
                'Product.status' => 1
            ),
            'order' => 'Product.pos ASC, Product.modified DESC',
            'limit' => '15'
        );
        $listProduct = $this->paginate('Product');
        $this->set('listProduct', $listProduct);
    }

    // danh mục sản phẩm
    public function index1 ($id = null) {

        $typeName = $this->Catproduct->findByAlias($id);
        if($typeName['Catproduct']['name']){
            $this->set('title_for_layout',$typeName['Catproduct']['name']);
        }else{
            $this->set('title_for_layout','Sản phẩm');
        }
        $this->set('keywords_for_layout', $typeName['Catproduct']['meta_key']);
        $this->set('description_for_layout', $typeName['Catproduct']['meta_des']);
        $this->set('typeName', $typeName);
        $this->Session->write ( 'type_id', $typeName );

        $parmenu = $this->Catproduct->find('list', array(
            'fields'=>array('id'),
            'conditions' => array(
                'Catproduct.parent_id' => $typeName['Catproduct']['id'],
                'Catproduct.status' => 1
            )
        ));

        $parmenu[$typeName['Catproduct']['id']] = $typeName['Catproduct']['id'];
        //pr($parmenu);die;
        $mang=array();$i=0;
        $mang[$i++]=$id;
        foreach($parmenu as $key=>$value){
            $mang[$i++]=$key;
        }

        if($id!=null) {
            // list all product
            $this->paginate = array(
                'conditions' => array(
                    'Product.status' => 1,
                    'Product.cat_id' => $parmenu
                ),
                'order' => 'Product.id DESC, Product.modified DESC',
                'limit'=>12
            );
        }
        else {
            $this->paginate = array(
                'conditions' => array(
                    'Product.status' => 1,
                ),
                'order' => 'Product.id DESC, Product.modified DESC',
                'limit'=>12
            );
        }
        $listProduct = $this->paginate('Product');
        $this->set('listProduct', $listProduct);
    }
	  
 
    // chi tiết sản phẩm
    public function detail($id = null) {
	// list product detail and related product
		
        $detailNews = $this->Product->findByAlias($id);
		$related = $this->Product->find('all', array(
            'conditions'=>array(
                'Product.cat_id' => $detailNews['Product']['cat_id'],
                'Product.id <>' => $detailNews['Product']['id'],
                'Product.status' => 1
            ),
            'limit' => 6,
            'order' => 'Product.pos ASC, Product.id DESC'
        ));
		$this->set('related', $related);
		$this->set('detailNews', $detailNews);
    }

    // show all sản phẩm của tất cả các danh mục
	public function listproduct() {        
        // list all product
        $this->paginate = array(
            'conditions' => array(
              'Product.status' => 1
            ),
            'order' => 'Product.pos ASC',
            'limit' => '15'
        );
        $listProduct = $this->paginate('Product');
        $this->set('listProduct', $listProduct);
        return $listProduct;
    }
	
    public function search() {    
        $keyword = $_GET['searchProduct'];
    
        // list all searching product
        $this->paginate = array(
            'conditions' => array(
                'Product.name LIKE' => '%' . $keyword . '%',
                'Product.status' => 1
            ),
            'order' => 'Product.pos ASC',
            'limit' => '15'
        );
        $listProduct = $this->paginate('Product');
        $this->set('listProduct', $listProduct);
    }

        //shopping  
    function addshopingcart($id=null, $qty = 1){
    
     $this->autoRender=false;
    $url='';
    
         $shopingcart=$this->Session->read('shopingcart');
         if(isset($shopingcart[$id]))
         {          
                
                 $shopingcart[$id]['sl']= $shopingcart[$id]['sl']+$qty;              
                 $shopingcart[$id]['total']= $shopingcart[$id]['price']*$shopingcart[$id]['sl'];            
                 $this->Session->write('shopingcart',$shopingcart);          
                echo '<script language="javascript"> alert("Thêm sản phẩm thành công!");window.location.replace("'.DOMAIN.$url.'"); </script>';
                
            
            
         }
         else
         {      

                $shopingcart[$id]['sl']=$qty;
                $shopingcart[$id]['pid'] = $id;     
                $product=$this->Product->findById($id); 
                $shopingcart[$id]['id']=$product['Product']['id'];  
                $shopingcart[$id]['name']=$product['Product']['name'];  
                $shopingcart[$id]['images']=$product['Product']['images'];  
                
                //$shopingcart[$id]['user_id']=$product['Product']['user_id'];
                $shopingcart[$id]['price'] = $product['Product']['price'];              
                $shopingcart[$id]['total']= $product['Product']['price']*$shopingcart[$id]['sl'];
                //pr($shopingcart);
                
                $this->Session->write('shopingcart',$shopingcart);      
                //pr($this->Session->read('shopingcart')); die;             
                echo 
                '<script language="javascript" type="text/javascript">
                  alert("Thêm sản phẩm thành công!"); window.location.replace("'.DOMAIN.$url.'"); 
                </script>';
            
            
             }
        

        
        //die;
    }
 

    function deleteshopingcart($id=null){
        if(isset($_SESSION['shopingcart']))
         {   
             $shopingcart=$_SESSION['shopingcart'];          
              if(isset($shopingcart[$id]))
              unset($shopingcart[$id]);
              $_SESSION['shopingcart']=$shopingcart;
              
                $pr=$this->Product->findById($id);
                
                $this->Product->save($pr);
              
            echo '<script language="javascript" type="text/javascript"> window.location.replace("'.DOMAIN.'gio-hang.html"); </script>';
              
         }
        
    }

    
    function deleteshopingcart1($id=null){
        $this->Session->delete('shopingcart'); die;
        if(isset($_SESSION['shopingcart']))
         {   
             $shopingcart=$_SESSION['shopingcart'];          
              if(isset($shopingcart[$id]))
              unset($shopingcart[$id]);
              $_SESSION['shopingcart']=$shopingcart;
              
                $pr=$this->Product->findById($id);
                //$pr['Product']['daban']= $pr['Product']['daban'] - $value['sl'];
                $this->Product->save($pr);
              
            echo '<script language="javascript" type="text/javascript"> window.location.replace("'.DOMAIN.'dat-mua#gh"); </script>';
              
         }
        
    }
    
    function viewshopingcart(){
      $this->layout="layuout3";
        //pr($this->Session->read('shopingcart')); die; 
        if($this->Session->check('shopingcart'))
         {   
             $shopingcart=$this->Session->read('shopingcart');           
             $this->set(compact('shopingcart'));
         }
         else
         {
             echo '<script language="javascript"> alert("Chưa có sản phẩm nào trong giỏ hàng"); window.location.replace("'.DOMAIN.'"); </script>';
         }
    
}
    function updateshopingcart($id=null){
        
        if(isset($_SESSION['shopingcart']))
         {   
             $shopingcart=$_SESSION['shopingcart'];          
              if(isset($shopingcart[$id]))
              {
                  $shopingcart[$id]['sl']=$_POST['soluong'];            
                  echo $_POST['soluong'];           die;
                  $shopingcart[$id]['total']= $shopingcart[$id]['sl']*$shopingcart[$id]['price'];
              }
              $_SESSION['shopingcart']=$shopingcart;
             
                echo '<script language="javascript" type="text/javascript"> window.location.replace("'.DOMAIN.'gio-hang.html"); </script>';
         }
    }
        
        function updateshopingcart1($id=null,$soluong=null){
		
		if($this->Session->check('shopingcart'))
		 {   
			 $shopingcart=$this->Session->read('shopingcart');	
				
			  if(isset($shopingcart[$id]))
			  {
				  $shopingcart[$id]['sl']=$soluong;
				  
				  $shopingcart[$id]['total']= $shopingcart[$id]['sl']*$shopingcart[$id]['price'];
				  //pr($soluong));die;
			  }
			  $this->Session->write('shopingcart',$shopingcart);
			
			$this->redirect(DOMAIN.'gio-hang.html');
		 }
	}
    
    
    function updateshopingcart2($id=null,$soluong=null){
        
        if(isset($_SESSION['shopingcart']))
         {   
             $shopingcart=$_SESSION['shopingcart'];          
              if(isset($shopingcart[$id]))
              {
                  $shopingcart[$id]['sl']=$soluong;
                  $shopingcart[$id]['total']= $shopingcart[$id]['sl']*$shopingcart[$id]['price'];
              }
              $_SESSION['shopingcart']=$shopingcart;
            
            echo '<script language="javascript" type="text/javascript"> window.location.replace("'.DOMAIN.'dat-mua#gh"); </script>';
         }
    }
    
//End SHOPPING      

function datmua(){
    
  if(isset($_SESSION['shopingcart']))
         {   
             $shopingcart=$_SESSION['shopingcart'];          
             $this->set(compact('shopingcart'));
             // pr($shopingcart); die;
         }
         else
         {
             echo '<script language="javascript"> alert("Chưa có sản phẩm nào trong giỏ"); window.location.replace("'.DOMAIN.'"); </script>';
         }
         
    if(isset($_POST['name'])) {
    $name=isset($_POST['name'])? $_POST['name'] :'';    
    $phone=isset($_POST['phone'])? $_POST['phone'] :''; 
    $email1=isset($_POST['email'])? $_POST['email'] :'';    
    $address=isset($_POST['address'])? $_POST['address'] :'';   
    $title=isset($_POST['title'])? $_POST['title'] :''; 
    $content=isset($_POST['content'])? $_POST['content'] :'';
    $phuongthuc=isset($_POST['phuongthuc'])? $_POST['phuongthuc'] :'';
    
$name_nhan=isset($_POST['name_nhan'])? $_POST['name_nhan'] :'';
$phone_nhan=isset($_POST['phone_nhan'])? $_POST['phone_nhan'] :'';
$add_nhan=isset($_POST['add_nhan'])? $_POST['add_nhan'] :'';    
    
    
    $order=''; $tong=0;
     foreach( $shopingcart as $row){
        

        $nen=$this->Product->findById($row['pid']);
        $this->Product->id=$row['pid'];
        $view=++$nen['Product']['view'];
        $this->Product->saveField('view',$view);
        
        $order.="<tr><td><img width=70 src=".DOMAINAD."webroot/img/product/".$row['images']." /></td><td>".$row['name']."</td>"."<td>".$row['sl']."</td>"."<td>".$row['price']."</td>"."<td>".$row['total']."</td></tr>";
        $tong+=$row['total'];
        
     }
    // pr($a); die;
     
     
    //pr($key);
    //echo $key;
    /*$email=array('Emails'=>array(
                    'name'=>$name,
                    'phone'=>$phone,
                    'email'=>$email1,
                    'address'=>$address,
                    'title'=>$title,
                    'content'=>$content,
                    'phuongthuc'=>$phuongthuc,
                    'name_nhan'=>$name_nhan,
                    'phone_nhan'=>$phone_nhan,
                    'add_nhan'=>$add_nhan,
                
                    'order'=>'<table style="border-collapse:collapse; margin-top:10px; width:100%;" border="1"><tr><td>Hình ảnh</td><td>Tên sản phẩm</td><td>Số lượng</td><td>Giá sản phẩm</td><td>Tổng tiền</td>'.$order.' <tr><td colspan="4" style="text-align:right;"> Tổng tiền phải trả:</td><td>'.number_format($tong).'</td></tr></table>',
        
                    )
    );
     
    $this->Emails->save($email);*/
    
    //------------------------------------------------------------------
    if ($this->request->is('post')){
        $this->loadModel('Setting');
        $setting = $this->Setting->find('first');
        //pr($setting);die;
        $email = new CakeEmail();
        $email->from(array($_POST['email'] => 'Thông tin đặt hàng'));
        $email->to($setting['Setting']['email']);
        $email->subject('Thông tin đặt hàng hàng');
        $content = "------------------------------------------------------------------------\r\n";
        $total = 0;
        if(isset($_SESSION['shopingcart'])){
            $dem = 1;
            foreach($_SESSION['shopingcart'] as $value){
                $content .= 'Sản phẩm đặt hàng '.$dem.': '.$value['name']."\r\n";
				$content .= 'Số lượng: '.$value['sl']."\r\n";
                $content .= 'Giá sản phẩm là: '.number_format($value['price']). ' VNĐ' ."\r\n";
            $dem ++;
			$total = $total + $value['price']*$value['sl'];
			}
            
        }
        $content .= "------------------------------------------------------------------------\r\n";
        $content .= 'Tổng tiền: '.number_format($total). ' VNĐ' ."\r\n";
        $content .= "------------------------------------------------------------------------\r\n";
        $content .= 'Thông tin khách '.$_POST['name']."\r\n";  
        $content .= 'Số điện thoại: '.$_POST['phone']."\r\n";  
        $content .= 'Email: '.$_POST['email']."\r\n";  
        $content .= 'Địa chỉ: '.$_POST['address']."\r\n"; 
        $content .= 'Tiêu đề: '.$_POST['title']."\r\n";
        $content .= 'Phương thức thanh toán: '.$_POST['phuongthuc']."\r\n"; 
        $content .= 'Nội dung: '.$_POST['content']."\r\n";    
        $content .= "------------------------------------------------------------------------\r\n";
        //pr($content); die;
        $email->sendAs = 'html';
        $email->send($content);                   
        //echo '<script language="javascript"> alert("Gửi mail thành công"); location.href="' . DOMAIN . '";</script>';
    }
    
    //------------------------------------------------------------------
    
    
    unset($_SESSION['shopingcart']);

    echo '<script language="javascript" type="text/javascript"> alert("Đặt hàng thành công"); window.location.replace("'.DOMAIN.'");</script>';
    
    
     
    }    
}
    function get_total(){
      $total=0;
      
     if($this->Session->check('shopingcart'))
    {
        $shopingcart=$this->Session->read('shopingcart');
             foreach($shopingcart as $key=>$row) 
             {
                    $total+=$row['total'];
             }
     }

     return $total;

    }
    
    function count_sp(){
    $total=0;
     if($this->Session->check('shopingcart'))
    {
        $shopingcart=$this->Session->read('shopingcart');
            foreach($shopingcart as $key=>$row) {
            $total++;
            }
     }
    

     return $total;

    }

}