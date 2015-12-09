<?php 

class ReceitasAvaliadas_model extends CI_Model
{
    var $id_usuario;
    var $id_receita;
    var $nota;

    public function adicionarAvaliacao($avaliacao)
    {   
        $this->id_usuario = $avaliacao['id_usuario'];
        $this->id_receita = $avaliacao['id_receita'];
        $this->nota = $avaliacao['nota'];
        return $this->db->insert('tb_receitas_avaliadas_por_usuarios', $this);
    }

    public function verificaSeUsuarioJaAvaliou($id_usuario, $id_receita)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('id_receita', $id_receita);
        return $this->db->get('tb_receitas_avaliadas_por_usuarios')->row();
    }

    public function editarAvaliacao($avaliacao)
    {
        $this->db->set('nota', $avaliacao['nota']);
        $this->db->where('id_usuario', $avaliacao['id_usuario']);
        $this->db->where('id_receita', $avaliacao['id_receita']);
        return $this->db->update('tb_receitas_avaliadas_por_usuarios');
    }

    public function melhorAvaliadas()
    {
        $q = $this->db->query("select 
                            id_receita, avg(nota) media
                        from
                            tb_receitas_avaliadas_por_usuarios
                        group by (id_receita)
                        order by media DESC
                        limit 10");
        return $q->result();
    }
}