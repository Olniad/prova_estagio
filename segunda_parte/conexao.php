<?php
class conexao{
    private $server = "localhost";
    private $bd = "biblioteca";
    private $user = "root";
    private $password = "";
    private $conn = "";

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->server};dbname={$this->bd};charset=utf8;",$this->user,$this->password);
        } catch (PDOException $msg) {
            echo "Não foi possivel conectar com o servidor: ".$msg->getMessage();
        }
    }
    public function getConexao() {
        return $this->conn;
    }

    public function executeQuery($comando)
    {
        try {
            $sql = $this->conn->prepare($comando);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return '1';
            }
            else{

                return "a";
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel executar o comando: ".$msg->getMessage();
        }
    }

    public function executeSelect($comando)
{
    try {
        $sql = $this->conn->prepare($comando);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return array();
        }
    } catch (PDOException $msg) {
        echo "Não foi possível executar o comando: " . $msg->getMessage();
    }
}

}

?>