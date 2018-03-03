<?php


/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:23
 */
class Classe
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
        $stringSQL = "SELECT * FROM td_classe " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function createClasse($name, $desc)
    {
        
        $stringSQL = "INSERT INTO td_classe (nme_classe,dsc_classe)
VALUES('" . $this->db->scapeCont($name) . "','" . $this->db->scapeCont($desc) . "')";
        $this->db->insert($stringSQL);
        
        return true;
    }
    
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
    }
}