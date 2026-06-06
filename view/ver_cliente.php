<?php
require_once("../model/BancoDeDados.php");

$banco = new BancoDeDados("localhost", "root", "", "xhoppi");
$clientes = $banco->retornarClientes();
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
    <a href="ver_funcionarios.php">Ver Funcionários</a>
    <a href="produtos.php">Ver Produtos</a>
</nav>

<section class="area-clientes">

    <section class="titulo-clientes">
        <h1>Ver Clientes</h1>
        <p>Lista de todos os clientes cadastrados na loja</p>
    </section>

    <section class="card-clientes">

        <section class="filtros-clientes">
            <input type="text" placeholder="Buscar por nome, email ou telefone...">

            <a href="cadastro_cliente.php">
                <button>+ Novo Cliente</button>
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
                    <th>Data Nasc.</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php while($cliente = mysqli_fetch_assoc($clientes)){ ?>
                    <tr>
                        <td><?php echo $cliente['cpf']; ?></td>
                        <td><?php echo $cliente['nome']; ?></td>
                        <td><?php echo $cliente['sobrenome']; ?></td>
                        <td><?php echo $cliente['email']; ?></td>
                        <td><?php echo $cliente['telefone']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($cliente['dataNasc'])); ?></td>
                        <td class="acoes">
                            <button>👁</button>
                            <form action="edit_cliente.php" method="POST">
    <input type="hidden" name="cpfEdit" value="<?php echo $cliente['cpf']; ?>">
    <button type="submit">✎</button>
</form>
                            <button>🗑</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </section>

</section>

</body>
</html>