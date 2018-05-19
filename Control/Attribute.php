<?php

class Attribute
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
        $stringSQL = "SELECT * FROM td_atributo " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function createAttribute($name)
    {
        $stringSQL = "INSERT INTO td_atributo (nme_atributo)
VALUES('" . $this->db->scapeCont($name) . "')";
        $this->db->insert($stringSQL);
        
        return true;
    }
    
    public function updateAttribute($idt, $name)
    {
        $stringSQL = "UPDATE td_atributo SET nme_atributo ='" . $this->db->scapeCont($name) . "' WHERE idt_atributo = " . $this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function deleteAttribute($idt)
    {
        $stringSQL = "DELETE FROM td_atributo WHERE idt_atributo IN(" . $this->db->scapeCont($idt) . ") AND idt_atributo NOT IN(SELECT DISTINCT cod_atributo FROM ta_personagem_atributo)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    
    //A partir daqui
    public function selectAvailableAttribute($codChar)
    {
        $stringSQL = "SELECT idt_atributo, nme_atributo FROM td_atributo WHERE idt_atributo NOT IN(SELECT cod_atributo FROM ta_personagem_atributo WHERE cod_personagem=" . $this->db->scapeCont($codChar) . ")";
        return $this->db->search($stringSQL);
    }
    
    public function selectCharAttribute($codChar)
    {
        $stringSQL = "SELECT idt_atributo, nme_atributo, val_personagem_atributo FROM td_atributo JOIN ta_personagem_atributo ON idt_atributo=cod_atributo JOIN tb_personagem ON idt_personagem=cod_personagem WHERE cod_personagem=" . $this->db->scapeCont($codChar);
        return $this->db->search($stringSQL);
    }
    
    public function removeAttributeFromChar($codChar, $codAttr)
    {
        $stringSQL = "DELETE FROM ta_personagem_atributo WHERE cod_personagem=" . $this->db->scapeCont($codChar) . " AND cod_atributo IN(" . $this->db->scapeCont($codAttr) . ")";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function addAttributeAtChar($codChar, $codAttr)
    {
        $stringSQL = "INSERT INTO ta_personagem_atributo(cod_personagem, cod_atributo, val_personagem_atributo) VALUES(" . $this->db->scapeCont($codChar) . "," . $this->db->scapeCont($codAttr) . ",0)";
        $this->db->insert($stringSQL);
        return true;
    }
    
    public function updateCharAttribute($codChar, $attr)
    {
        foreach ($attr as $key => $singleAttr) {
            $stringSQL = "UPDATE ta_personagem_atributo SET val_personagem_atributo=" . $this->db->scapeCont($singleAttr) . " WHERE cod_personagem=" . $this->db->scapeCont($codChar) . " AND cod_atributo=" . $this->db->scapeCont($key);
            $this->db->executeQuery($stringSQL);
        }
        return true;
    }
    
    public function checkIfExistsByName($name, $idt = ""){
        $where = "";
        if ($idt != "") {
            $where = "AND idt_atributo != " . $idt;
        }
        $stringSQL = "SELECT * FROM `td_atributo` WHERE nme_atributo = '" . $this->db->scapeCont($name) . "' " . $where;
        $sql = $this->db->search($stringSQL);
        if ($sql) {
            return true;
        }
        return false;
        
    }
}