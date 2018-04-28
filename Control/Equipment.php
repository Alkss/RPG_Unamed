<?php
class Equipment
{
    
    function __construct()
    {
        $this->db = new DataBase();
        
    }
    
    public function selectAll($where = ""){
        if ($where != ""){
            $where = "where ".$where;
        }
        $stringSQL = "SELECT * FROM td_equipamento ".$where;
        return $this->db->search($stringSQL);
    }
    
    public function createEquipment($name, $desc, $type, $mod_base)
    {
            $stringSQL = "INSERT INTO `td_equipamento`(`nme_equipamento`,`dsc_equipamento`,`tpo_equipamento`,`mod_base_equipamento`)
                          VALUES('" . $this->db->scapeCont($name) . "','" . $this->db->scapeCont($desc) . "','" . 
                          $this->db->scapeCont($type) . "','" . $this->db->scapeCont($mod_base) . "');";
            $this->db->executeQuery($stringSQL);
            return true;
    }
    
    public function updateEquipment($id,$name, $desc, $type, $mod_base)
    {
        $sql = "update td_equipamento set nme_equipamento = '" . $this->db->scapeCont($name) . "',"
            . "dsc_equipamento = '" . $this->db->scapeCont($desc) . "',"
            . "tpo_equipamento = '" . $this->db->scapeCont($type) . "',"
            . "mod_base_equipamento = '" . $this->db->scapeCont($mod_base) . "' "
            . " where idt_equipamento = " . $this->db->scapeCont($id);
        return $this->db->executeQuery($sql);
    }
    
    public function deleteEquipment($idt){
        $stringSQL ="DELETE FROM td_equipamento WHERE idt_equipamento IN(".$this->db->scapeCont($idt).") AND idt_equipamento NOT IN(SELECT DISTINCT cod_equipamento FROM ta_equipavel)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
}