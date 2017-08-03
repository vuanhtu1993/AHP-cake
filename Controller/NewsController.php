<?php
/**
 * Description of NewsController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class NewsController extends AppController {
    
    public $name = 'News';
    public $uses = array('News', 'Catalogue');

    public function beforeFilter() {
        parent::beforeFilter();

    }
    // show all bản tin
    public function index($id = null) {
    
        $typeName = $this->Catalogue->read(null, $id);
        $this->set('typeName', $typeName);

       $this->paginate = array(
            'conditions' => array(+
               // 'News.cat_id' => $id,
              'News.status' => 1
            ),
            'order' => 'News.pos ASC, News.modified DESC',
            'limit' => '8'
        );
        $listNews = $this->paginate('News');
        $this->set('listNews', $listNews);
}
    // show all bản tin của tất cả các danh mục
    public function listnews() {
        // list all product
        $this->paginate = array(
            'conditions' => array(
                'News.status' => 1
            ),
            'order' => 'News.pos ASC',
            'limit' => '15'
        );
        $listnews = $this->paginate('News');
        $this->set('listnews', $listnews);

    }

    public function detail($id = null) {
        $detailNews = $this->News->findById($id);
        $related = $this->News->find('all', array(
            'conditions'=>array(
                'News.cat_id' => $detailNews['News']['cat_id'],
                'News.id <>' => $detailNews['News']['id'],
                'News.status' => 1
            ),
            'limit' => 5,
            'order' => 'News.pos ASC, News.id DESC'
        ));
        $this->set('related', $related);
        $this->set('detailNews', $detailNews);

    }
    public function mauthietke(){
        return ('mauthietke');
    }
    public function dathicong(){
        return ('dathicong');
    }


}