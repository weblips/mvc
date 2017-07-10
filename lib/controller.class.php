<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @author uasynzheryanua
 */
class Controller {
    
    protected $data;
    
    protected $model;
    
    protected $params;
    
    public function __construct($data = array()) {
        $this->data = $data;
        $this->params = App::getRouter()->getParams();
    }
    
    public function getData() {
        return $this->data;
    }
    
    public function getModel() {
        return $this->model;
    }
    
    public function getParams() {
        return $this->params;
    }
}
