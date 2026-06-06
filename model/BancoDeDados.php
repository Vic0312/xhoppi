<?php
require_once("Produto.php");
require_once("Cliente.php");
require_once("Funcionario.php");
class BancoDeDados{

    private $host; //IP ou localhost
    private $login;
    private $senha;
    private $dataBase;

    public function __construct($Host, $Login, $Senha, $DataBase){
        $this->host = $Host;
        $this->login = $Login;
        $this->senha = $Senha;
        $this->dataBase = $DataBase;
    }

    //Métodos
    public function conectarBD(){

        $conexao = mysqli_connect($this->host,$this->login,$this->senha,$this->dataBase);
        return($conexao);
    }

    public function autenticarFuncionario($email, $senha) {
        $conexao = $this->conectarBD();
        
        $email = mysqli_real_escape_string($conexao, $email);
        $senha = mysqli_real_escape_string($conexao, $senha);

        $consulta = "SELECT * FROM funcionario WHERE email = '$email' AND senha = '$senha'";
        $resultado = mysqli_query($conexao, $consulta);

        if (mysqli_num_rows($resultado) == 1) {
            return mysqli_fetch_assoc($resultado); 
        } else {
            return false;
        }
    }

    public function deletarCliente($cpf){
        $conexao = $this->conectarBD();
        $consulta = "DELETE FROM cliente WHERE cpf = '$cpf'";
        mysqli_query($conexao,$consulta);
    }

    public function deletarFuncionario($cpf){
        $conexao = $this->conectarBD();
        $consulta = "DELETE FROM funcionario WHERE cpf = '$cpf'";
        mysqli_query($conexao,$consulta);
    }
    
    public function inserirCliente($cliente){
        
        $conexao = $this->conectarBD();
        $consulta = "INSERT INTO cliente (cpf, nome, sobrenome, dataNasc, telefone, email, senha, foto_perfil) 
                     VALUES ('{$cliente->get_Cpf()}',
                             '{$cliente->get_Nome()}',
                             '{$cliente->get_Sobrenome()}',
                             '{$cliente->get_DataNasc()}',
                             '{$cliente->get_Telefone()}',
                             '{$cliente->get_Email()}',
                             '{$cliente->get_Senha()}',
                             '{$cliente->get_Foto()}')";
        mysqli_query($conexao,$consulta);
    }
    
    public function inserirProduto($produto){
        
        $conexao = $this->conectarBD();
        $consulta = "INSERT INTO produto (nome, fabricante, descricao, valor, quantidade, foto_prod) 
                     VALUES ('{$produto->get_Nome()}',
                             '{$produto->get_Fabricante()}',
                             '{$produto->get_Descricao()}',
                             '{$produto->get_Valor()}',
                             '{$produto->get_Qtd()}',
                             '{$produto->get_Foto()}')";
        mysqli_query($conexao,$consulta);
    }
    
    public function inserirFuncionario($funcionario){
        
        $conexao = $this->conectarBD();
        $consulta = "INSERT INTO funcionario (cpf, nome, sobrenome, dataNasc, telefone, cargo, salario, email, senha, foto_perfil) 
                     VALUES ('{$funcionario->get_Cpf()}',
                             '{$funcionario->get_Nome()}',
                             '{$funcionario->get_Sobrenome()}',
                             '{$funcionario->get_DataNasc()}',
                             '{$funcionario->get_Telefone()}',
                             '{$funcionario->get_Cargo()}',
                             '{$funcionario->get_Salario()}',
                             '{$funcionario->get_Email()}',
                             '{$funcionario->get_Senha()}',
                             '{$funcionario->get_Foto()}')";
        mysqli_query($conexao,$consulta);
    }
    
    public function retornarClientes(){
    $conexao = $this->conectarBD();
    $consulta = "SELECT * FROM cliente";
    $listaClientes = mysqli_query($conexao,$consulta);
    return $listaClientes;
}

public function retornarFuncionarios(){
    $conexao = $this->conectarBD();
    $consulta = "SELECT * FROM funcionario";
    $listaFuncionario = mysqli_query($conexao,$consulta);
    return $listaFuncionario;
}
    
    public function retornarProdutosHome(){
        $conexao = $this->conectarBD();
        $consulta = "SELECT * FROM produto order by rand() limit 10";
        $listaProdutos = mysqli_query($conexao,$consulta);
        return $listaProdutos;
    }

    public function retornarProdutosEstoque(){
        $conexao = $this->conectarBD();
        $consulta = "SELECT * FROM produto";
        $listaProdutos = mysqli_query($conexao,$consulta);
        return $listaProdutos;
    }

}

?>