<?php


/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:23
 */
class Alignment
{
    function __construct()
    {
        $this->db = new DataBase();
    }
    
    public function selectAll($where = ""){
        if ($where != ""){
            $where = "where ".$where;
        }
        $stringSQL = "SELECT * FROM td_alinhamento ".$where;
        return $this->db->search($stringSQL);
    }
    
    public function createAlignment($name, $desc)
    {
        $stringSQL = "INSERT INTO td_alinhamento (dsc_alinhamento,nme_alinhamento)
VALUES('" . $this->db->scapeCont($desc) . "','" . $this->db->scapeCont($name) . "')";
        $this->db->insert($stringSQL);
        
        return true;
    }
    
    public function updateAlignment($idt,$name,$desc){
        $stringSQL = "UPDATE td_alinhamento SET nme_alinhamento ='".$this->db->scapeCont($name)."', dsc_alinhamento ='".$this->db->scapeCont($desc)."' WHERE idt_alinhamento = ".$this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function deleteAlingment($idt){
        $stringSQL ="DELETE FROM td_alinhamento WHERE idt_alinhamento IN(".$this->db->scapeCont($idt).") AND idt_alinhamento NOT IN(SELECT DISTINCT cod_alinhamento FROM tb_personagem)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function checkIfExistsByName($name, $idt = ""){
        $where = "";
        if ($idt != "") {
            $where = "AND idt_alinhamento != " . $idt;
        }
        $stringSQL = "SELECT * FROM `td_alinhamento` WHERE nme_alinhamento = '" . $this->db->scapeCont($name) . "' " . $where;
        $sql = $this->db->search($stringSQL);
        if ($sql) {
            return true;
        }
        return false;
        
    }
}