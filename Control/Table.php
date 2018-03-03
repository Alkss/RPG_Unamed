<?php


/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:23
 */
class Table
{
    function __construct()
    {
        $this->db = new DataBase();
    }
    
    public function selectAll($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT * FROM tb_sala " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function createTable($name, $history, $password, $players)
    {
        $select = $this->selectAll("nme_sala = '" . $this->db->scapeCont($name) . "'");
        if ($select) {
            return false;
        } else {
            $date = date('Y-m-d');
            
            
            $stringSQL = "INSERT INTO tb_sala (`nme_sala`,`dta_criacao_sala`,`dta_ultima_atividade_sala`,`hst_campanha_sala`,`pwd_sala`,`qtd_players_sala`)
VALUES('"
                . $this->db->scapeCont($name) . "','"
                . $this->db->scapeCont($date) . "','"
                . $this->db->scapeCont($date) . "','"
                . $this->db->scapeCont($history) . "','"
                . $this->db->scapeCont($password) . "','"
                . $this->db->scapeCont($players) . "')";
            $this->db->insert($stringSQL);
            return true;
        }
    }
    /*
    public function updateClasse($idt, $name, $desc)
    {
        $stringSQL = "UPDATE td_classe SET nme_classe ='" . $this->db->scapeCont($name) . "', dsc_classe ='" . $this->db->scapeCont($desc) . "' WHERE idt_classe = " . $this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function deleteClasse($idt)
    {
        $stringSQL = "DELETE FROM td_classe WHERE idt_classe IN(" . $this->db->scapeCont($idt) . ") AND idt_classe NOT IN(SELECT DISTINCT cod_classe FROM tb_personagem)";
        $this->db->executeQuery($stringSQL);
        return true;
    }*/
}