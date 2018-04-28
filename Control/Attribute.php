<?php
class Attribute
{
    function __construct()
    {
        $this->db = new DataBase();
    }
    
    public function selectAll($where = ""){
        if ($where != ""){
            $where = "where ".$where;
        }
        $stringSQL = "SELECT * FROM td_atributo ".$where;
        return $this->db->search($stringSQL);
    }
    
    public function createAttribute($name)
    {
        $stringSQL = "INSERT INTO td_atributo (nme_atributo)
VALUES('" . $this->db->scapeCont($name) . "')";
        $this->db->insert($stringSQL);
        
        return true;
    }
    
    public function updateAttribute($idt,$name){
        $stringSQL = "UPDATE td_atributo SET nme_atributo ='".$this->db->scapeCont($name)."' WHERE idt_atributo = ".$this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function deleteAttribute($idt){
        $stringSQL ="DELETE FROM td_atributo WHERE idt_atributo IN(".$this->db->scapeCont($idt).") AND idt_atributo NOT IN(SELECT DISTINCT cod_atributo FROM ta_personagem_atributo)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
}