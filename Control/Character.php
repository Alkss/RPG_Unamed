<?php

class Character
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
        $stringSQL = "SELECT * FROM tb_personagem " . $where;
        return $this->db->search($stringSQL);
    }
    
    
    public function selectRace($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT nme_raca FROM td_raca JOIN tb_personagem ON idt_raca=cod_raca " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function selectClass($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT nme_classe FROM td_classe JOIN tb_personagem ON idt_classe=cod_classe " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function selectAlignment($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT nme_alinhamento FROM td_alinhamento JOIN tb_personagem ON idt_alinhamento=cod_alinhamento " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function selectDivinity($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT nme_divindade FROM td_divindade JOIN ta_culto ON idt_divindade=cod_divindade JOIN tb_personagem ON idt_personagem=cod_personagem " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function selectLang($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT nme_linguagem FROM td_linguagem JOIN ta_personagem_linguagem ON idt_linguagem=cod_linguagem JOIN tb_personagem ON idt_personagem=cod_personagem " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function selectEquip($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT * FROM td_equipamento JOIN ta_equipavel ON idt_equipamento=cod_equipamento JOIN tb_personagem ON idt_personagem=cod_personagem " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function selectMagic($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT * FROM td_magia JOIN ta_personagem_magia ON idt_magia=cod_magia JOIN tb_personagem ON idt_personagem=cod_personagem " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function selectUsables($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT * FROM td_item JOIN ta_utilizaveis ON idt_item=cod_item JOIN tb_personagem ON idt_personagem=cod_personagem " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function selectAttribute($where = "")
    {
        if ($where != "") {
            $where = "where " . $where;
        }
        $stringSQL = "SELECT nme_atributo, val_personagem_atributo FROM td_atributo JOIN ta_personagem_atributo ON idt_atributo=cod_atributo JOIN tb_personagem ON idt_personagem=cod_personagem " . $where;
        return $this->db->search($stringSQL);
    }
    
    public function selectCharacter($where = "")
    {
        if ($where != "") {
            $where = " AND " . $where;
        }
        $idt_usuario = $_SESSION["idt_usuario"];
        $stringSQL = "SELECT * FROM tb_personagem INNER JOIN ta_perfil_sala ON cod_personagem = idt_personagem
							INNER JOIN tb_usuario ON cod_usuario = idt_usuario
                            WHERE idt_usuario =" . $this->db->scapeCont($idt_usuario) . $where;
        return $this->db->search($stringSQL);
    }
    
    //Pagina 1 de criaçao de personagem
    public function createCharacter_pt1($nme_personagem, $exp_personagem,
                                        $gen_personagem, $cod_religiao,
                                        $pes_personagem, $alt_personagem,
                                        $dsc_cabelo_pesonagem, $cor_olho,
                                        $img_personagem, $hst_personagem,
                                        $inf_adicional_personagem, $cod_alinhamento,
                                        $cod_classe, $cod_raca)
    {
        $idt_usuario = $_SESSION["idt_usuario"];
        if (isset($_GET["idt"])) {
            $sala_id = $_GET["idt"];
        } else {
            $sala_id = 1;
        }
        //Insert na tb_personagem
        $stringSQL = "INSERT INTO tb_personagem(";
        $stringSQL .= "nme_personagem,exp_personagem,gen_personagem,";
        $stringSQL .= "pes_personagem,alt_personagem,";
        $stringSQL .= "dsc_cabelo_personagem,img_personagem,cor_olho_personagem,";
        $stringSQL .= "hst_personagem,inf_adicional_personagem,cod_alinhamento,";
        $stringSQL .= "qtd_vida_personagem, qtd_vida_total_personagem,";
        $stringSQL .= "cod_classe,cod_raca,qtd_dinheiro_personagem) VALUES ('";
        $stringSQL .= $this->db->scapeCont($nme_personagem) . "'," . $this->db->scapeCont($exp_personagem) . ",'";
        $stringSQL .= $this->db->scapeCont($gen_personagem) . "',";
        $stringSQL .= $this->db->scapeCont($pes_personagem) . "," . $this->db->scapeCont($alt_personagem) . ",'";
        $stringSQL .= $this->db->scapeCont($dsc_cabelo_pesonagem) . "','" . $this->db->scapeCont($img_personagem) . "','";
        $stringSQL .= $this->db->scapeCont($cor_olho) . "','" . $this->db->scapeCont($hst_personagem) . "','";
        $stringSQL .= $this->db->scapeCont($inf_adicional_personagem) . "'," . $this->db->scapeCont($cod_alinhamento) . ",";
        $stringSQL .= $this->db->scapeCont('0') . ",";
        $stringSQL .= $this->db->scapeCont('0') . ",";
        $stringSQL .= $this->db->scapeCont($cod_classe) . "," . $this->db->scapeCont($cod_raca) . ",0)";
        //Retorna o ID inserido?
        $personagemID = $this->db->insert($stringSQL);
        //Update na ta_perfil_sala/
        $stringSQL2 = "UPDATE ta_perfil_sala SET cod_personagem = " . $this->db->scapeCont($personagemID);
        $stringSQL2 .= " WHERE cod_usuario = " . $this->db->scapeCont($idt_usuario);
        $stringSQL2 .= " AND cod_sala = " . $sala_id;
        //Update
        $this->db->executeQuery($stringSQL2);
        
        //Insert na tabela culto
        $stringSQL3 = "INSERT INTO ta_culto(cod_divindade, cod_personagem) VALUES(" . $this->db->scapeCont($cod_religiao) . "," . $this->db->scapeCont($personagemID) . ")";
        $this->db->insert($stringSQL3);
        return true;
    }
    
    public function updateCharacter($idt, $name, $race, $alignment, $class, $genre, $eyeColor, $height, $weight, $img, $hist)
    {
        $stringSQL = "UPDATE tb_personagem SET nme_personagem='" . $this->db->scapeCont($name) . "', gen_personagem ='" .
            $this->db->scapeCont($genre) . "', pes_personagem='" . $this->db->scapeCont($weight) . "', alt_personagem='" .
            $this->db->scapeCont($height) . "', img_personagem='" . $this->db->scapeCont($img) . "', cor_olho_personagem='" .
            $this->db->scapeCont($eyeColor) . "', hst_personagem='" . $this->db->scapeCont($hist) . "', cod_alinhamento='" .
            $this->db->scapeCont($alignment) . "', cod_classe='" . $this->db->scapeCont($class) . "', cod_raca='" .
            $this->db->scapeCont($race) . "' WHERE idt_personagem=" . $this->db->scapeCont($idt);
        
        $this->db->executeQuery($stringSQL);
        return true;
        
    }
    
    
    public function deleteCharacter($idtChar, $idtTable)
    {
        $stringSQL = "DELETE FROM tb_personagem WHERE idt_personagem=" . $this->db->scapeCont($idtChar);
        $this->db->executeQuery($stringSQL);
        
        
        return true;
    }
}

?>
