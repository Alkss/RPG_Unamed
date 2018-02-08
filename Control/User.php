<?php


/**
 * Created by PhpStorm.
 * User: Alex.Oliveira
 * Date: 13/07/2017
 * Time: 10:31
 */
class User
{
    
    function __construct()
    {
        $this->db = new DataBase();
    }
    
    public function createUserADM($name, $login, $email, $password, $userType, $active)
    {
        if ($this->checkIfExistsByEmail($email)) {
            return "O email já existe";
        } else if ($this->checkIfExistsByLogin($login)) {
            return "O nome de usuário já existe";
        } else {
            $md5Password = md5($password);
            
            $stringSQL = "INSERT INTO `tb_usuario`(`nme_usuario`,`lgn_usuario`,`pwd_usuario`,`eml_usuario`,`cod_perfil`,`atv_usuario`)
                          VALUES('" . $this->db->scapeCont($name) . "','" . $this->db->scapeCont($login) . "','" . $this->db->scapeCont($md5Password) . "','" . $this->db->scapeCont($email) . "'," . $this->db->scapeCont($userType) . "," . $this->db->scapeCont($active) . ");";
            $this->db->executeQuery($stringSQL);
            return true;
        }
    }
    
    
    public function createUser($name, $login, $email, $password)
    {
        if ($this->checkIfExistsByEmail($email)) {
            return "O email já existe";
        } else if ($this->checkIfExistsByLogin($login)) {
            return "O nome de usuário já existe";
        } else {
            $md5Password = md5($password);
            
            $stringSQL = "INSERT INTO `tb_usuario`(`nme_usuario`,`lgn_usuario`,`pwd_usuario`,`eml_usuario`,`cod_perfil`,`atv_usuario`)
                          VALUES('" . $this->db->scapeCont($name) . "','" . $this->db->scapeCont($login) . "','" . $this->db->scapeCont($md5Password) . "','" . $this->db->scapeCont($email) . "',2,0);";
            $this->db->executeQuery($stringSQL);
            return true;
        }
        
    }
    
    public function login($login, $password)
    {
        if ($this->checkIfExistsByLogin($login)) {
            $md5Password = md5($password);
            $login = $this->db->scapeCont($login);
            
            $stringSQL = "SELECT nme_usuario, lgn_usuario, pwd_usuario, atv_usuario, cod_perfil, idt_usuario FROM `tb_usuario` WHERE lgn_usuario = '" . $login . "' AND pwd_usuario = '" . $md5Password . "'";
            $sql = $this->db->search($stringSQL);
            if (($login == $sql[0]['lgn_usuario']) && ($sql[0]['pwd_usuario'] == $md5Password) && ($sql[0]['atv_usuario'] == 1)) {
                $_SESSION['logado'] = 1;
                $_SESSION['nme_usuario'] = $sql[0]['nme_usuario'];
                $_SESSION['idt_usuario'] = $sql[0]['idt_usuario'];
                
                if ($sql[0]['cod_perfil'] == 1) {
                    $_SESSION['permissoes'] = "adm";
                } else {
                    $_SESSION['permissoes'] = "usr";
                }
                return $_SESSION['permissoes'];
            } else {
                return "Login ou Senha incorretos . Por favor tente novamente . ";
            }
            
        } else {
            return "O login não existe";
        }
        
    }
    
    public function checkIfExistsByEmail($email)
    {
        $stringSQL = "SELECT * FROM `tb_usuario` WHERE eml_usuario = '" . $this->db->scapeCont($email) . "' ";
        $sql = $this->db->search($stringSQL);
        if ($sql) {
            return true;
        }
        return false;
        
    }
    
    public function checkIfExistsByLogin($login)
    {
        $stringSQL = "SELECT * FROM `tb_usuario` WHERE lgn_usuario = '" . $this->db->scapeCont($login) . "' ";
        $sql = $this->db->search($stringSQL);
        if ($sql) {
            return true;
        }
        return false;
        
    }
    
    public function updateUser($id, $name, $email, $login, $password, $perfil, $active)
    {
        $sql = "update tb_usuario set nme_usuario = '" . $this->db->scapeCont($name) . "',"
            . "lgn_usuario = '" . $this->db->scapeCont($login) . "',"
            . "pwd_usuario = '" . $this->db->scapeCont($password) . "',"
            . "eml_usuario = '" . $this->db->scapeCont($email) . "',"
            . "cod_perfil = '" . $this->db->scapeCont($perfil) . "',"
            . "atv_usuario = '" . $this->db->scapeCont($active) . "' "
            . " where idt_usuario = " . $this->db->scapeCont($id);
        return $this->db->executeQuery($sql);
    }
    
}