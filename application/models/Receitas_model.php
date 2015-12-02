<?php 

class Receitas_model extends CI_Model{
    var $id_usuario = 1;
    var $nome;
    var $qtd_ing_principais;
    var $modo_preparo;

    public function buscaReceita($ingredientes){
        $this->db->select('id, nome');
        $this->db->from('tb_receitas');
        $this->db->where('qtd_ing_principais', $ingredientes['qtd_ingredientes']);

        $result_receitas = $this->db->get()->result_array();
        $receitas = array();
        foreach ($result_receitas as $receita) {
            $result_ingredientes = $this->buscaIngredientesDaReceita($receita);
            $result_verifica_se_contem_ingredientes = $this->verificaSeContemIngredientes($result_ingredientes, $ingredientes);

            if($result_verifica_se_contem_ingredientes == $ingredientes['qtd_ingredientes']){
                $receita['ingredientes'] = $result_ingredientes;
                array_push($receitas, $receita);
            }  
        }
        return $receitas;
    }

    public function buscaIngredientesDaReceita($receita){
        $this->db->select('ingrediente, principal, quantidade');
        $this->db->from('tb_receitas_tem_ingredientes');
        $this->db->where('id_receita', $receita['id']);
        return $this->db->get()->result_array();
    }

    public function verificaSeContemIngredientes($result, $ingredientes){
        $matchs = 0;
        foreach ($result as $r) {
            if($r['principal'] == 1){
                for ($i=1; $i <= $ingredientes['qtd_ingredientes'] ; $i++) { 
                    if(strcasecmp($r['ingrediente'], $ingredientes["ingrediente_{$i}"]) == 0){
                        $matchs++;
                    }
                }
            }
        }
        return $matchs;
    }

     public function salvarReceita($receita){
        $this->qtd_ing_principais = 0;

        for ($i=1; $i <= $receita['qtd_ingredientes'] ; $i++) {
            if(isset($receita["obrigatorio_{$i}"])){
                $this->qtd_ing_principais++;
            }
        }
        $this->nome = $receita['nome'];
        $this->modo_preparo = $receita['modo_preparo'];
        $this->db->insert('tb_receitas', $this);

        return $this->db->insert_id();
    }

    public function exibeReceita($id_receita){
        $this->db->select('rec.id, rec.nome, rec.modo_preparo, rec_ing.ingrediente, rec_ing.quantidade');
        $this->db->from('tb_receitas as rec');
        $this->db->join('tb_receitas_tem_ingredientes as rec_ing', 'rec_ing.id_receita = rec.id', 'inner');
        $this->db->where('rec.id', $id_receita);
        return $this->db->get()->result();
    }

    public function atualizaVisualizacoes($id_receita)
    {
        $this->db->select('qtd_acessos');
        $this->db->where('id', $id_receita);
        $receita = $this->db->get('tb_receitas')->row();

        $total_acessos = $receita->qtd_acessos;
        $total_acessos = $total_acessos + 1;

        $this->db->set('qtd_acessos', $total_acessos);
        $this->db->where('id', $id_receita);
        $this->db->update('tb_receitas');
    }

    public function maisAcessadas()
    {
        $this->db->order_by('qtd_acessos', 'desc');
        $this->db->limit(5);
        return $this->db->get('tb_receitas')->result();
    }
}