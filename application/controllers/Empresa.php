<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

	public function contato()
	{
		$this->load->template('empresa/contato.php');
	}

	public function sobre()
	{
		$this->load->template('empresa/sobre_nos.php');	
	}

}