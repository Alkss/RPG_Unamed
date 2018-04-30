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
    
    public function selectNotInChar($codChar){
        $stringSQL = "SELECT * FROM td_magia WHERE idt_magia NOT IN (SELECT cod_magia FROM `ta_personagem_magia` WHERE cod_personagem=".$this->db->scapeCont($codChar).")";
        return $this->db->search($stringSQL);
    }
    
    public function selectCharMagic($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT idt_personagem_magia,cod_personagem,cod_magia,idt_magia,dsc_magia,nme_magia,tpo_magia,mod_base_magia FROM tb_personagem JOIN ta_personagem_magia ON idt_personagem=cod_personagem JOIN td_magia ON idt_magia=cod_magia " . $where;
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
    
    public function removeMagicFromChar($codChar, $codMagic)
    {
        $stringSQL = "DELETE FROM ta_personagem_magia WHERE cod_personagem=" . $this->db->scapeCont($codChar) . " AND cod_magia IN(" . $this->db->scapeCont($codMagic) . ")";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function addMagicAtChar($codChar, $codMagic)
    {
        $stringSQL = "INSERT INTO ta_personagem_magia(cod_personagem, cod_magia) VALUES(".$this->db->scapeCont($codChar).",".$this->db->scapeCont($codMagic).")";
        $this->db->insert($stringSQL);
        return true;
    }
    
}