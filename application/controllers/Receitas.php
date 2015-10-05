<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receitas extends CI_Controller {

	public function __construct(){
		parent::__construct();

        $this->load->model('Receitas_model','receitas');
        
    }

    public function index(){
    	$this->buscaReceita();
    }

	public function buscaReceita(){
		$this->load->template('receitas/busca_receita.php');
	}

	public function resultadoBuascaReceita(){
		$ingredientes = $this->input->post();
		
		$result = $this->receitas->buscaReceita($ingredientes);
		echo "<pre>";
		print_r($result);
		
	}
}
