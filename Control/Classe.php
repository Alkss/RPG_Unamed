<?php


/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:23
 */
class Classe
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
        $stringSQL = "SELECT * FROM td_classe " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function createClasse($name, $desc)
    {
        
        $stringSQL = "INSERT INTO td_classe (nme_classe,dsc_classe)
VALUES('" . $this->db->scapeCont($name) . "','" . $this->db->scapeCont($desc) . "')";
        $this->db->insert($stringSQL);
        
        return true;
    }
    
    public function updateClasse($idt, $name, $desc)
    {
        $stringSQL = "UPDATE td_classe SET nme_classe ='" . $this->db->scapeCont($name) . "', dsc_classe ='" . $this->db->scapeCont($desc) . "' WHERE idt_classe = " . $this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function deleteClasse($idt)
    {
        $stringSQL = "DELETE FROM td_classe WHERE idt_classe IN(" . $this->db->scapeCont($idt) . ") AND idt_classe NOT IN(SELECT DISTINCT cod_classe FROM tb_personagem)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function checkIfExistsByName($name, $idt = "")
    {
        $where = "";
        if ($idt != "") {
            $where = "AND idt_classe != " . $idt;
        }
        $stringSQL = "SELECT * FROM `td_classe` WHERE nme_classe = '" . $this->db->scapeCont($name) . "' " . $where;
        $sql = $this->db->search($stringSQL);
        if ($sql) {
            return true;
        }
        return false;
        
    }
    
    public function avaibleAlignments($className)
    {
        $avaibleAligments = array();
        //Druida
        if ($className == 4) {
            $avaibleAligments = array(
                2 => "Neutro e Bom",
                4 => "Leal e Neutro",
                5 => "Neutro",
                6 => "Caótico e Neutro",
                8 => "Neutro e Mau"
            );
        } //Barbaro
        else if ($className == 1) {
            $avaibleAligments = array(
                2 => "Neutro e Bom",
                3 => "Caótico e Bom",
                5 => "Neutro",
                6 => "Caótico e Neutro",
                8 => "Neutro e Mau",
                9 => "Caótico e Mau"
            );
        } //Bardo
        else if ($className == 2) {
            $avaibleAligments = array(
                2 => "Neutro e Bom",
                3 => "Caótico e Bom",
                5 => "Neutro",
                6 => "Caótico e Neutro",
                8 => "Neutro e Mau",
                9 => "Caótico e Mau"
            );
        } //Clérigo
        else if ($className == 3) {
            $avaibleAligments = array(
                1 => "Leal e Bom",
                2 => "Neutro e Bom",
                3 => "Caótico e Bom",
                4 => "Leal e Neutro",
                5 => "Neutro",
                6 => "Caótico e Neutro",
                7 => "Leal e Mau",
                8 => "Neutro e Mau",
                9 => "Caótico e Mau"
            );
        } //Feiticeiro
        else if ($className == 5) {
            $avaibleAligments = array(
                1 => "Leal e Bom",
                2 => "Neutro e Bom",
                3 => "Caótico e Bom",
                4 => "Leal e Neutro",
                5 => "Neutro",
                6 => "Caótico e Neutro",
                7 => "Leal e Mau",
                8 => "Neutro e Mau",
                9 => "Caótico e Mau"
            );
        } //Guerreiro
        else if ($className == 6) {
            $avaibleAligments = array(
                1 => "Leal e Bom",
                2 => "Neutro e Bom",
                3 => "Caótico e Bom",
                4 => "Leal e Neutro",
                5 => "Neutro",
                6 => "Caótico e Neutro",
                7 => "Leal e Mau",
                8 => "Neutro e Mau",
                9 => "Caótico e Mau"
            );
        } //Ladino
        else if ($className == 7) {
            $avaibleAligments = array(
                1 => "Leal e Bom",
                2 => "Neutro e Bom",
                3 => "Caótico e Bom",
                4 => "Leal e Neutro",
                5 => "Neutro",
                6 => "Caótico e Neutro",
                7 => "Leal e Mau",
                8 => "Neutro e Mau",
                9 => "Caótico e Mau"
            );
        } //Mago
        else if ($className == 8) {
            $avaibleAligments = array(
                1 => "Leal e Bom",
                2 => "Neutro e Bom",
                3 => "Caótico e Bom",
                4 => "Leal e Neutro",
                5 => "Neutro",
                6 => "Caótico e Neutro",
                7 => "Leal e Mau",
                8 => "Neutro e Mau",
                9 => "Caótico e Mau"
            );
        } //Monge
        else if ($className == 9) {
            $avaibleAligments = array(
                1 => "Leal e Bom",
                4 => "Leal e Neutro",
                7 => "Leal e Mau"
            );
        } //Paladino
        else if ($className == 10) {
            $avaibleAligments = array(
                1 => "Leal e Bom"
            );
        } //Ranger
        else if ($className == 11) {
            $avaibleAligments = array(
                1 => "Leal e Bom",
                2 => "Neutro e Bom",
                3 => "Caótico e Bom",
                4 => "Leal e Neutro",
                5 => "Neutro",
                6 => "Caótico e Neutro",
                7 => "Leal e Mau",
                8 => "Neutro e Mau",
                9 => "Caótico e Mau"
            );
        } else {
            $avaibleAligments = array(
                1 => "Leal e Bom",
                2 => "Neutro e Bom",
                3 => "Caótico e Bom",
                4 => "Leal e Neutro",
                5 => "Neutro",
                6 => "Caótico e Neutro",
                7 => "Leal e Mau",
                8 => "Neutro e Mau",
                9 => "Caótico e Mau"
            );
        }
        
        return $avaibleAligments;
    }
}