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
        if ($className == 10) {
            $avaibleAligments = array(
                11 => "Neutro e Bom",
                13 => "Leal e Neutro",
                14 => "Neutro",
                15 => "Caótico e Neutro",
                17 => "Neutro e Mal"
            );
        } //Barbaro
        else if ($className == 29) {
            $avaibleAligments = array(
                11 => "Neutro e Bom",
                12 => "Caótico e Bom",
                14 => "Neutro",
                15 => "Caótico e Neutro",
                17 => "Neutro e Mal",
                18 => "Caótico e Mal"
            );
        } //Bardo
        else if ($className == 30) {
            $avaibleAligments = array(
                11 => "Neutro e Bom",
                12 => "Caótico e Bom",
                14 => "Neutro",
                15 => "Caótico e Neutro",
                17 => "Neutro e Mal",
                18 => "Caótico e Mal"
            );
        } //Clérigo
        else if ($className == 31) {
            $avaibleAligments = array(
                10 => "Leal e Bom",
                11 => "Neutro e Bom",
                12 => "Caótico e Bom",
                13 => "Leal e Neutro",
                14 => "Neutro",
                15 => "Caótico e Neutro",
                16 => "Leal e Mal",
                17 => "Neutro e Mal",
                18 => "Caótico e Mal"
            );
        } //Feiticeiro
        else if ($className == 32) {
            $avaibleAligments = array(
                10 => "Leal e Bom",
                11 => "Neutro e Bom",
                12 => "Caótico e Bom",
                13 => "Leal e Neutro",
                14 => "Neutro",
                15 => "Caótico e Neutro",
                16 => "Leal e Mal",
                17 => "Neutro e Mal",
                18 => "Caótico e Mal"
            );
        }
        //Guerreiro
        else if ($className == 33) {
            $avaibleAligments = array(
                10 => "Leal e Bom",
                11 => "Neutro e Bom",
                12 => "Caótico e Bom",
                13 => "Leal e Neutro",
                14 => "Neutro",
                15 => "Caótico e Neutro",
                16 => "Leal e Mal",
                17 => "Neutro e Mal",
                18 => "Caótico e Mal"
            );
        }
        //Ladino
        else if ($className == 34) {
            $avaibleAligments = array(
                10 => "Leal e Bom",
                11 => "Neutro e Bom",
                12 => "Caótico e Bom",
                13 => "Leal e Neutro",
                14 => "Neutro",
                15 => "Caótico e Neutro",
                16 => "Leal e Mal",
                17 => "Neutro e Mal",
                18 => "Caótico e Mal"
            );
        }
        //Mago
        else if ($className == 35) {
            $avaibleAligments = array(
                10 => "Leal e Bom",
                11 => "Neutro e Bom",
                12 => "Caótico e Bom",
                13 => "Leal e Neutro",
                14 => "Neutro",
                15 => "Caótico e Neutro",
                16 => "Leal e Mal",
                17 => "Neutro e Mal",
                18 => "Caótico e Mal"
            );
        }
        //Monge
        else if ($className == 36) {
            $avaibleAligments = array(
                10 => "Leal e Bom",
                13 => "Leal e Neutro",
                16 => "Leal e Mal"
            );
        }
        //Paladino
        else if ($className == 37) {
            $avaibleAligments = array(
                10 => "Leal e Bom"
            );
        }
        //Ranger
        else if ($className == 38) {
            $avaibleAligments = array(
                10 => "Leal e Bom",
                11 => "Neutro e Bom",
                12 => "Caótico e Bom",
                13 => "Leal e Neutro",
                14 => "Neutro",
                15 => "Caótico e Neutro",
                16 => "Leal e Mal",
                17 => "Neutro e Mal",
                18 => "Caótico e Mal"
            );
        }
        
        return $avaibleAligments;
    }
}