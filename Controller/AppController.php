<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $helpers = array(
	'Html',
	'Form',
	'Session',
	'Text',
	'Js',
	'Time',
	'Common'
    );
    public $uses = array('Setting');  

     public function beforeFilter() {

      parent::beforeFilter();

      $setting = $this->Setting->find('first');
      $this->set('setting', $setting);

      if(isset($_GET['language'])) {
        if($_GET['language']=="vn") {
                $this->Session->write('language',""); 
           }
           elseif($_GET['language']=="en") {
                $this->Session->write('language','en'); 
           }
                    $this->redirect($this->referer());     
        }else {
          if($this->Session->check('language'))
            {
              $this->Session->write('language',$this->Session->read('language'));
            }
            else
            {
              $this->Session->write('language',"");
            }
                 
        }
        
        $urlTmp = $_SERVER['REQUEST_URI'];
        if (stripos($urlTmp, "?lang")) {
            $urlTmp = explode("?", $urlTmp);
            $lang = explode("=", $urlTmp[1]);
            $lang = $lang[1];
            if (isset($lang)) {
                $this->Session->write('language', $lang);
            } else {
                $this->Session->delete('language');
            }
        }
        
       
    }
}
