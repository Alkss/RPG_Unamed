<?php


/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:23
 */
class Race
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
        $stringSQL = "SELECT * FROM td_raca " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function createRace($name, $desc)
    {
        $stringSQL = "INSERT INTO td_raca (nme_raca,dsc_raca)
VALUES('" . $this->db->scapeCont($name) . "','" . $this->db->scapeCont($desc) . "')";
        $this->db->insert($stringSQL);
        
        return true;
    }
    
    public function updateRace($idt, $name, $desc)
    {
        $stringSQL = "UPDATE td_raca SET nme_raca ='" . $this->db->scapeCont($name) . "', dsc_raca ='" . $this->db->scapeCont($desc) . "' WHERE idt_raca = " . $this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function deleteRace($idt)
    {
        $stringSQL = "DELETE FROM td_raca WHERE idt_raca IN(" . $this->db->scapeCont($idt) . ") AND idt_raca NOT IN(SELECT DISTINCT cod_classe FROM tb_personagem)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function checkIfExistsByName($name, $idt = "")
    {
        $where = "";
        if ($idt != "") {
            $where = "AND idt_raca != " . $idt;
        }
        $stringSQL = "SELECT * FROM `td_raca` WHERE nme_raca = '" . $this->db->scapeCont($name) . "' " . $where;
        $sql = $this->db->search($stringSQL);
        if ($sql) {
            return true;
        }
        return false;
        
    }
    
    public function avaibleSizes($raceName)
    {
        
        //1 para altura min - 2 para max
        //3 para peso min - 4 para max
        $avaibleSizes = array();
        //Humano
        if ($raceName == 1) {
            $avaibleSizes = array(
                1 => 1.60,
                2 => 2.10,
                3 => 60,
                4 => 90
            );
        } //Anão
        else if ($raceName == 2) {
            $avaibleSizes = array(
                1 => 1.30,
                2 => 1.50,
                3 => 60,
                4 => 90
            );
        } //Elfo
        else if ($raceName == 3) {
            $avaibleSizes = array(
                1 => 1.40,
                2 => 1.70,
                3 => 40,
                4 => 60
            );
        } //Gnomo
        else if ($raceName == 4) {
            $avaibleSizes = array(
                1 => 1.00,
                2 => 1.20,
                3 => 20,
                4 => 30
            );
        } //Meio-Orc
        else if ($raceName == 6) {
            $avaibleSizes = array(
                1 => 1.80,
                2 => 2.10,
                3 => 90,
                4 => 125
            );
        } //Halfling
        else if ($raceName == 7) {
            $avaibleSizes = array(
                1 => 0.00,
                2 => 0.90,
                3 => 15,
                4 => 18
            );
        } // Meio-elfo
        else if ($raceName == 5) {
            $avaibleSizes = array(
                1 => 1.50,
                2 => 1.80,
                3 => 45,
                4 => 90
            );
        } else {
            $avaibleSizes = array(
                1 => 0.00,
                2 => 3.00,
                3 => 0,
                4 => 150
            );
        }
        
        return $avaibleSizes;
    }
}