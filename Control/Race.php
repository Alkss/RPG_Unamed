<?php


/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:23
 */
class Race
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
        $stringSQL = "SELECT * FROM td_raca " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function createRace($name, $desc)
    {
        $stringSQL = "INSERT INTO td_raca (nme_raca,dsc_raca)
VALUES('" . $this->db->scapeCont($name) . "','" . $this->db->scapeCont($desc) . "')";
        $this->db->insert($stringSQL);
        
        return true;
    }
    
    public function updateRace($idt, $name, $desc)
    {
        $stringSQL = "UPDATE td_raca SET nme_raca ='" . $this->db->scapeCont($name) . "', dsc_raca ='" . $this->db->scapeCont($desc) . "' WHERE idt_raca = " . $this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function deleteRace($idt)
    {
        $stringSQL = "DELETE FROM td_raca WHERE idt_raca IN(" . $this->db->scapeCont($idt) . ") AND idt_raca NOT IN(SELECT DISTINCT cod_classe FROM tb_personagem)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function checkIfExistsByName($name, $idt = ""){
        $where = "";
        if ($idt != "") {
            $where = "AND idt_raca != " . $idt;
        }
        $stringSQL = "SELECT * FROM `td_raca` WHERE nme_raca = '" . $this->db->scapeCont($name) . "' " . $where;
        $sql = $this->db->search($stringSQL);
        if ($sql) {
            return true;
        }
        return false;
        
    }
}