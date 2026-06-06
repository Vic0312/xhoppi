<?php

require_once("../model/BancoDeDados.php");

class Controlador{

    //Atributo
    private $bancoDeDados;

    function __construct(){
        $this->bancoDeDados = new BancoDeDados("localhost","root","","xhoppi");
    }

    public function efetuarLogin($email, $senha) {
        $dadosFuncionario = $this->bancoDeDados->autenticarFuncionario($email, $senha);
        
        if ($dadosFuncionario) {
            $_SESSION['estaLogado'] = true;
            $_SESSION['usuario_id'] = $dadosFuncionario['cpf'];
            $_SESSION['usuario_nome'] = $dadosFuncionario['nome'];
            return true;
        } else {
            $_SESSION['estaLogado'] = false;
            return false;
        }
    }

    public function deletarCliente($cpf){

        $this->bancoDeDados->deletarCliente($cpf);

    }

    public function deletarFuncionario($cpf)
    {
        $this->bancoDeDados->deletarFuncionario($cpf);
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

    public function visualizarProdutosHome(){

        $listaProdutos = $this->bancoDeDados->retornarProdutosHome();
        $txt = "";
    
        while($produto = mysqli_fetch_assoc($listaProdutos)){
    
            $txt .= "<a class='pLink' href='produto.php'> 
                     
                     <section class='camisavt'>" .
    
                    "<img class='vtr' src='../". $produto['foto_prod']. "'>" .
    
                    "<p id='p-hm'>" . $produto['nome'] . "</p>" .
    
                    "<p id='p-preco'>R$ " . $produto['valor'] .
    
                    " <text id='qtd'>" . $produto['quantidade'] . " Disponíveis 
                    
                    </text> </p>" .
    
                    "</section> </a>";
        }
    
        return $txt;
    }

    public function visualizarProdutosEstoque(){

        $listaProdutos = $this->bancoDeDados->retornarProdutosEstoque();
        $txt = "";
    
        while($produto = mysqli_fetch_assoc($listaProdutos)){
    
            $txt .= "<section class='camisavt'>" .
    
                    "<img class='vtr' src='../". $produto['foto_prod']. "'>" .
    
                    "<p id='p-hm'>" . $produto['nome'] . "</p>" .

                    "<p><b>Fabricante: </b> <txt id='fabd'>". $produto['fabricante']."</txt>" .
                    
                    "<p> <section class='descricao'><b>Descrição: </b><txt id='dscrc'>". $produto['descricao']. "</txt> </section> </p>" .
    
                    "<p id='p-preco'>R$ " . $produto['valor'] .
    
                    " <text id='qtd'>" . $produto['quantidade'] . " Disponíveis 
                    
                    </text> </p>" .
    
                    "</section> </a>";
        }

    
        return $txt;
    }


}

?>