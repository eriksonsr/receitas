<?php 

class Usuarios_model extends CI_Model
{
	public function logar($usuario, $senha)
	{
		$this->db->where('email', $usuario);
		$this->db->where('senha', $senha);
		return $this->db->get('tb_usuarios')->row();
	}
}