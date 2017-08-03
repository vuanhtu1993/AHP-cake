<?php
/**
 * Description of MemberController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class MemberController extends AppController {
    
    public $name = 'Member';
    public $uses = array('Usermember', 'Catalogue', 'News', 'Slideshow', 'Banner', 'Setting', 'Advertisement', 'Catproduct', 'Usermember', 'Support');
    
	public function index() {        
        // Gallery
		$this->pageTitle = 'A list of all orders';
        $this->paginate = array(
            'conditions' => array(
              'Usermember.status' => 1
            ),
            'order' => 'Usermember.pos ASC',
            'limit' => '10'
        );
        $gallery = $this->paginate('Usermember');
        $this->set('gallery', $gallery);
		
    }
	
	function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            if ($this->Session->check('pageproduct')) {
                $this->redirect($this->Session->read('pageproduct'));
            } else {
                $this->redirect(array('action' => 'index'));
            }
        }
        if (!empty($this->request->data)) {
            $data['Usermember'] = $this->data['Usermember'];
            if ($_FILES['userfile']['name'] != "") {
                // Upload anh
                $handle = new upload($_FILES['userfile']);
                if ($handle->uploaded) {
                    $filename = date('YmdHis') . md5(rand(10000, 99999));
                    $handle->file_new_name_body = $filename;

                    $handle->Process(IMAGES_URL . 'Usermember');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = $_REQUEST['oldimg'];
            }

            $data['Usermember']['images'] = $img;
            $data['Usermember']['modified'] = date('Y-m-d');

            if ($this->Product->save($data['Usermember'])) {
                if ($this->Session->check('pageproduct')) {
                    $this->redirect($this->Session->read('pageproduct'));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('Bài viết này không sửa được vui lòng thử lại.', true));
            }
        }
        if (empty($this->request->data)) {
            $this->data = $this->Product->read(null, $id);
        }

        // Load model
        $this->loadModel("Catproduct");
        $list_cat = $this->Catproduct->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
        $this->set('edit', $this->Product->findById($id));
    }
	

	
}