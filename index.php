<!---
CRIADO: JORGE ASSUNÇÃO NETO
DATA:20/07/2024
-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Userpagestyle.css">
    <!--Link dos icones-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Garagem tech landing page</title>
</head>
<body>
    <!--Barra de navegação-->
    <header>
        <!--container barra de NAV-->
            <div class="nav container">
                <!--icone menu-->
                <i class='bx bx-menu' id="menu-icon"></i>
                <!--logo-->
                <a href="#" class="logo"><span>Garagem</span>Tech</a>
                <ul class="navbar">
                    <li><a href="#home" class="active">home</a></li>
                    <li><a href="#cars">Peças de Carros</a></li>
                    <li><a href="#servicos">Serviços</a></li>
                    <li><a href="admin/admin.php">Adiministrador</a></li>
                </ul>
                <!--icone lupa-->
                <i class='bx bx-search' id="search-icon"></i>
                <!--barra de pesquisa-->
                <div class="search-box container">
                    <input type="search" name="" id="search-icon" placeholder="pesquise aqui">
                </div>
            </div>
    </header>
    <!--HOME-->
    <section class="home" id="home">
        <div class="home-text">
            <h1>Os melhores serviços <br> para o seu <span>Carro</span></h1>
            <p>Cuide do seu carro<br>com a nossa equipe de profissionais.</p>
            <!--Botão home-->
            <a href="#" class="btn">Descubra agora</a>
        </div>
    </section>
    <!--Sessão de Carros e peças-->
    <section class="cars" id="cars">
        <div class="heading">
            <span>Todos os carros</span>
            <h2>Peças para todos os tipos de carro</h2>
            <p>Encontre peças automotivas de alta qualidade para qualquer modelo de carro.</p>
        </div>
        <!--Container do carro-->
        <div class="cars-container container">
            <!--Carro 1-->
            <div class="box">
                <img src="img/car1.jpg" alt="">
                <a href="#parts" class="button-link">
                    <h2>Ver peças</h2>
                </a>
            </div>
            <!--Carro 2-->
            <div class="box">
                <img src="img/car2.jpg" alt="">
                <a href="#parts" class="button-link">
                    <h2>Ver peças</h2>
                </a>
            </div>
            <!--Carro 3-->
            <div class="box">
                <img src="img/car3.jpg" alt="">
                <a href="#parts" class="button-link">
                    <h2>Ver peças</h2>
                </a>
            </div>
            <!--Carro 4-->
            <div class="box">
                <img src="img/car4.jpg" alt="">
                <a href="#parts" class="button-link">
                    <h2>Ver peças</h2>
                </a>
            </div>
            <!--Carro 5-->
            <div class="box">
                <img src="img/car5.jpg" alt="">
                <a href="#parts" class="button-link">
                    <h2>Ver peças</h2>
                </a>
            </div>
            <!--Carro 6-->
            <div class="box">
                <img src="img/car6.jpg" alt="">
                <a href="#parts" class="button-link">
                    <h2>Ver peças</h2>
                </a>
            </div>
        </div>   
    </section>
    <!--parte das peças-->
    <section class="parts" id="parts">
        <div class="heading">
            <span>As peças que vendemos</span>
            <h2>Com a máxima qualiadade</h2>
            <p>Oferecemos peças automotivas de alta qualidade para garantir o melhor desempenho do seu veículo.</p>
        </div>
        <!--container peça-->
        <div class="parts-container container">
            <!--PEÇA NUMERO 1-->
            <div class="box">
                <img src="img/part1.png" alt="">
                <h3>peças de reposição automotivas</h3>
                <span>R$ 1000,00</span>
                <i class='bx bxs-star' >(2 Avaliações)</i>
                <a href="#" class="btn">Comprar</a>
                <a href="#" class="details">Ver mais Detalhes</a>
            </div>
            <!--PEÇA NUMERO 2-->
            <div class="box">
                <img src="img/part2.png" alt="">
                <h3>peças de reposição automotivas</h3>
                <span>R$ 860,00</span>
                <i class='bx bxs-star' >(4 Avaliações)</i>
                <a href="#" class="btn">Comprar</a>
                <a href="#" class="details">Ver mais Detalhes</a>
            </div><!--PEÇA NUMERO 3-->
            <div class="box">
                <img src="img/part3.png" alt="">
                <h3>peças de reposição automotivas</h3>
                <span>R$ 700,00</span>
                <i class='bx bxs-star' >(6 Avaliações)</i>
                <a href="#" class="btn">Comprar</a>
                <a href="#" class="details">Ver mais Detalhes</a>
            </div><!--PEÇA NUMERO 4-->
            <div class="box">
                <img src="img/part4.png" alt="">
                <h3>Filtro</h3>
                <span>R$ 300,00</span>
                <i class='bx bxs-star' >(8 Avaliações)</i>
                <a href="#" class="btn">Comprar</a>
                <a href="#" class="details">Ver mais Detalhes</a>
            </div><!--PEÇA NUMERO 5-->
            <div class="box">
                <img src="img/part5.png" alt="">
                <h3>peças de reposição automotivas</h3>
                <span>R$ 600,00</span>
                <i class='bx bxs-star' >(10 Avaliações)</i>
                <a href="#" class="btn">Comprar</a>
                <a href="#" class="details">Ver mais Detalhes</a>
            </div>
            <!--PEÇA NUMERO 6-->
            <div class="box">
                <img src="img/part6.png" alt="">
                <h3>Pneu</h3>
                <span>R$ 259,00</span>
                <i class='bx bxs-star' >(12 Avaliações)</i>
                <a href="#" class="btn">Comprar</a>
                <a href="#" class="details">Ver mais Detalhes</a>
            </div>
        </div>
    </section>
    <!--Parte de servicos-->
    <section class="servicos" id="servicos">
        <div class="heading">
            <span>Serviços que oferecemos</span>
            <h2>Com os melhores profissionais</h2>
            <p>Oferecemos serviços especializados com a expertise dos melhores profissionais do setor.</p>
        </div>
        <!--Container de servicos-->
        <div class="servicos-container Container">
            <!--Serviço 1-->
            <div class="box">
                <img src="img/trocarPeças.jpg" alt="">
                <h3>Troca de peças</h3>
                <span>R$ 200,00</span>
                <a href="#" class="btn">Agendar</a>
                <a href="#" class="details">Ver mais Detalhes</a>
            </div>
            <!--Serviço 2-->
            <div class="box">
                <img src="img/pinturasCarro.jpg" alt="">
                <h3>Pintura</h3>
                <span>R$ 200,00</span>
                <a href="#" class="btn">Agendar</a>
                <a href="#" class="details">Ver mais Detalhes</a>
            </div>
            <!--Serviço 3-->
            <div class="box">
                <img src="img/Check-upCarro.png" alt="">
                <h3>Check-up Total do Carro</h3>
                <span>R$ 200,00</span>
                <a href="#" class="btn">Agendar</a>
                <a href="#" class="details">Ver mais Detalhes</a>
            </div>
            <!--Serviço 4-->
            <div class="box">
                <img src="img/EnveloparCarro.jpg" alt="">
                <h3>Envelopamento</h3>
                <span>R$ 200,00</span>
                <a href="#" class="btn">Agendar</a>
                <a href="#" class="details">Ver mais Detalhes</a>
            </div>
            <!--Serviço 5-->
            <div class="box">
                <img src="img/servico-de-reboque.jpg" alt="">
                <h3>Reboque</h3>
                <span>R$ 200,00</span>
                <a href="#" class="btn">Agendar</a>
                <a href="#" class="details">Ver mais Detalhes</a>
            </div>
            <!--Serviço 6-->
            <div class="box">
                <img src="img/lavarCarro.jpeg" alt="">
                <h3>Lavagem</h3>
                <span>R$ 200,00</span>
                <a href="#" class="btn">Agendar</a>
                <a href="#" class="details">Ver mais Detalhes</a>
            </div>
        </div>
    </section>
    <!--Footer-->
    <section class="footer">
        <div class="footer-container contaier">
            <div class="footer-box">
                <a href="" class="logo">Garagem<span>Tech</span></a>
                <div class="social">
                    <a href=""><i class='bx bxl-facebook'></i></a>
                    <a href=""><i class='bx bxl-twitter'></i></a>
                    <a href=""><i class='bx bxl-instagram'></i></a>
                    <a href=""><i class='bx bxl-youtube'></i></a>
                </div>
                <h3>Criado por:</h3>
                <p>Jorge</p>
                <p>Julia</p>
                <p>Leandro</p>
                <p>Maria</p>
                <p>Victor</p>
            </div>
            <div class="footer-box">
                <h3>Mapa do Site</h3>
                <a href="#">Home</a>
                <a href="#cars">Carros</a>
                <a href="#parts">Peças</a>
                <a href="#servicos">Serviços</a>
            </div>
            <div class="footer-box">
                <h3>Legal</h3>
                <a href="#">Privacidade</a>
                <a href="#">Reembolso</a>
                <a href="#">Cookies</a>
            </div>
            <div class="footer-box">
                <h3>Contato</h3>
                <p>Brasil</p>
            </div>
        </div>
    </section>
    <!--Nomes-->
    <div class="copyright">
        <p>&#169; Grupo 2 da TS</p>
    </div>
    <!----LINK do JS-->
    <script src="main.js"></script>
</body>
</html>