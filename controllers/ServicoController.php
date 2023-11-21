<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Servico.php";
    
    class ServicoController{

        private $servicoModel;

        public function __construct()
        {
            $this->servicoModel = new Servico();
        }

        public function cadastroServico()
        {

            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $dia = $_POST['dia'];
                $hora = $_POST['hora'];
                $informacoes = $_POST['informacoes'];
                $valor = $_POST['valor'];
        
                // Preparar os dados para o cadastro
                $dados = [
                    'dia' => $dia,
                    'hora' => $hora,
                    'informacoes' => $informacoes,
                    'valor' => $valor
                ];
        
                // Chamar o método de cadastro no modelo
                $this->servicoModel->cadastrar($dados);
                var_dump($dados);
            }
        }
    }
?>