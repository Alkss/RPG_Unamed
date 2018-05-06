<?php


/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:23
 */
class Table
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
        $stringSQL = "SELECT * FROM tb_sala " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function createTable($name, $history, $password, $players)
    {
        $select = $this->selectAll("nme_sala = '" . $this->db->scapeCont($name) . "'");
        if ($select) {
            return false;
        } else {
            $today = date('Y-m-d H:i:s');
            
            $stringSQL = "INSERT INTO tb_sala (`nme_sala`,`dta_criacao_sala`,`dta_ultima_atividade_sala`,`hst_campanha_sala`,`pwd_sala`,`qtd_players_sala`)
VALUES('"
                . $this->db->scapeCont($name) . "','"
                . $this->db->scapeCont($today) . "','"
                . $this->db->scapeCont($today) . "','"
                . $this->db->scapeCont($history) . "','"
                . $this->db->scapeCont($password) . "','"
                . $this->db->scapeCont($players) . "')";
            
            
            $idt_sala = $this->db->insert($stringSQL);
            $idt_usuario = $_SESSION["idt_usuario"];
            $stringSQL = "INSERT INTO ta_perfil_sala(`cod_usuario`,`cod_papel_sala`,`cod_sala`) VALUES (";
            $stringSQL .= $this->db->scapeCont($idt_usuario) . ",3," .
                $this->db->scapeCont($idt_sala) . ")";
            $this->db->insert($stringSQL);
            return true;
        }
    }
    
    public function selectCharacterTable($tableId)
    {
        $stringSQL = "SELECT nme_personagem, img_personagem, qtd_vida_personagem, qtd_vida_total_personagem, nme_usuario FROM tb_usuario JOIN ta_perfil_sala ON idt_usuario=cod_usuario JOIN tb_personagem ON idt_personagem=cod_personagem JOIN tb_sala ON idt_sala=cod_sala where idt_sala=" . $this->db->scapeCont($tableId);
        return $this->db->search($stringSQL);
    }
    
    public function selectUserRole($idtTable, $idtUser)
    {
        $stringSQL = "SELECT cod_papel_sala FROM tb_usuario JOIN ta_perfil_sala ON idt_usuario=cod_usuario JOIN tb_sala ON idt_sala=cod_sala WHERE cod_sala='" . $this->db->scapeCont($idtTable) . "' AND cod_usuario=" . $this->db->scapeCont($idtUser);
        return $this->db->search($stringSQL);
    }

    public function updateTable($id, $name, $history, $password, $players)
    {
        $today = date('Y-m-d H:i:s');
        $sql = "update tb_sala set nme_sala = '" . $this->db->scapeCont($name) . "',"
            . "hst_campanha_sala = '" . $this->db->scapeCont($history) . "',"
            . "pwd_sala = '" . $this->db->scapeCont($password) . "',"
            . "qtd_players_sala = '" . $this->db->scapeCont($players) . "',"
            . "dta_criacao_sala = '" . $this->db->scapeCont($today) . "',"
            . "dta_ultima_atividade_sala = '" . $this->db->scapeCont($today) . "' "
            . " where idt_sala = " . $this->db->scapeCont($id);
        return $this->db->executeQuery($sql);
    }

        public function deleteTable($idt){
        $stringSQL ="DELETE FROM ta_perfil_sala WHERE cod_sala = ". $this->db->scapeCont($idt); 
        $this->db->executeQuery($stringSQL);
        $stringSQL ="DELETE FROM tb_sala WHERE idt_sala = ". $this->db->scapeCont($idt);
        $this->db->executeQuery($stringSQL);
        return true;
	}
}
