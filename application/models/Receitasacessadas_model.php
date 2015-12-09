<?php 

class ReceitasAcessadas_model extends CI_Model{
    var $id_usuario;
    var $id_receita;
    var $dt_acesso;
    var $hr_acesso;

    public function salvaReceitaAcessada($id_receita, $id_usuario){
        $horario = new DateTime('now', new DateTimeZone( 'America/Sao_Paulo'));
        $dt_hoje = $horario->format("Y-m-d");
        $hr_hoje = $horario->format("H:i:s");

        $this->id_usuario = $id_usuario;
        $this->id_receita = $id_receita;
        $this->dt_acesso = $dt_hoje;
        $this->hr_acesso = $hr_hoje;
        $this->db->insert('tb_receitas_acessadas_por_usuarios', $this);

        return $this->db->insert_id();
    }

    public function listarReceitasAcessadas($id_usuario){
        $this->db->select('r.nome, ra.dt_acesso, ra.hr_acesso, ra.id_receita');
        $this->db->from('tb_receitas_acessadas_por_usuarios ra');
        $this->db->join('tb_receitas r', 'r.id = ra.id_receita', 'inner');
        $this->db->where('ra.id_usuario', $id_usuario);
        $this->db->limit(10);
        $this->db->order_by('ra.dt_acesso, ra.hr_acesso', 'desc');
        return $this->db->get()->result();
    }
}