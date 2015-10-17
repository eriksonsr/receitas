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
		$this->load->library("form_validation");    
        $this->form_validation->set_rules("nome", "nome", "required");
        $this->form_validation->set_rules("qtd_ingredientes", "qtd_ingredientes", "required");
        $this->form_validation->set_error_delimiters("<p class='danger alert-danger'>", "</p>");
        $sucesso = $this->form_validation->run();

        if($sucesso){
			$receita = $this->input->post();
			$id_receita = $this->receitas->salvarReceita($receita);
		    //$this->session->set_flashdata("successo", "Pessoa adicionada com sucesso!");
		    //redirect(base_url("index.php/pessoas/cadastrar"));
    	}else{
    		$this->index();
    	}
	}
}
