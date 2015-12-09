<?php 

class ReceitasAvaliadas_model extends CI_Model
{
    var $id_usuario;
    var $id_receita;
    var $nota;

    public function salvaReceitaAcessada($avaliacao)
    {   
        $this->id_usuario = $avaliacao['id_usuario'];
        $this->id_receita = $avaliacao['id_receita'];
        $this->nota = $avaliacao['nota'];
        $this->db->insert('tb_receitas_avaliadas_por_usuarios', $this);
    }
}