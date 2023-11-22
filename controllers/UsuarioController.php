<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";

class UsuarioController
{
    private $usuarioModel;
    private $db;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();

    }

    public function listarUsuarios()
    {
        return $this->usuarioModel->listar();
    }

    public function cadastrarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $cep = $_POST['cep'];
            $rua = $_POST['rua'];
            $numerocasa = $_POST['numerocasa'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
           
 
   
 
            // Preparar os dados para o cadastro
            $dados = [
                'nome' => $nome,
                'senha' => $senha,
                'cpf' => $cpf,
                'email' => $email,
                'telefone' => $telefone,
                'cep' => $cep,
                'rua' => $rua,
                'numerocasa' => $numerocasa,
                'cidade' => $cidade,
                'estado' => $estado
           
            ];
 
            // Chamar o método de cadastro no modelo
            $this->usuarioModel->cadastrar($dados);
            exit;
        }
    }

    private function usuarioJaCadastrado($email, $cpf)
    {

        $conn = DBConexao::getConexao();

        $query = "SELECT * FROM usuario WHERE email = :email OR cpf = :cpf";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        $userExists = $stmt->rowCount() > 0;

        if ($userExists) {
            echo "Usuário já cadastrado!";
        } else {
            echo "Usuário não cadastrado ainda.";
        }

        return $userExists;
    }

    public function loginUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
    
            if (empty($email) || empty($senha)) {
                // Exibir uma mensagem de erro ou redirecionar para a página de login com uma mensagem de erro
                header("Location: login.php?error=E-mail e senha são obrigatórios");
                exit();
            } else {
                // Autenticar o usuário
                $usuario = Usuario::autenticarLogin($email, $senha);
    
                if ($usuario) {
                    // Iniciar a sessão e armazenar o ID do usuário
                    session_start();
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
    
                    // Redirecionar para a página de início
                    header("Location: admin/Infos/planos.php");
                    exit();
                } else {
                    // Exibir uma mensagem de erro ou redirecionar para a página de login com uma mensagem de erro
                    header("Location: index.php?error=E-mail ou senha inválidos");
                    exit();
                }
            }
        }
    }
    public static function autenticarLogin($email, $senha)
    {
        try {
            $query = "SELECT id_usuario, email, senha FROM usuario WHERE email = :email";
            $conexao = DBConexao::getConexao();

            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($senha, $usuario["senha"])) {
                    return $usuario;
                } else {
                    return false; // Senha incorreta
                }
            } else {
                return false; // Usuário não encontrado
            }
        } catch (PDOException $e) {
            echo "Erro na autenticação: " . $e->getMessage();
            return false;
        }
    }


    public function usuarioLogado()
    {
        session_start();
        if (isset($_SESSION['id_usuario'])) {
            $idUsuario = $_SESSION['id_usuario'];
            $usuario = $this->usuarioModel->buscaId($idUsuario);

            if ($usuario) {
                return $usuario;
            }
        }

        return null;
    }

    public function getUsuario()
    {
        session_start();
        if (isset($_SESSION['id_usuario'])) {
            $idUsuario = $_SESSION['id_usuario'];
            $usuario = $this->usuarioModel->buscaId($idUsuario);

            if ($usuario) {
                return $usuario->id_usuario;
            }
        }
    }

    public function getInformacoesPerfil()
    {
        if ($this->usuarioLogado()) {
            $idUsuarioLogado = $_SESSION['id_usuario'];

            $sql = "SELECT nome, email, cpf, telefone FROM usuario WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_usuario', $idUsuarioLogado, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function excluirUsuario()
    {
      
        $this->usuarioModel->excluir($_GET['id_usuario']);
        header('Location:/admin/admin/admnistrativo.php');
        exit;
    }

    public function editarUsuario()
    {
        $id_usuario = $_GET['id_usuario'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['senha']) && !empty($_POST['senha'])) {
                $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            } else {
                $usuario = $this->usuarioModel->buscar($id_usuario);
                $senha = $usuario->senha;
            }
 
            $dados = [
                'nome' => $_POST['nome'],
                'senha' => $senha,
                'cpf' => $_POST['cpf'],
                'email' => $_POST['email'],
                'telefone' => $_POST['telefone'],
                'cep' => $_POST['cep'],
                'rua' => $_POST['rua'],
                'numerocasa' => $_POST['numerocasa'],
                'cidade' => $_POST['cidade'],
                'estado' => $_POST['estado'],
                'perfil'=> $_POST['perfil']
            ];
 
            $this->usuarioModel->editar($id_usuario, $dados);
 
            header('Location: /admin/admin/admnistrativo.php');
            exit;
        }

        return $this->usuarioModel->buscar($id_usuario);
    }
    public function buscarUsuario($id){

        return $this->usuarioModel->buscar($id);

    }
}

?>