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
    
    public function selectAll($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT * FROM td_alinhamento " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function createAlignment($name, $desc)
    {
        $stringSQL = "INSERT INTO td_alinhamento (dsc_alinhamento,nme_alinhamento)
VALUES('" . $this->db->scapeCont($desc) . "','" . $this->db->scapeCont($name) . "')";
        $this->db->insert($stringSQL);
        
        return true;
    }
    
    public function updateAlignment($idt, $name, $desc)
    {
        $stringSQL = "UPDATE td_alinhamento SET nme_alinhamento ='" . $this->db->scapeCont($name) . "', dsc_alinhamento ='" . $this->db->scapeCont($desc) . "' WHERE idt_alinhamento = " . $this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function deleteAlingment($idt)
    {
        $stringSQL = "DELETE FROM td_alinhamento WHERE idt_alinhamento IN(" . $this->db->scapeCont($idt) . ") AND idt_alinhamento NOT IN(SELECT DISTINCT cod_alinhamento FROM tb_personagem)";
        $this->db->executeQuery($stringSQL);
        return true;
    }
    
    public function checkIfExistsByName($name, $idt = "")
    {
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
    
    public function avaibleAlignments($alignName)
    {
        $avaibleAlignments = array();
        
        //Leal e Bom
        if ($alignName == 1) {
            $avaibleAlignments = array(
                8 => "Heironeous",
                11 => "Moradin",
                19 => "Yondalla"
            );
        } //Neutro e Bom
        else if ($alignName == 2) {
            $avaibleAlignments = array(
                3 => "Ehlonna",
                6 => "Garl Glittergold",
                15 => "Pelor"
            );
        } //Caotico e Bom
        else if ($alignName == 3) {
            $avaibleAlignments = array(
                2 => "Corellon Larethian",
                10 => "Kord"
            );
        } //Leal e Neutro
        else if ($alignName == 4) {
            $avaibleAlignments = array(
                16 => "St. Cuthbert",
                18 => "Wee Jas"
            );
        } //Neutro
        else if ($alignName == 5) {
            $avaibleAlignments = array(
                1 => "Boccob",
                5 => "Fharlanghn",
                13 => "Obad-Hai"
            );
        } //Caotico e Neutro
        else if ($alignName == 6) {
            $avaibleAlignments = array(
                14 => "Olidammara"
            );
        } //Leal e Mau
        else if ($alignName == 7) {
            $avaibleAlignments = array(
                9 => "Hextor"
            );
        } //Neutro e Mau
        else if ($alignName == 8) {
            $avaibleAlignments = array(
                12 => "Nerull",
                17 => "Vecna"
            );
        } //Neutro e Bom
        else if ($alignName == 2) {
            $avaibleAlignments = array(
                4 => "Erythnul",
                7 => "Gruumsh"
            );
        } else {
            $avaibleAlignments = array(
                1 => "Boccob",
                2 => "Corellon Larethian",
                3 => "Ehlonna",
                4 => "Erythnul",
                5 => "Fharlanghn",
                6 => "Garl Glittergold",
                7 => "Gruumsh",
                8 => "Heironeous",
                9 => "Hextor",
                10 => "Kord",
                11 => "Moradin",
                12 => "Nerull",
                13 => "Obad-Hai",
                14 => "Olidammara",
                15 => "Pelor",
                16 => "St. Cuthbert",
                17 => "Vecna",
                18 => "Wee Jas",
                19 => "Yondalla"
            );
        }
        
        return $avaibleAlignments;
    }
}