<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/05/18
 * Time: 11:16
 */
class Custom
{
    function __construct()
    {
        $this->db = new DataBase();
        
    }
    
    public function insertCustom($idTable, $nme, $desc, $type, $char)
    {
        $stringSQL = "INSERT INTO tb_custom(nme_custom, dsc_custom, tpo_custom, cod_sala) VALUES('" . $this->db->scapeCont($nme) . "','" . $this->db->scapeCont($desc) . "','" . $this->db->scapeCont($type) . "', '" . $this->db->scapeCont($idTable) . "');";
        $idCustom = $this->db->insert($stringSQL);
        
        if ($char == null) {
            $stringSQL = "INSERT INTO ta_personalizavel(cod_custom, cod_personagem) VALUES(" . $this->db->scapeCont($idCustom) . ", null)";
            $this->db->insert($stringSQL);
        } else {
            $stringSQL = "INSERT INTO ta_personalizavel(cod_custom, cod_personagem) VALUES(" . $this->db->scapeCont($idCustom) . ",'" . $this->db->scapeCont($char) . "')";
            $this->db->insert($stringSQL);
        }
        return true;
    }
    
    public function selectCharCustom($idTable, $idChar)
    {
        $stringSQL = "SELECT idt_custom, nme_custom, dsc_custom, tpo_custom FROM tb_sala JOIN tb_custom ON idt_sala=cod_sala JOIN ta_personalizavel ON cod_custom=idt_custom WHERE cod_sala=" . $this->db->scapeCont($idTable) . " AND cod_personagem=" . $this->db->scapeCont($idChar) . ";";
        return $this->db->search($stringSQL);
    }
    
    public function selectNotInChar($codChar, $codTable)
    {
        $stringSQL = "SELECT * FROM tb_custom WHERE cod_sala=" . $this->db->scapeCont($codTable) . " AND idt_custom NOT IN (SELECT cod_custom FROM ta_personalizavel WHERE cod_personagem=" . $this->db->scapeCont($codChar) . ")";
        return $this->db->search($stringSQL);
        
    }
    
    public function removeCustomFromChar($codChar, $codCustom)
    {
        $stringSQL = "DELETE FROM ta_personalizavel WHERE cod_personagem=" . $this->db->scapeCont($codChar) . " AND cod_custom IN(" . $this->db->scapeCont($codCustom) . ")";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function addCustomAtChar($codChar, $codCustom)
    {
        $stringSQL = "INSERT INTO ta_personalizavel(cod_personagem, cod_custom) VALUES(" . $this->db->scapeCont($codChar) . "," . $this->db->scapeCont($codCustom) . ")";
        $this->db->insert($stringSQL);
        return true;
    }
}