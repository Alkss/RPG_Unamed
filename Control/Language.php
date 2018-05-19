<?php


/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:23
 */
class Language
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
        $stringSQL = "SELECT * FROM td_linguagem " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function createLang($name)
    {
        $stringSQL = "INSERT INTO td_linguagem (nme_linguagem)
VALUES('" . $this->db->scapeCont($name) ."')";
        $this->db->insert($stringSQL);
        
        return true;
    }
    
    public function updateLang($idt, $name)
    {
        $stringSQL = "UPDATE td_linguagem SET nme_linguagem ='" . $this->db->scapeCont($name) ."' WHERE idt_linguagem = " . $this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function deleteLang($idt)
    {
        $stringSQL = "DELETE FROM td_linguagem WHERE idt_linguagem IN(" . $this->db->scapeCont($idt) . ") AND idt_linguagem NOT IN(SELECT DISTINCT cod_classe FROM tb_personagem)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function checkIfExistsByName($name, $idt = ""){
        $where = "";
        if ($idt != "") {
            $where = "AND idt_linguagem != " . $idt;
        }
        $stringSQL = "SELECT * FROM `td_linguagem` WHERE nme_linguagem = '" . $this->db->scapeCont($name) . "' " . $where;
        $sql = $this->db->search($stringSQL);
        if ($sql) {
            return true;
        }
        return false;
        
    }
}