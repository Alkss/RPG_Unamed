<?php


/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:23
 */
class Expertise
{
    function __construct()
    {
        $this->db = new DataBase();
    }
    
    public function selectAll($where = ""){
        if ($where != ""){
            $where = "where ".$where;
        }
        $stringSQL = "SELECT * FROM td_pericia ".$where;
        return $this->db->search($stringSQL);
    }
    
    public function createExpertise($name, $desc)
    {
        $stringSQL = "INSERT INTO td_pericia (dsc_pericia,nme_pericia)
VALUES('" . $this->db->scapeCont($desc) . "','" . $this->db->scapeCont($name) . "')";
        $this->db->insert($stringSQL);
        
        return true;
    }
    
    public function updateExpertise($idt,$name,$desc){
        $stringSQL = "UPDATE td_pericia SET nme_pericia ='".$this->db->scapeCont($name)."', dsc_pericia ='".$this->db->scapeCont($desc)."' WHERE idt_pericia = ".$this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function deleteExpertise($idt){
        $stringSQL ="DELETE FROM td_pericia WHERE idt_pericia IN(".$this->db->scapeCont($idt).") AND idt_pericia NOT IN(SELECT DISTINCT cod_pericia FROM ta_aptidao)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
}