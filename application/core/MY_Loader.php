<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Loader extends CI_Loader {
    
    public function template($view, $menu=null, $dados=null) {
        $this->view("slices/header");
        if($menu){
            if(isset($dados['grupos'])){
                $this->view("slices/menus/menu_{$menu}", $dados);
            }else{
                $this->view("slices/menus/menu_{$menu}");
            }
	        
	    }
	    if(is_array($view)){
	    	foreach ($view as $v) {
	    		$this->view("$v", $dados);
	    	}
	    }else{
        	$this->view("$view", $dados);
    	}
        $this->view("slices/footer");
    }
}