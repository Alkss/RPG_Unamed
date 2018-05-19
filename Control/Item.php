<?php


/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:23
 */
class Item
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
        $stringSQL = "SELECT * FROM td_item " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function createItem($name, $desc)
    {
        $stringSQL = "INSERT INTO td_item (dsc_item,nme_item)
VALUES('" . $this->db->scapeCont($desc) . "','" . $this->db->scapeCont($name) . "')";
        $this->db->insert($stringSQL);
        
        return true;
    }
    
    public function removeItemFromChar($codChar, $codItem)
    {
        $stringSQL = "DELETE FROM ta_utilizaveis WHERE cod_personagem=" . $this->db->scapeCont($codChar) . " AND cod_item IN(" . $this->db->scapeCont($codItem) . ")";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function addItemAtChar($codChar, $codItem)
    {
        $stringSQL = "INSERT INTO ta_utilizaveis(cod_personagem, cod_item) VALUES(".$this->db->scapeCont($codChar).",".$this->db->scapeCont($codItem).")";
        $this->db->insert($stringSQL);
        return true;
    }
    
    public function selectAvailableItem($codChar)
    {
        $stringSQL = "SELECT idt_item, nme_item FROM td_item WHERE idt_item NOT IN(SELECT cod_item FROM ta_utilizaveis WHERE cod_personagem=" . $this->db->scapeCont($codChar) . ")";
        return $this->db->search($stringSQL);
    }
    
    public function selectCharItem($codChar)
    {
        $stringSQL = "SELECT nme_item, idt_item FROM td_item JOIN ta_utilizaveis ON idt_item=cod_item JOIN tb_personagem ON idt_personagem=cod_personagem WHERE cod_personagem=" . $this->db->scapeCont($codChar);
        return $this->db->search($stringSQL);
    }
    
    public function updateItem($idt, $name, $desc)
    {
        $stringSQL = "UPDATE td_item SET nme_item ='" . $this->db->scapeCont($name) . "', dsc_item ='" . $this->db->scapeCont($desc) . "' WHERE idt_item = " . $this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function deleteItem($idt)
    {
        $stringSQL = "DELETE FROM td_item WHERE idt_item IN(" . $this->db->scapeCont($idt) . ") AND idt_item NOT IN(SELECT DISTINCT cod_item FROM ta_utilizaveis)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function getError($errorNumber){
        $errorMessage = "";
        if($errorNumber == 1){
            $errorMessage = "Selecione alguma magia";
        }else if($errorNumber == 2){
            $errorMessage = "Selecione algum utilizavel";
        }else if($errorNumber == 3){
            $errorMessage = "Selecione algum equipamento";
        }else if($errorNumber == 4){
            $errorMessage = "Selecione algum atributo";
        }else{
            $errorMessage = "Selecione algum personalizado";
        }
        return $errorMessage;
    }
    
    public function checkIfExistsByName($name, $idt = ""){
        $where = "";
        if ($idt != "") {
            $where = "AND idt_item != " . $idt;
        }
        $stringSQL = "SELECT * FROM `td_item` WHERE nme_item = '" . $this->db->scapeCont($name) . "' " . $where;
        $sql = $this->db->search($stringSQL);
        if ($sql) {
            return true;
        }
        return false;
        
    }
}