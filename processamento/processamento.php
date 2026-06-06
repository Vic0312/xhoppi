<?php

session_start();
require_once("../model/Produto.php");
require_once("../controller/controlador.php");

$controlador = new Controlador();

//Login
if(isset($_POST['inputEmailLog']) && isset($_POST['inputSenhaLog'])){
    $email = $_POST['inputEmailLog'];
    $senha = $_POST['inputSenhaLog'];

    $sucesso = $controlador->efetuarLogin($email, $senha);

    if($sucesso){
        header('Location:../view/home-page.php');
    } else {
        header('Location:../view/login.php?erro=1');
    }
    die();
}

if(isset($_POST['acao'])){

    $acao = $_POST['acao'];

    if($acao == "deletarCliente"){
        $cpf = $_POST['cpf'];
    
        $controlador->deletarCliente($cpf);

        header('Location:../view/ver_cliente.php');
        die();
    }

    else{
        if($acao == "deletarFuncionario"){
            $cpf = $_POST['cpf'];
        
            $controlador->deletarFuncionario($cpf);

            header('Location:../view/ver_funcionarios.php');
            die();
        }
    }
}
//Editar cliente
if(isset($_POST['acao']) && $_POST['acao'] == "editarCliente"){

    $cpfOriginal = $_POST['cpfOriginal'];
    $nome = $_POST['inputNome'];
    $sobrenome = $_POST['inputSobrenome'];
    $cpf = $_POST['inputCPF'];
    $dataNasc = $_POST['inputDataNasc'];
    $telefone = $_POST['inputTelefone'];
    $email = $_POST['inputEmail'];
    $senha = $_POST['inputSenha'];

    $controlador->editarCliente(
        $cpfOriginal,
        $cpf,
        $nome,
        $sobrenome,
        $dataNasc,
        $telefone,
        $email,
        $senha
    );

    header("Location:../view/ver_cliente.php");
    die();

}

//Editar funcionario
if(isset($_POST['acao']) && $_POST['acao'] == "editarFuncionario"){

    $cpfOriginal = $_POST['cpfOriginal'];
    $nome = $_POST['inputNome'];
    $sobrenome = $_POST['inputSobrenome'];
    $cpf = $_POST['inputCPF'];
    $dataNasc = $_POST['inputDataNasc'];
    $telefone = $_POST['inputTelefone'];
    $cargo = $_POST['inputCargo'];
    $salario = $_POST['inputSalario'];
    $email = $_POST['inputEmail'];
    $senha = $_POST['inputSenha'];

    $controlador->editarFuncionario(
        $cpfOriginal,
        $cpf,
        $nome,
        $sobrenome,
        $dataNasc,
        $telefone,
        $cargo,
        $salario,
        $email,
        $senha
    );

    header("Location:../view/ver_funcionarios.php");
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
   !empty($_POST['inputQtdProd']) && isset($_FILES['inputFotoProd'])){

    $nome = $_POST['inputNomeProd'];
    $fabricante = $_POST['inputFabricanteProd'];
    $descricao = $_POST['inputDescricaoProd'];
    $valor = $_POST['inputValorProd'];
    $quantidade = $_POST['inputQtdProd'];

    $foto_prod = "";

    //Upload da imagem
    if($_FILES['inputFotoProd']['error'] == 0){

        $pasta = "../uploads/produtos/";

        //Cria a pasta se não existir
        if(!is_dir($pasta)){
            mkdir($pasta, 0777, true);
        }

        //Nome único para evitar conflito
        $nomeArquivo = uniqid() . "_" . $_FILES['inputFotoProd']['name'];

        $caminhoArquivo = $pasta . $nomeArquivo;

        //Move a imagem para a pasta
        move_uploaded_file($_FILES['inputFotoProd']['tmp_name'], $caminhoArquivo);

        //Caminho salvo no banco
        $foto_prod = "uploads/produtos/" . $nomeArquivo;
    }
    
    $controlador->cadastrarProduto(
        $nome,
        $fabricante,
        $descricao,
        $valor,
        $quantidade,
        $foto_prod
    );

    header('Location:../view/cadastro_produto.php');
    die();
}

$cpfEd = $_POST['cpfEdit'];

$controlador = new Controlador();

$cliente = $controlador->buscarClientePorCpf($cpfEd);

include("edit_cliente.php");




?>