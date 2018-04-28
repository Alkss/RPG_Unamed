<?php


/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:23
 */
class Divinity
{
    function __construct()
    {
        $this->db = new DataBase();
    }
    
    public function selectAll($where = ""){
        if ($where != ""){
            $where = "where ".$where;
        }
        $stringSQL = "SELECT * FROM td_divindade ".$where;
        return $this->db->search($stringSQL);
    }
    
    public function createDivinity($name, $desc)
    {
        $stringSQL = "INSERT INTO td_divindade (dsc_divindade,nme_divindade)
VALUES('" . $this->db->scapeCont($desc) . "','" . $this->db->scapeCont($name) . "')";
        $this->db->insert($stringSQL);
        
        return true;
    }
    
    public function updateDivinity($idt,$name,$desc){
        $stringSQL = "UPDATE td_divindade SET nme_divindade ='".$this->db->scapeCont($name)."', dsc_divindade ='".$this->db->scapeCont($desc)."' WHERE idt_divindade = ".$this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function deleteDivinity($idt){
        $stringSQL ="DELETE FROM td_divindade WHERE idt_divindade IN(".$this->db->scapeCont($idt).") AND idt_divindade NOT IN(SELECT DISTINCT cod_divindade FROM ta_culto)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
}