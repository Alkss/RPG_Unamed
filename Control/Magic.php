<?php

class Magic
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
        $stringSQL = "SELECT * FROM td_magia " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function selectCharMagic($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT * FROM tb_personagem JOIN ta_personagem_magia ON idt_personagem=cod_personagem JOIN td_magia ON idt_magia=cod_magia " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function createMagic($name, $desc, $type, $mod_base)
    {
        $stringSQL = "INSERT INTO `td_magia`(`nme_magia`,`dsc_magia`,`tpo_magia`,`mod_base_magia`)
                          VALUES('" . $this->db->scapeCont($name) . "','" . $this->db->scapeCont($desc) . "','" .
            $this->db->scapeCont($type) . "','" . $this->db->scapeCont($mod_base) . "');";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function updateMagic($id, $name, $desc, $type, $mod_base)
    {
        $sql = "update td_magia set nme_magia = '" . $this->db->scapeCont($name) . "',"
            . "dsc_magia = '" . $this->db->scapeCont($desc) . "',"
            . "tpo_magia = '" . $this->db->scapeCont($type) . "',"
            . "mod_base_magia = '" . $this->db->scapeCont($mod_base) . "' "
            . " where idt_magia = " . $this->db->scapeCont($id);
        return $this->db->executeQuery($sql);
    }
    
    public function deleteMagic($idt)
    {
        $stringSQL = "DELETE FROM td_magia WHERE idt_magia IN(" . $this->db->scapeCont($idt) . ") AND idt_magia NOT IN(SELECT DISTINCT cod_magia FROM ta_personagem_magia)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
}