<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receitas extends CI_Controller {

	public $menu;
	public $usuario;
	public function __construct(){
		parent::__construct();

        $this->load->model('Receitas_model','receitas');
        $this->load->model('Receitasacessadas_model','receitasAcessadas');
        $this->load->model('Receitasavaliadas_model','receitasAvaliadas');
        $this->load->model('Ingredientes_model','ingredientes');
        if($this->session->userdata('usuario')){
        	$this->menu = "menu_usuarios";
        	$this->usuario = $this->session->userdata('usuario');
        }else{
        	$this->menu = "";
        }
    }

    public function index(){
    	$this->buscaReceita();
    }

	public function buscaReceita(){
		$this->load->template('receitas/busca_receita.php', $this->menu);
	}

	public function resultadoBuascaReceita(){
		$ingredientes = $this->input->post();
		
		$dados['receitas'] = $this->receitas->buscaReceita($ingredientes);
		$this->load->template('receitas/result_busca_receita.php', $this->menu, $dados);
	}

	public function cadastrarReceita(){
		$this->load->template("receitas/cadastrar_receita", $this->menu);
	}

	public function salvarReceita(){
		$this->load->library("form_validation");    
        $this->form_validation->set_rules("nome", "nome", "required");
        $this->form_validation->set_rules("qtd_ingredientes", "qtd_ingredientes", "required");
        $this->form_validation->set_error_delimiters("<p class='danger alert-danger'>", "</p>");
        $sucesso = $this->form_validation->run();

        if($sucesso){
			$receita = $this->input->post();
			$id_receita = $this->receitas->salvarReceita($receita, $this->usuario->id);

			if($this->ingredientes->salvarIngredientes($receita, $id_receita)){
				$this->session->set_flashdata("successo", "Receita adicionada com sucesso!");
			}else{
				$this->session->set_flashdata("erro", "Ocorreu um erro ao cadastrar a receita.");
			}
		    redirect(base_url("index.php/Receitas/cadastrarReceita"));
    	}else{
    		$this->index();
    	}
	}

	public function exibeReceita($id_receita)
	{
		$this->receitas->atualizaVisualizacoes($id_receita);
		$dados['avaliacao'] = "";
		$dados['usuario_logado'] = "";
		if(isset($this->usuario)){
			$this->receitasAcessadas->salvaReceitaAcessada($id_receita, $this->usuario->id);
			$dados['usuario_logado'] = 1;
			$dados['avaliacao'] = $this->receitasAvaliadas->verificaSeUsuarioJaAvaliou($id_receita, $this->usuario->id);
		}
		$dados['receitas'] = $this->receitas->exibeReceita($id_receita);
		$this->load->template('receitas/exibe_receita.php', $this->menu, $dados);
	}

	public function maisAcessadas()
	{
		$dados['mais_acessadas'] = $this->receitas->maisAcessadas();
		$this->load->template('receitas/mais_acessadas.php', $this->menu, $dados);
	}

    public function ultimasReceitasVisualizadas()
    {
        $dados['ult_rec_acessadas'] = $this->receitasAcessadas->listarReceitasAcessadas($this->usuario->id);
        $this->load->template('receitas/receitas_acessadas.php', $this->menu, $dados);
    }

    public function avaliar()
    {
    	$avaliacao = array('id_receita' => $this->input->post('id_receita'),
    						'id_usuario' => $this->usuario->id,
							'nota' => $this->input->post('nota'));
		if($this->receitasAvaliadas->adicionarAvaliacao($avaliacao)){
			echo "1";
		}else{
			echo "0";
		}
    }

    public function editarAvaliacao()
    {
    	$avaliacao = array('id_receita' => $this->input->post('id_receita'),
    						'id_usuario' => $this->usuario->id,
							'nota' => $this->input->post('nota'));
		if($this->receitasAvaliadas->editarAvaliacao($avaliacao)){
			echo "1";
		}else{
			echo "0";
		}
    }

    public function melhorAvaliadas()
    {
    	$r = $this->receitasAvaliadas->melhorAvaliadas();
    	print_r($r);
    }
}
