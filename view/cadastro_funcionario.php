<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/cadastro_funcionario.css">
        <link rel="stylesheet" href="../CSS/rodape.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Funcionário</title>
    </head>
    <body>
        <header>
            <section class="cabecalho-logo">
                <img src="../img/logo.png">
                <p>Xhopii</p>
            </section>
            <a href="login.html" id="sair">Sair</a>
        </header>

        <nav>
            <a href="home-page.php">Home</a>
            <a href="cadastro_cliente.php">Cadastro Cliente </a>
            <a href="cadastro_funcionario.php">Cadastro Funcionário </a>
            <a href="cadastro_produto.php">Cadastro Produto </a>
            <a href="#">Ver Clientes </a>
            <a href="#">Ver Funcionários </a>
            <a href="produtos.php">Ver Produtos</a>
        </nav>


        <section class="area-container">
        <section class="container">
            <form method="POST" action="../processamento/processamento.php">
                <p id="cadastro_titulo"><b>Cadastrar Funcionário</b></p>

                <input type="text" id="nome" placeholder="Nome" name="inputNomeFunc" >

                <input type="text" id="sobrenome" placeholder="Sobrenome" name="inputSobrenomeFunc" >

                <input type="text" id="cpf" placeholder="CPF" name="inputCPFFunc" >

                <input type="date" id="data_nasc" name="inputDataNascFunc" >

                <input type="tel" id="tel" placeholder="Telefone" name="inputTelefoneFunc" >

                <input type="text" id="cargo" placeholder="Cargo/Função" name="inputCargoFunc" >

                <input type="number" id="salario" placeholder="Salário" name="inputSalarioFunc" >

                <input type="email" id="email" placeholder="Email" name="inputEmailFunc" >

                <input type="password" id="senha" placeholder="Senha" name="inputSenhaFunc" >

                <p id="selecionar"><b>Selecionar foto de perfil:</b></p>

                <label class="upload-container">
                    <span class="botao">Escolher arquivo</span>
                    <span id="nome-arquivo">Nenhum arquivo escolhido</span>
                    <input type="file" name="inputFoto" id="arquivo">
                </label>

                <a href="home-page.php"><button type="submit" value="enviar" id="cadastrar">CADASTRAR</button></a>
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
</htlm>