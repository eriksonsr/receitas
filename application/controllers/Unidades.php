<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidades extends CI_Controller {

	public function __construct(){
		parent::__construct();

        $this->load->model('Unidades_model','unidades');
        
    }

	public function Cadastrar(){
		$this->load->template("unidades/cadastrar");
	}

	public function Salvar(){
		$this->load->library("form_validation");    
        $this->form_validation->set_rules("nome", "nome", "required");
        $this->form_validation->set_rules("unidade", "unidade", "required");
        $this->form_validation->set_error_delimiters("<p class='danger alert-danger'>", "</p>");
        $sucesso = $this->form_validation->run();

        if($sucesso){
			$unidade = $this->input->post();

			if($this->unidades->salvar($unidade)){
				$this->session->set_flashdata("successo", "Unidade adicionada com sucesso!");
			}else{
				$this->session->set_flashdata("erro", "Ocorreu um erro ao cadastrar a unidade.");
			}
		    redirect(base_url("index.php/Unidades/Cadastrar"));
    	}else{
    		$this->Cadastrar();
    	}
	}

	public function aListar(){
		$unidades = $this->unidades->listar();
		echo json_encode($unidades);
	}
}