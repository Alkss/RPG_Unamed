<?php
class Character{

    function __construct()
     {
        $this->db = new DataBase();
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
    public function createCharacter_pt1($nme_personagem,$exp_personagem,
                                        $gen_personagem,$cod_religiao,
                                        $pes_personagem,$alt_personagem,
                                        $dsc_cabelo_pesonagem,$cor_olho,
                                        $img_personagem,$hst_personagem,
                                        $inf_adicional_personagem,$cod_alinhamento,
                                        $cod_classe, $cod_raca){
        $idt_usuario = $_SESSION["idt_usuario"];
        if(isset($_GET["idt_sala"])){
            $sala_id = $_GET["idt_sala"];
        } else{
            $sala_id = 1;
            //header("location:index.php");
        }
        //Insert na tb_personagem
        $stringSQL = "INSERT INTO tb_personagem(";
        $stringSQL .= "nme_personagem,exp_personagem,gen_personagem,";
        $stringSQL .= "pes_personagem,alt_personagem,";
        $stringSQL .= "dsc_cabelo_personagem,cor_olho_personagem,img_personagem,";
        $stringSQL .= "hst_personagem,inf_adicional_personagem,cod_alinhamento,";
        $stringSQL .= "cod_classe,cod_raca,qtd_dinheiro_personagem) VALUES ('";
        $stringSQL .= $this->db->scapeCont($nme_personagem) . "'," . $this->db->scapeCont($exp_personagem) . ",'";
        $stringSQL .= $this->db->scapeCont($gen_personagem) . "',";
        $stringSQL .= $this->db->scapeCont($pes_personagem) . "," . $this->db->scapeCont($alt_personagem) . ",'";
        $stringSQL .= $this->db->scapeCont($dsc_cabelo_pesonagem) . "','" . $this->db->scapeCont($cor_olho) . "','";
        $stringSQL .= $this->db->scapeCont($img_personagem) . "','" . $this->db->scapeCont($hst_personagem) . "','";
        $stringSQL .= $this->db->scapeCont($inf_adicional_personagem) . "'," . $this->db->scapeCont($cod_alinhamento)  . ",";
        $stringSQL .= $this->db->scapeCont($cod_classe) . "," . $this->db->scapeCont($cod_raca) . ",0)";
        
        //Retorna o ID inserido?
        $personagemID = $this->db->insert($stringSQL);

        //Update na ta_perfil_sala/
        $stringSQL2 = "UPDATE ta_perfil_sala SET cod_personagem = " . $this->db->scapeCont($personagemID);
        $stringSQL2 .= " WHERE cod_usuario = " . $this->db->scapeCont($idt_usuario);
        $stringSQL2 .= " AND cod_sala = " . $sala_id;
        //Update
        $this->db->executeQuery($stringSQL2);
        echo $personagemID . " " . $idt_usuario . " " . $sala_id;
        return true;
    }

    }
?>
