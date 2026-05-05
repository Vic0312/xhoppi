<?php

require_once("../model/BancoDeDados.php");

class Controlador{

    //Atributo
    private $bancoDeDados;

    function __construct(){
        $this->bancoDeDados = new BancoDeDados("localhost","root","","xhoppi");
    }

    public function cadastrarProduto($nome, $fabricante, $descricao, $valor, $quantidade, $foto_prod){
        
        $produto = new Produto($nome,$fabricante,$descricao,$valor,$quantidade,$foto_prod);
        $this->bancoDeDados->inserirProduto($produto);
        
    }

    public function cadastrarFuncionario($cpf, $nome, $sobrenome, $dataNasc, $telefone, $cargo, $salario, $email, $senha, $foto_perfil){
        
        $funcionario = new Funcionario($cpf, $nome, $sobrenome, $dataNasc, $telefone, $cargo, $salario, $email, $senha, $foto_perfil);
        $this->bancoDeDados->inserirFuncionario($funcionario);
        
    }

    public function cadastrarCliente($cpf, $nome, $sobrenome, $dataNasc, $telefone, $email, $senha, $foto_perfil){
        
        $cliente = new Cliente($cpf, $nome, $sobrenome, $dataNasc, $telefone, $email, $senha, $foto_perfil);
        $this->bancoDeDados->inserirCliente($cliente);
        
    }

    public function visualizarProdutos(){
        
        $listaProdutos = $this->bancoDeDados->retornarProdutos();
        while($produto = mysqli_fetch_assoc($listaProdutos)){
            return "<section class=\"conteudo-bloco\">" .
                   "<h2>" . $produto["nome"] . "</h2>" .
                   "<p>Fabricante: " . $produto["fabricante"] . "</p>" .
                   "<p>Descrição: " . $produto["descricao"] . "</p>" . 
                   "<p>Valor: " . $produto["valor"] . "</p>" .
                   "<p>Quantidade: " . $produto["quantidade"] . "</p>" .
                   "<p>Foto produto: " . $produto["foto_prod"] . "</p>" .
                   "</section>";
        }
    }

}

?>