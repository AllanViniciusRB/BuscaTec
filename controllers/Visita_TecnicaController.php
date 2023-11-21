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

    
    public function idVisita($id)
    {
        try {
            $query = "SELECT * FROM {$this->table} WHERE id_visita = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Erro na consulta: ' . $e->getMessage();
            return null;
        }

        $id_servico = isset($_GET['id']) ? $_GET['id'] : null;

        if (!$id_servico) {
            // Se o ID não estiver presente, redirecione ou mostre uma mensagem de erro
            header("Location: /admin/includes/alerta.php");
            exit();
        }

        // Recupere a descrição do problema da URL
        $descricao_problema = isset($_GET['descricao']) ? $_GET['descricao'] : 'Descrição não disponível';

        $AgendamentoController = new Visita_TecnicaController();
        $servico = $AgendamentoController->idVisita($id_servico);

        if (!$servico) {
            // Se o serviço com o ID especificado não for encontrado, redirecione ou mostre uma mensagem de erro
            header("Location: /admin/includes/alerta.php");
            exit();
        }
    }
}
