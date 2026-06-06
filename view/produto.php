<?php
require_once("../model/BancoDeDados.php");

$banco = new BancoDeDados("localhost", "root", "", "xhoppi");
$produtos = $banco->retornarProdutosEstoque();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/ver_cliente.css">
    <link rel="stylesheet" href="../CSS/rodape.css">
    <title>Ver Produtos</title>
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
        <h1>Ver Produtos</h1>
        <p>Lista de todos os produtos cadastrados na loja</p>
    </section>

    <section class="card-clientes">

        <section class="filtros-clientes">
            <input type="text" placeholder="Buscar por id, nome ou descrição...">

            <a href="cadastro_produto.php">
                <button>+ Novo Produto</button>
            </a>
        </section>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Fabricante</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Foto</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php while($produto = mysqli_fetch_assoc($produtos)){ ?>
                    <tr>
                        <td><?php echo $produto['id_prod']; ?></td>
                        <td><?php echo $produto['nome']; ?></td>
                        <td><?php echo $produto['fabricante']; ?></td>
                        <td><?php echo $produto['descricao']; ?></td>
                        <td>R$ <?php echo number_format($produto['valor'], 2, ',', '.'); ?></td>
                        <td><?php echo $produto['quantidade']; ?></td>

                        <td>
                            <?php if(!empty($produto['foto_prod'])){ ?>
                                <img 
                                    src="../<?php echo $produto['foto_prod']; ?>" 
                                    alt="Foto do produto" 
                                    width="60"
                                    height="60"
                                    style="object-fit: cover; border-radius: 4px;"
                                >
                            <?php } else { ?>
                                <span>Sem foto</span>
                            <?php } ?>
                        </td>

                        <td class="acoes">
                            <button type="button">👁</button>

                            <form action="edit_produto.php" method="POST">
                                <input type="hidden" name="idEdit" value="<?php echo $produto['id_prod']; ?>">
                                <button type="submit">✎</button>
                            </form>

                            <form action="../processamento/processamento.php" method="POST">
                                <input type="hidden" name="id_prod" value="<?php echo $produto['id_prod']; ?>">
                                <button 
                                    type="submit" 
                                    name="acao" 
                                    value="deletarProduto" 
                                    onclick="return confirm('Tem certeza que deseja deletar este produto?');"
                                >
                                    🗑
                                </button>
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
