<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Visita_tecnica.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

class Visita_TecnicaController
{
    private $visitaTecnica;
    protected $table = "visita_tecnica";
    protected $db;

    public function __construct()
    {
        $this->visitaTecnica = new VisitaTecnica();
        $this->db = DBConexao::getConexao();  // Adicionando a inicialização da conexão com o banco de dados
    }

    public function cadastroVisita()
    {

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

           
            $email = $_POST['email'];
            $descricao = $_POST['descricao'];
            

            // Preparar os dados para o cadastro
            $dados = [ 

                'email' => $email,
                'descricao' => $descricao,
            ];

            // Chamar o método de cadastro no modelo
            $this->visitaTecnica->cadastrar($dados);
            var_dump($dados);
            
        }
}
    public function listarVisita_Tecnica()
    {
        try {
            $query = "SELECT * FROM {$this->table}";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Erro na inserção: ' . $e->getMessage();
            return null;
        }
    }

    public function obterVisitaPorId($id)
    {
        // Chame o método idVisita do modelo VisitaTecnica
        $visita = $this->visitaTecnica->idVisita($id);

        // Faça o que for necessário com o objeto $visita
        return $visita;
    }


}
