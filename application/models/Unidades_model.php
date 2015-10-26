<?php 

class Unidades_model extends CI_Model{
	var $nome;
	var $unidade;

	public function Salvar($unidade){
		$this->nome = $unidade["nome"];
        $this->unidade = $unidade["unidade"];

        return $this->db->insert('tb_unidades_medida', $this);
	}

	public function listar(){
		$this->db->order_by('nome');
		return $this->db->get('tb_unidades_medida')->result();
	}
}