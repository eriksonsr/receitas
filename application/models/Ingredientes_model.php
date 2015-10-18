<?php 

class Ingredientes_model extends CI_Model{
    var $id_receita;
    var $ingrediente;
    var $principal = 0;
    var $quantidade;

    public function salvarIngredientes($ingrediente, $id_receita){
        $inseriu = false;
        
        for ($i=1; $i <= $ingrediente['qtd_ingredientes'] ; $i++) {
            $this->ingrediente = $ingrediente["ingrediente_{$i}"];
            $this->quantidade = $ingrediente["quantidade_{$i}"];
            
            if(isset($ingrediente["obrigatorio_{$i}"])){
                $this->principal = 1;
            }

            $this->id_receita = $id_receita;
            if($this->db->insert('tb_receitas_tem_ingredientes', $this)){
                $inseriu = true;
            }
        }

        return $inseriu;
    }
}