<?php

/**
 * Description of ContactController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class ContactController extends AppController {

    public $name = 'Contact';
    public $uses = array(
        "Setting"
    );
    public $components = array('Email');

    public function beforeFilter() {
        parent::beforeFilter();

    }

    public function khieunai() {
        
    }
	public function contact() {
        
    }
	
	 public function send(){
		$this->autoLayout = false;
  
		  if ($this->request->is('post')) {
			   $setting = $this->Setting->find('first'); 
			   $email = new CakeEmail();
			   $email->from(array($_POST['email'] => 'Thông tin liên hệ'));
			   $email->to($setting['Setting']['email']);
			   $email->subject('Thông tin liên hệ');
			   $content = "---------------------------------------------------\r\n";
			   $content .= 'Họ tên: '.$_POST['name']."\r\n";
			   $content .= 'Số điện thoại: '.$_POST['phone']."\r\n";  
			   $content .= 'Email: '.$_POST['email']."\r\n"; 
			   $content .= 'Tiêu đề: '.$_POST['title']."\r\n"; 
			   $content .= 'Nội dung: '.$_POST['content']."\r\n"; 
			   $content .= "---------------------------------------------------";
			   $email->sendAs = 'html';
			   $email->send($content);   
				//pr($email); die;
			   echo '<script language="javascript"> alert("Gửi mail thành công"); location.href="' . DOMAIN . '";</script>';
		   
			  }
 } 
	
}