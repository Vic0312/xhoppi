<?php

session_start();
require_once("../model/Produto.php");
require_once("../controller/controlador.php");

$controlador = new Controlador();

//Login
if(isset($_POST['inputEmailLog']) && isset($_POST['inputSenhaLog'])){

    $_SESSION['estaLogado'] = TRUE;
    $email = $_POST['inputEmailLog'];
    $senha = $_POST['inputSenhaLog'];

    //echo "Email: " . $email . "Senha: " . $senha;
    header('Location:../view/home.php');
    die();
}

//Cadastro de Cliente
if(isset($_POST['inputNome']) && isset($_POST['inputSobrenome']) && 
   isset($_POST['inputCPF']) && isset($_POST['inputDataNasc']) && 
   isset($_POST['inputTelefone']) && isset($_POST['inputEmail']) &&
   isset($_POST['inputSenha'])){

    $nome = $_POST['inputNome'];
    $sobrenome = $_POST['inputSobrenome'];
    $cpf = $_POST['inputCPF'];
    $dataNasc = $_POST['inputDataNasc'];
    $telefone = $_POST['inputTelefone'];
    $email = $_POST['inputEmail'];
    $senha = $_POST['inputSenha'];
    $foto_perfil = $_POST['inputFoto'];
    
    $controlador->cadastrarCliente($cpf, $nome, $sobrenome, $dataNasc, $telefone, $email, $senha, $foto_perfil);

    header('Location:../view/cadastro_cliente.php');
    die();
}

//Cadastro de Funcionário
if(isset($_POST['inputNomeFunc']) && isset($_POST['inputSobrenomeFunc']) && 
   isset($_POST['inputCPFFunc']) && isset($_POST['inputDataNascFunc']) && 
   isset($_POST['inputTelefoneFunc']) && isset($_POST['inputCargoFunc']) &&
   isset($_POST['inputSalarioFunc']) && isset($_POST['inputEmailFunc']) &&
    isset($_POST['inputSenhaFunc'])){

    $nome = $_POST['inputNomeFunc'];
    $sobrenome = $_POST['inputSobrenomeFunc'];
    $cpf = $_POST['inputCPFFunc'];
    $dataNasc = $_POST['inputDataNascFunc'];
    $telefone = $_POST['inputTelefoneFunc'];
    $cargo = $_POST['inputCargoFunc'];
    $salario = $_POST['inputSalarioFunc'];
    $email = $_POST['inputEmailFunc'];
    $senha = $_POST['inputSenhaFunc'];
    $foto_perfil = $_POST['inputFoto'];
    
    $controlador->cadastrarFuncionario($cpf, $nome, $sobrenome, $dataNasc, $telefone, $cargo, $salario, $email, $senha, $foto_perfil);

    header('Location:../view/cadastro_funcionario.php');
    die();
}

//Cadastro de Produto
if(!empty($_POST['inputNomeProd']) && !empty($_POST['inputFabricanteProd']) && 
   !empty($_POST['inputDescricaoProd']) && !empty($_POST['inputValorProd']) &&
   !empty($_POST['inputQtdProd'])){

    $nome = $_POST['inputNomeProd'];
    $fabricante = $_POST['inputFabricanteProd'];
    $descricao = $_POST['inputDescricaoProd'];
    $valor = $_POST['inputValorProd'];
    $quantidade = $_POST['inputQtdProd'];
    $foto_prod = $_POST['inputFotoProd'];
    
    $controlador->cadastrarProduto($nome,$fabricante,$descricao,$valor,$quantidade,$foto_prod);

    header('Location:../view/cadastro_produto.php');
    die();
}



?>