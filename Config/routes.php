<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @link          http://cakephp.org capCakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'home', 'action' => 'index'));
Router::connect('/tin-tuc', array('controller' => 'news', 'action' => 'listnews'));
Router::connect('/mau-thiet-ke',array('controller'=>'news','action'=>'mauthietke'));
Router::connect('/da-thi-cong',array('controller'=>'news','action'=>'dathicong'));
Router::connect('/dich-vu', array('controller' => 'news', 'action' => 'service'));
Router::connect('/chi-tiet-tin/*', array('controller' => 'news', 'action' => 'detail'));
Router::connect('/san-pham/*', array('controller' => 'product', 'action' => 'listproduct'));
Router::connect('/thong-tin/*', array('controller' => 'news', 'action' => 'index'));
Router::connect('/san-pham.html', array('controller' => 'product', 'action' => 'listproduct'));
Router::connect('/tim-kiem', array('controller' => 'product', 'action' => 'search'));
Router::connect('/gioi-thieu.html', array('controller' => 'home', 'action' => 'intro'));
Router::connect('/khieu-nai', array('controller' => 'contact', 'action' => 'khieunai'));
    Router::connect('/lien-he.html', array('controller' => 'contact', 'action' => 'contact'));
Router::connect('/chi-tiet/*', array('controller' => 'product', 'action' => 'detail'));
Router::connect('/khuyen-mai', array('controller' => 'product', 'action' => 'saleoffproduct'));
Router::connect('/sp-moi', array('controller' => 'product', 'action' => 'spmoi'));
Router::connect('/ban-ghe-an', array('controller' => 'product', 'action' => 'banghean'));
Router::connect('/tu-ke-kinh', array('controller' => 'product', 'action' => 'ketukinh'));
Router::connect('/den-trang-tri', array('controller' => 'product', 'action' => 'dentrangtri'));
Router::connect('/ban-ghe-cao-cap', array('controller' => 'product', 'action' => 'banghecaocap'));
Router::connect('/sp-hot', array('controller' => 'product', 'action' => 'hotproduct'));
//giỏ hàng
Router::connect('/them-vao-gio/*', array('controller' => 'product', 'action' => 'addshopingcart'));
Router::connect('/gio-hang.html', array('controller' => 'product', 'action' => 'viewshopingcart'));
Router::connect('/dat-mua.html', array('controller' => 'product', 'action' => 'datmua'));
Router::connect('/cap-nhat', array('controller' => 'product', 'action' => 'updateshopingcart1'));
//giỏ hàng
Router::connect('/bao-hanh', array('controller' => 'home', 'action' => 'baohanh'));
Router::connect('/thu-vien-anh', array('controller' => 'gallery', 'action' => 'gallery'));
Router::connect('/goc-thanh-vien', array('controller' => 'member', 'action' => 'index'));
Router::connect('/sitemap', array('controller' => 'sitemap', 'action' => 'index'));
Router::connect('/thong-tin-tai-khoan', array('controller' => 'member', 'action' => 'edit'));
Router::connect('/dich-vu-lam-dep', array('controller' => 'news', 'action' => 'lamdep'));
Router::connect('/dich-vu-order', array('controller' => 'news', 'action' => 'order'));
Router::connect('/tu-van', array('controller' => 'news', 'action' => 'tuvan'));

Router::connect('/my-pham', array('controller' => 'product', 'action' => 'mypham'));
Router::connect('/thoi-trang', array('controller' => 'product', 'action' => 'thoitrang'));
Router::connect('/my-pham-khuyen-mai', array('controller' => 'product', 'action' => 'myphamkhuyenmai'));
Router::connect('/thoi-trang-khuyen-mai', array('controller' => 'product', 'action' => 'thoitrangkhuyenmai'));

//Ðang ký
Router::connect('/dang-ky/*', array('controller' => 'home', 'action' => 'registagent'));
Router::connect('/dang-nhap/*', array('controller' => 'home', 'action' => 'memberlogin'));
// END ÐANG KÝ
/**
 * ...and connect the rest of 'Pages' controller's urls.
 *
 */
Router::connect('/:alias.html', array('controller' => 'product', 'action' => 'detail'), array(
        'pass' => array('id', 'alias'),
        "id" => "[0-9]+", // chỉ là số
    )
); //chi tiet san pham để ra phảm phẩm chi tiết

//Router::connect(
//    '/:alias.htm',
//    array('controller' => 'product', 'action' => 'index'),
//    array(
//        'pass' => array('id', 'slug'),
//        "id" => "[0-9]+", // chỉ là số
//    )
//);
Router::connect(
    '/:alias.htm',
    array('controller' => 'product', 'action' => 'index1'),
    array(
        'pass' => array('id', 'alias'),
        "id" => "[0-9]+", // chỉ là số
    )
);


Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
