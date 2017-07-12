<?php
/**
 * Description of ContactsController
 *
 * @author uasynzheryanua
 */
class ContactsController extends Controller{
    
    public function __construct($data = array()) {
        parent::__construct($data);
        $this->model = new Message();
        
    }

    public function index(){
        if( $_POST && !empty($_POST)){
            if($this->model->save($_POST)){
                Session::setFlash(__('page.contacts.succsses', 'goods'));
            }
        }
    }
    
}
