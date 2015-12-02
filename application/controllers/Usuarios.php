<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

        $this->load->model('Usuarios_model','usuarios');
    }

    public function login()
    {
    	$this->load->template('usuarios/login.php');
    }

    public function logar()
    {
    	$this->load->library("form_validation");
        $this->form_validation->set_rules("usuario", "Usuário", "required");
        $this->form_validation->set_rules("senha", "Senha", "required");
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        
		if($this->form_validation->run()){
			$usuario = $this->input->post("usuario");
            $senha = $this->input->post("senha");

			$usuario_log = $this->usuarios->logar($usuario, $senha);
            if($usuario_log){
                $this->session->set_userdata("usuario", $usuario_log);
                redirect(base_url("index.php/receitas/"));
            }else{
                $this->session->set_flashdata("erro", "Usuário ou senha inválida!");
                redirect(base_url("index.php/usuarios/login"));
            }
		}else{
			$this->session->set_flashdata("erro", "Você deixou campos obrigatórios em branco!");
            redirect(base_url("index.php/usuarios/login"));
		}
    }

	public function deslogar()
	{
        $this->session->unset_userdata("usuario");
        redirect(base_url("index.php/receitas/"));
    }
}