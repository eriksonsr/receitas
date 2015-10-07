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

		if(count($result) < 1){
			echo "Não foi encontrada nenhuma receita...";
		}else{
			echo "<pre>";
			print_r($result);
		}
		
	}

	public function cadastrarReceita(){
		$this->load->template("receitas/cadastrar_receita");
	}

	public function salvarReceita(){
		echo "<pre>";
		print_r($_POST);
	}
}
