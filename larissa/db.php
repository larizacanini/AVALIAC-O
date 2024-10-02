<?php
class Database{
    private $pdo;
    private $host;
    private $db;
    private $user;
    private $pass;
    
    public function __construct($host, $db, $user, $pass, $port = 3307){
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
        $this->port = $port;
    }

    public function connect(){ //realiza conexão com o banco de dados (08:25)
        try{
            $this->pdo = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->db};charset=utf8", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //em caso de erro (08:31)

            echo '<p class="connection-message">Conexão com o banco de dados realizada!</p>'; //exibição em caso de sucesso (08:33)
         } catch (PDOException $e) {
    echo"Erro na conexão com o banco de dados: " . $e->getMessage() . "<br>"; //exibição em caso de erro (08:35)
         }
    }
public function getConnection() {
    return $this->pdo;
    }
}
?>