<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/alerta.php";

    class VisitaTecnica
    {

        protected $db;
        protected $table = "visita_tecnica";

        public function __construct()
        {
            $this->db = DBConexao::getConexao();
        }

        public function cadastrar($dados)
        {
            try {

                $sql = "INSERT INTO {$this->table} (email, descricao, id_servico)
                    VALUES (:email, :descricao, :id_servico)";
                $stmt = $this->db->prepare($sql);
    
               
                $stmt->bindParam(':email', $dados['email']);
                $stmt->bindParam(':descricao', $dados['descricao']);
                $stmt->bindParam(':id_servico', $dados['id_servico']);

                $stmt->execute();
                
                return true;

            } catch (PDOException $e) {
                echo "Erro Ao Cadastrar: " . $e->getMessage();
                return false;
            }   
        }

        public function buscarServico($id_servico)
        {
    
            try {

                $query = "SELECT * FROM {$this->table} WHERE id_visita= :id_visita";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(":id_visita", $id_servico, PDO::PARAM_INT);
                $stmt->execute();
    
                return $stmt->fetch(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo 'Erro na inserção: ' . $e->getMessage();
                return null;
            }
        }
        
    }
?>