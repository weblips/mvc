<?php

/**
 * Description of UsersController
 *
 * @author uasynzheryanua
 */
class UsersController extends Controller {
    
    public function __construct($data = array()) {
        parent::__construct($data);
        $this->model = new User();
    }
    
    public function admin_login(){
        if(isset($_POST) && !empty($_POST) && isset($_POST['email']) && isset($_POST['pass']) )
            $user = $this->model->getByLogin(XSS($_POST['email']));
            $hash = md5(Config::get('selt.me') . XSS($_POST['pass']));
            if ($user && $user['is_active'] && $hash == $user['password']){
                Session::set('email', $user['email']);
                Session::set('role', $user['role']);
            }
            Router::redirect('/admin/');
    }
    
    public function admin_logout(){
        Session::destroy();
        Router::redirect('/admin/');
    }
}
