<?php
require_once("../model/BancoDeDados.php");

$banco = new BancoDeDados("localhost", "root", "", "xhoppi");
$funcionarios = $banco->retornarFuncionarios();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/ver_cliente.css">
    <link rel="stylesheet" href="../CSS/rodape.css">
    <title>Ver Clientes</title>
</head>
<body>

<header>
    <section class="cabecalho-logo">
        <img src="../img/logo.png">
        <p>Xhopii</p>
    </section>
    <a href="logout.php" id="sair">Sair</a>
</header>

<nav>
    <a href="home-page.php">Home</a>
    <a href="cadastro_cliente.php">Cadastro Cliente</a>
    <a href="cadastro_funcionario.php">Cadastro Funcionário</a>
    <a href="cadastro_produto.php">Cadastro Produto</a>
    <a href="ver_cliente.php">Ver Clientes</a>
    <a href="#">Ver Funcionários</a>
    <a href="produtos.php">Ver Produtos</a>
</nav>

<section class="area-clientes">

    <section class="titulo-clientes">
        <h1>Ver Funcionário</h1>
        <p>Lista de todos os funcionários cadastrados na loja</p>
    </section>

    <section class="card-clientes">

        <section class="filtros-clientes">
            <input type="text" placeholder="Buscar por nome, email ou telefone...">

            <a href="cadastro_funcionario.php">
                <button>+ Novo funcionario</button>
            </a>
        </section>

        <table>
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Cargo</th>
                    <th>Salario</th>
                    <th>Data Nasc.</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php while($funcionario = mysqli_fetch_assoc($funcionarios)){ ?>
                    <tr>
                        <td><?php echo $funcionario['cpf']; ?></td>
                        <td><?php echo $funcionario['nome']; ?></td>
                        <td><?php echo $funcionario['sobrenome']; ?></td>
                        <td><?php echo $funcionario['email']; ?></td>
                        <td><?php echo $funcionario['telefone']; ?></td>
                        <td><?php echo $funcionario['cargo']; ?></td>
                        <td><?php echo $funcionario['salario']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($funcionario['dataNasc'])); ?></td>
                        <td class="acoes">
                            <button>👁</button>
                            <form action="edit_funcionario.php" method="POST">
                                <input type="hidden" name="cpfEdit" value='<?php echo $funcionario['cpf']; ?>'>
                                <button type="submit" name="acao" value="deletarFuncionario">✎</button>
                            </form>

                            <form action="../processamento/processamento.php" method="POST">
                                <input type="hidden" name="cpf" value='<?php echo $funcionario['cpf']; ?>'>
                                <button type="submit" name="acao" value="deletarFuncionario" onclick="return confirm('Tem certeza que deseja excluir este funcionário?')">🗑</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </section>

</section>

</body>
</html>