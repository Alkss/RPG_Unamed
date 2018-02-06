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
    
    public function createUserADM($name,$login,$email,$password,$userType,$active){
        if ($this->checkIfExistsByEmail($email)) {
            return "O email já existe";
        }
        else if ($this->checkIfExistsByLogin($login)) {
            return "O nome de usuário já existe";
        } else {
            $md5Password = md5($password);
        
            $stringSQL = "INSERT INTO `tb_usuario`(`nme_usuario`,`lgn_usuario`,`pwd_usuario`,`eml_usuario`,`cod_perfil`,`atv_usuario`)
                          VALUES('" . $this->db->scapeCont($name) . "','" . $this->db->scapeCont($login) . "','" . $this->db->scapeCont($md5Password) . "','" . $this->db->scapeCont($email) . "',".$this->db->scapeCont($userType).",".$this->db->scapeCont($active).");";
        $this->db->executeQuery($stringSQL);
            return true;
        }
    }
    
    
    public function createUser($name, $login, $email, $password)
    {
        if ($this->checkIfExistsByEmail($email)) {
            return "O email já existe";
        }
        else if ($this->checkIfExistsByLogin($login)) {
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
            
            $stringSQL = "SELECT nme_usuario, lgn_usuario, pwd_usuario, atv_usuario, cod_perfil FROM `tb_usuario` WHERE lgn_usuario = '" . $login . "' AND pwd_usuario = '" . $md5Password . "'";
            $sql = $this->db->search($stringSQL);
            if (($login == $sql[0]['lgn_usuario']) && ($sql[0]['pwd_usuario'] == $md5Password) && ($sql[0]['atv_usuario'] == 1)) {
                $_SESSION['logado'] = 1;
                $_SESSION['nme_usuario'] = $sql[0]['nme_usuario'];
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
    
    public function verUsuarios($where = "")
    {
        if ($where != "") {
            $where = " where $where";
        }
        $sql = "select * from tb_usuario $where ";
        
        return $this->db->search($sql);
    }
    
    public function updateUser($id, $nome, $email, $login, $senha, $perfil, $ativo)
    {
        $sql = "update tb_usuario set nome = '" . $this->db->scapeCont($nome) . "',"
            . "email = '" . $this->db->scapeCont($email) . "',"
            . "login = '" . $this->db->scapeCont($login) . "',"
            . "senha = '" . $this->db->scapeCont(MD5($senha)) . "',"
            . "perfil = '" . $this->db->scapeCont($perfil) . "',"
            . "ativo = '" . $this->db->scapeCont($ativo) . "' where id = '" . $this->db->scapeCont($id) . "'";
        return $this->db->executaQuery($sql);
    }
    
    public function alterarPerfil($id, $nome, $email, $senha)
    {
        $sql = "update tb_usuario set nome = '" . $this->db->scapeCont($nome) . "',"
            . "email = '" . $this->db->scapeCont($email) . "',"
            . "senha = '" . $this->db->scapeCont(MD5($senha)) . "' where id = '" . $this->db->scapeCont($id) . "'";
        return $this->db->executaQuery($sql);
    }
    
    public function inserirUsuario($nome, $email, $login, $senha, $perfil, $ativo)
    {
        $sql = "insert into tb_usuario(nome, email, login, senha, perfil, ativo) values "
            . "('" . $this->db->scapeCont($nome) . "','" . $this->db->scapeCont($email) . "','" . $this->db->scapeCont($login) . "','" . $this->db->scapeCont
            (md5($senha)) . "','" . $this->db->scapeCont($perfil) . "','" . $this->db->scapeCont($ativo) . "')";
        return $this->db->insere($sql);
    }
    
    
}