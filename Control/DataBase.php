<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16/08/17
 * Time: 15:33
 */
class DataBase
{
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->executeQuery("SET NAMES utf8");
    }

    public function disconnect()
    {
        $this->connection->close();
    }

    /**
     * Executa uma query no banco de dados
     *
     * @param string com a query sql
     *
     * @return false ou o resultado da execução da query
     *
     * @access public
     */
    public function executeQuery($query)
    {
        $return = false;
        if (!$return = $this->connection->query($query)) {
            if (DEBUG)
                printf("Errormessage: %s\n%s", $this->connection->error, $query);
            $return = false;
        }
        return $return;
    }

    public function scapeCont($input)
    {
        return $this->connection->escape_string($input);
    }

    public function insert($query)
    {
        $return = false;
        if (!$return = $this->connection->query($query)) {
            if (DEBUG)
                printf("Errormessage: %s\n%s", $this->connection->error, $query);
            $return = false;
        }
        return $this->connection->insert_id;
    }

    /**
     * Executa uma busca no banco de dados
     *
     * @param string com a query sql
     *
     * @return false ou o resultado da execução da query
     *
     * @access public
     */
    public function search($query)
    {
        $return = false;
        if ($query) {
            if (!$resultado = $this->connection->query($query)) {
                if (DEBUG)
                    printf("Errormessage: %s\n%s", $this->connection->error, $query);
                $return = mysql_error();
            } else {
                if ($resultado->num_rows > 0) {
                    $i = 0;
                    while ($temp = $resultado->fetch_assoc()) {
                        $return[$i] = $temp;
                        $i++;
                    }
                } else {
                    $return = false;
                }
            }
        }
        return $return;
    }

}

