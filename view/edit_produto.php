<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/edit_cliente.css">
    <link rel="stylesheet" href="../CSS/rodape.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
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
        <a href="cadastro_cliente.php">Cadastro Cliente </a>
        <a href="cadastro_funcionario.php">Cadastro Funcionário </a>
        <a href="cadastro_produto.php">Cadastro Produto </a>
        <a href="ver_cliente.php">Ver Clientes </a>
        <a href="ver_funcionarios.php">Ver Funcionários </a>
        <a href="produtos.php">Ver Produtos</a>
    </nav>

    <section class="area-container">
        <section class="container">

            <form method="POST" action="../processamento/processamento.php" enctype="multipart/form-data">

                <p id="cadastro_titulo"><b>Editar Produto</b></p>

                <input type="hidden" name="acao" value="editarProduto">

                <?php
                require_once("../controller/controlador.php");

                if(!isset($_POST['idEdit'])){
                    echo "ID do produto não enviado.";
                    exit();
                }

                $controlador = new Controlador();
                $id_prod = $_POST['idEdit'];

                echo $controlador->vizuProdutoPorId($id_prod);
                ?>

                <button type="submit" value="enviar" id="cadastrar">SALVAR</button>

            </form>

        </section>
    </section>

    <footer>
        <section class="container-footer">
            <section>
                <h1 class ="h1-rdp">ATENDIMENTO AO CLIENTE</h1>
                <p class="p-rdp">Central de Ajuda</p>
                <p class="p-rdp">Como Comprar </p>
                <p class="p-rdp">Métodos de pagamento</p>
                <p class="p-rdp">Garantia Xhopii </p>
                <p class="p-rdp">Devolução e Reembolso</p>
                <p class="p-rdp">Fale Conosco</p>
                <p class="p-rdp">Ouvidoria</p>
            </section>

            <section>
                <h1 class ="h1-rdp">SOBRE A XHOPII</h1>
                <p class="p-rdp">Sobre Nós</p>
                <p class="p-rdp">Politicas Xhopii</p>
                <p class="p-rdp">Politica de Privacidade</p>
                <p class="p-rdp">Programa de Aliados Xhopii</p>
                <p class="p-rdp">Seja um Entregador Xhopii</p>
                <p class="p-rdp">Ofertas Relâmpago</p>
                <p class="p-rdp">Xhopii Blog</p>
                <p class="p-rdp">Impresa</p>
            </section>

            <section>
                <h1 class ="h1-rdp">PAGAMENTO</h1>
                <a><img class="imgpg" src="../img/logos.png"></a>
            </section>

            <section>
                <h1 class ="h1-rdp">SIGA-NOS</h1>
                <p class="p-rdp"> <img class="icon" src="../img/insta.png"> Instagram</p>
                <p class="p-rdp"> <img class="icon" src="../img/twiter.png"> Twitter</p>
                <p class="p-rdp"> <img class="icon" src="../img/facebook.png"> Facebook</p>
                <p class="p-rdp"> <img class="icon" src="../img/youtube.avif"> YouTube</p>
                <p class="p-rdp"> <img class="icon" src="../img/linkedin.png"> Linkedin</p>
            </section>

            <section>
                <h1 class ="h1-rdp">ATENDIMENTO AO CLIENTE</h1>
                <p class="p-rdp"> <img class="qr" src="../img/qrcode.webp"></p>
                <p class="p-rdp"> <img class="stre" src="../img/gplogo.png"></p>
                <p class="p-rdp"> <img class="stre" src="../img/applogo.png"></p>
            </section>
            <hr id="hr-rdp">
        </section>
        <p class="p-rdp">© 2023 Xhopii. Todos os direitos acadêmicos reservados</p>
    </footer>

</body>
</html>
