<!---
CRIADO: JORGE ASSUNÇÃO NETO
DATA:20/07/2024
-->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Userpagestyle.css" />
    <link rel ="" href=""/>
    <!--Link dos icones-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Garagem tech - Landing Page</title>
</head>
<body>
    <!--Barra de navegação-->
    <header>
        <!--container barra de NAV-->
            <div class="nav container">
                <!--icone menu-->
                <i class='bx bx-menu' id="menu-icon"></i>
                <!--logo-->
                <a href="#" class="logo">Garagem<span>Tech</span></a>
                <ul class="navbar">
                    <li><a href="#home" class="active">home</a></li>
                    <li><a href="#cars">Peças de Carros</a></li>
                    <li><a href="#servicos">Serviços</a></li>
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
            <p>Blá Blá Blá Blá <br> Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá.</p>
            <!--Botão home-->
            <a href="Register.php" class="btn">Registre-se agora</a>
        </div>
    </section>
    <!--Sessão de Carros e peças-->
    <section class="cars" id="cars">
        <div class="heading">
            <span>Todos os carros</span>
            <h2>Peças para todos os tipos de carro</h2>
            <p>Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá Blá .</p>
        </div>
        <!--Container do carro-->
        <div class="cars-container container">
            <!--Carro 1-->
            <div class="box">
                <img src="img/car1.jpg" alt="">
                <h2>Ver peças</h2>
            </div>
            <!--Carro 2-->
            <div class="box">
                <img src="img/car2.jpg" alt="">
                <h2>Ver peças</h2>
            </div>
            <!--Carro 3-->
            <div class="box">
                <img src="img/car3.jpg" alt="">
                <h2>Ver peças</h2>
            </div>
            <!--Carro 4-->
            <div class="box">
                <img src="img/car4.jpg" alt="">
                <h2>Ver peças</h2>
            </div>
            <!--Carro 5-->
            <div class="box">
                <img src="img/car5.jpg" alt="">
                <h2>Ver peças</h2>
            </div>
            <!--Carro 6-->
            <div class="box">
                <img src="img/car6.jpg" alt="">
                <h2>Ver peças</h2>
            </div>
        </div>   
    </section>
    <!--parte das peças-->
    <section class="parts" id="parts">
        <div class="heading">
            <span>As peças que vendemos</span>
            <h2>Com a máxima qualiadade</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga, velit.</p>
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
    <!----LINK do JS-->
    <script type="text/javascript" src="./assets/js/main.js"></script>
</body>
</html>