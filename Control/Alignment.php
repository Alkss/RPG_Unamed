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
    
    
    public function createAlignment($name, $desc)
    {
        $stringSQL = "INSERT INTO td_alinhamento (dsc_alinhamento,nme_alinhamento)
VALUES('" . $this->db->scapeCont($desc) . "','" . $this->db->scapeCont($name) . "')";
        $this->db->insert($stringSQL);
        
        return true;
    }
}