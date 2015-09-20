<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receitas extends CI_Controller {

	public function buscaReceita(){
		$this->load->template('receitas/busca_receita.php');
	}

	public function resultadoBuascaReceita(){
		
	}
}
