<!DOCTYPE html>

<html lang="pt-BR">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    

    <meta name="keywords" content="Curso de Manutenção em Smartphones Nível I ao III, manutenção, celulares, assistência técnica"/>

    <meta name="description" content="Curso de Manutenção em Smartphones Nível I ao III Esse curso começa do zero e vai te preparar para trabalhar em uma assistência ou montar uma!"/>

    <meta name="author" content="CA Cursos"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Curso de Software em Smartphones</title>

    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <!-- Links de Style -->
    <link href="assets/css/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/icons.css"/>
    <link rel="shortcut icon" href="favicon.png"/>

    <link rel="stylesheet" href="assets/css/boot.css"/>

    <link rel="stylesheet" href="assets/css/style.css"/>

    

    

    <meta name="twitter:card" value="summary">

    <meta name="twitter:site" content="https://twitter.com/cacursos1">

    <meta name="twitter:title" content="Curso de Manutenção em Smartphones Nível I ao III">

    <meta name="twitter:description" content="Curso de Manutenção em Smartphones Nível I ao III Esse curso começa do zero e vai te preparar para trabalhar em uma assistência ou montar uma!">

    <meta name="twitter:creator" content="https://twitter.com/cacursos1">

    <!-- imagens para o Twitter Summary Card precisam ter pelo menos 200×200 px -->

    <meta name="twitter:image" content="https://landpage.cacursos.com.br/fundo-mobil.webp"><!-- para o sistema Open Graph-->

    <meta property="og:title" content="Curso de Manutenção em Smartphone Nivel I ao III" />

    <meta property="og:type" content="article" />

    <meta property="og:url" content="https://landpage.cacursos.com.br/" />

    <!--<meta property="og:image" content="http://example.com/image.jpg" />-->

        <meta property="og:image" content="https://landpage.cacursos.com.br/fundo-mobil.webp" />

    <meta property="og:description" content="Curso de Manutenção em Smartphones Nível I ao III Esse curso começa do zero e vai te preparar para trabalhar em uma assistência ou montar uma!" />

    <meta property="og:site_name" content="Curso de Manutenção em Smartphones Nível I ao III" />

    <meta property="fb:admins" content="270930496349653" />

    

  

</head>

<body>

    <header class="main-header-full">

        <div class="row row-flex">



            <div class="box-logo">

                <img src="assets/images/marca_dagua_escura.png" alt="Escola de curso de manutenção em smartphone " title="Escola de curso de manutenção em smartphone">

            </div>

            <!-- end logo -->



            <div class="box-social">

                <a href="https://www.facebook.com/cacursos/" target="_blank" title="Curta Nossa Página no Facebook" class="icon-facebook-square"></a>

                <a href="https://www.instagram.com/manualdocelular_/" target="_blank" title="Siga no Instagram" class="icon-instagram"></a>

                <a href="https://blog.cacursos.com.br/" title="Acompanhe Nosso Blog" target="_blank" class="icon-social-blogger"></a>

                <a href="https://www.youtube.com/channel/UC5Wq3-6-92m8xHQUJgTGrqQ" title="Se Inscreva no Canal" target="_blank" class="icon-youtube-play"></a>

            </div>

        </div>

    </header>

    <!-- header top -->

    <section class="content-header">

        <div class="row row-flex row-center">

        <article class="rol-5 box-title" data-aos="zoom-in">

            <header class="content-title">

                <h1>Curso de Software em Smartphones</h1>

                <h2>Curso Presencial que começa do zero e te prepara para Trabalhar em uma assistência ou montar uma !</h2>

                <a href="https://landpage.cacursos.com.br/manualdocelular.php" target="_blank" class="buttom-co bt-none">Quero Mais Informaçõe Sobre o Curso</a>

            </header>

        </article>

        <article class="rol-5 box-form" data-aos="flip-right">


            <form class="form" action="" method="POST" autocomplete="off">

                <div class="form-title">

                    <h2>Faça Parte</h2>

                </div>

                <?php

                //require_once 'vendor/autoload.php';

               // $insetUser = new \App\Model\Dao();

                //$setUser = new \App\Model\User();

                if(isset($_POST["cadastrar"])):

                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $estado = $_POST['estado'];
                    $cidade = $_POST['cidade'];
                    $curso = $_POST['curso'];
                    $unidade = $_POST['unidade'];
                    $horario = $_POST['horario'];

                    // $setUser->setNome($nome);
                    // $setUser->setEmail($email);
                    // $setUser->setPhone($phone);
                    // $setUser->setEstado($estado);
                    // $setUser->setCidade($cidade);
                    // $setUser->setCurso($curso);
                    // $setUser->setUnidade($unidade);
                    // $setUser->setHorario($horario);

                    

                //     if($insetUser->create($setUser)){
                //         echo "<div class=\"alert danger\">Tente Novamente</div>";
                //     }else{
                //         echo "<div class=\"alert success\">Nosso consultor recebeu seu contato</div>";
                //     }
                // endif;

              

                ?>

                <div class="form-group">

                        <label>Nome</label>

                        <input type="text" name="nome" placeholder="Seu nome..." autocomplete="off" required/>

                    </div>



                    <div class="form-group">

                        <label>E-mail</label>

                        <input type="email" name="email" placeholder="Seu email..." autocomplete="off" required/>

                    </div>



                    <div class="form-group">

                        <label>Whatsapp</label>

                        <input type="tel" name="phone" placeholder="(DDD) 00000-0000" required autocomplete="off"/>

                    </div>


                    <div class="form-group">

                        <label>Estado</label>
                        <select name="estado" id="estados" required>
                            <option></option>
                        </select>

                    </div>


                    <div class="form-group">

                        <label>Cidade</label>
                        <select name="cidade" id="cidades" required>
                            
                        </select>

                    </div>


                    <div class="form-group">

                        <label>Curso</label>

                             <input type="text"  name="curso" value="Manutenção Smartphones I ao III"/>

                        </div>

                        <div class="form-group">
                              <input type="hidden"  name="unidade" value="vazio"/>
                                <input type="hidden"  name="horario" value="vazio"/>
                            </div>


                    <div class="form-group" style="display: flex; align-items: center;">
                        <span class="icon-check-square check"></span>
                        <input type="checkbox"name="check" id="check" required style="width: 25px; height: 25px; padding: 0;"/>
                        <p style="font-size: .9em; font-weight: 400; color: #999999; padding-left: 8px; font-family: 'Montserrat',sans-serif;">Não sou um robô</p>
                    </div>



                    <input type="submit" name="cadastrar" class="button-env" value="Quero agendar minha ligação">

            </form>



           

        </article>

</div>

    </section>

    <!-- end header dobra principal -->



    <main class="container">

        <div class="row">

        <section class="main-video">

        <header class="text-title">

            <h1>O que você irá aprender nesse curso?</h1>

        </header>

        

        <div class="box-video">

            <div class="video" data-aos="fade-up">
               <!--   <video controls style="width: 100%;">
                  <source src="assets/video/curso-de-manutencao.mp4" type="video/mp4">
                </video> -->

                 <iframe style="width:100%; height: 100%;" src="https://www.youtube.com/embed/--SM_gBNc5M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 

        </div>
        
        </div>
            <div style="text-align: center; margin: 50px 0 20px 0"><a href="https://drive.google.com/file/d/1FgYbwd-Zjj7R-F35iUjrs9h8pIPEWatr/view" target="_blank" class="buttom-co" style="margin: 30px 0 20px 0">Baixe o Cronograma</a></div>
    </section>

    <!-- end dobra video -->



    <section class="box-service">

        <header class="text-title">

        <h1>Diferenciais  CA Cursos</h1>

         </header>



        

        <div class="content-service">

            <article class="service" data-aos="fade-rigth">

                <h2><span class="icon-social-foursquare"></span>Antes</h2>



                    <div class="box-icon">

                         <a href="https://blog.cacursos.com.br/" target="_blank">Blog</a>

                       <img src="assets/images/icones/blogger.png" alt="Blog"/>

                       <p>Estude diariamente!</p>

                    </div>



                    <div class="box-icon box-zebra">

                        <span>Consultoria</span>

                       <img src="assets/images/icones/consutoria.png" alt="Consultoria"/>

                        <p>Escolha o curso certo!</p>

                    </div>



                    <div class="box-icon">

                         <a href="https://www.youtube.com/channel/UC5Wq3-6-92m8xHQUJgTGrqQ" target="_blank">Canal</a>

                       <img src="assets/images/icones/youtube.png" alt="YouTube"/>

                       <p>+ de 91 Mil Inscritos</p>

                    </div>

                    

                     <div class="box-icon box-zebra  box-zebra-none">



                    </div>



                    <div class="box-icon box-zebra-none">



                    </div>



            </article>

            

            <article class="service" data-aos="fade-up">

                <h2><span class="icon-social-foursquare"></span>Durante </h2>



                <div class="box-icon box-zebra">

                     <span>Apostila</span>

                       <img src="assets/images/icones/lista.png" alt="Apostilha"/>

                        <p>Conteúdo Próprio</p>

                    </div>



                    <div class="box-icon">

                        <span>Bancada e Equipamentos</span>

                       <img src="assets/images/icones/bancada.png" alt="Bancada"/>

                         <p>Individuais!</p>

                    </div>



                    <div class="box-icon box-zebra  box-zebra-none">



                    </div>



                    <div class="box-icon zebra-mobil">

                        <span>Fornecedores</span>

                       <img src="assets/images/icones/frete.png" alt="Fornecedor de peças"/>

                       <p>Para manter seu Negócio!</p>

                    </div>



                    <div class="box-icon box-zebra bg-none">

                          <span>Aparelhos Estragados</span>

                       <img src="assets/images/icones/iphone.png" alt="Iphone"/>

                     <p>Traga, Conserte e Lucre!</p>

                    </div>



            </article>



            <article class="service" data-aos="fade-down">

                <h2><span class="icon-social-foursquare"></span>Depois </h2>



                <div class="box-icon zebra-mobil">

                      <span>Certificado</span>

                       <img src="assets/images/icones/certificado.png" alt="Certificado"/>

                     <p>Reconhecido!</p>

                    </div>



                    <div class="box-icon box-zebra bg-none">

                         <span>Sistema de Treinamento</span>

                       <img src="assets/images/icones/pc.png" alt="Sistema Continuo de Treinamento"/>

                      <p>Continuo!</p>

                    </div>



                    <div class="box-icon zebra-mobil">

                         <span>Grupo de Alunos</span>

                       <img src="assets/images/icones/telegram-group.png" alt="Grupo Telegram"/>

                      <p>Experiência compartilhada!</p>

                    </div>



                    <div class="box-icon box-zebra  box-zebra-none">



                    </div>



                    <div class="box-icon box-zebra-none">



                    </div>

            </article>



        </div>

        <div class="button">

            <a href="https://landpage.cacursos.com.br/manualdocelular.php" target="_blank" class="buttom-co">Quero Mais Informaçõe Sobre o Curso</a>

        </div>

    </section>

        <div class="clear"></div>

</div>

<section class="section-header">

    <header class="sub-title">

        <h1>+ 7.000 Alunos Formados</h1>

    </header>

<div class="row">

    <div class="authores">

            <article class="profs" data-aos="zoom-in">

                <div class="box-image">

                    <img src="assets/images/alunos/uriel.png" alt="Aluno uriel"/>

                </div>

                <div class="box-info">

                    <h2>Uriel Favilla</h2>

                    <p>" Muito bom,instrutores muito bem preparados e atenciosos, muito surprendido com a qualidade dos processos, execelente para quem quer iniciar um negócio e/ou se profissionalizar."</p>

                </div>

            </article>



            <article class="profs" data-aos="zoom-in-up">

                <div class="box-image">

                    <img src="assets/images/alunos/rosangela.png" alt="Aluna Rosangela"/>

                </div>

                <div class="box-info">

                    <h2>Rosângela Norato</h2>

                    <p>"A experiência foi muito boa, professores profissionais e totalmente satisfatório... Obrigada CA cursos pela capacitaçao"</p>

                </div>

            </article>



            <article class="profs" data-aos="zoom-in-down">

                <div class="box-image">

                    <img src="assets/images/alunos/arthur.png" alt="Aluno Arthur"/>

                </div>

                <div class="box-info">

                    <h2>Arthur Nunes</h2>

                    <p>"Atendimento excelente desde a recepção aos professores, acolhimento do aluno como uma família, didática incrível!! Simplesmente fazem cada centavo investido valer a pena!! 

Parabéns a toda a equipe!! Logo mais estou aí para me aperfeiçoar mais "</p>

                </div>

            </article>

    </div>

        </div>

</section>

<section class="main-time">
    <div class="row">
        <header class="header-time">
            <div class="col">
            <h1>Horários do Curso</h1>
            <h2>Duração 44 Horas</h2>
        </div>
        </header>
        <div class="col">
            <article class="box-time" data-aos="fade-up">
                <h2>MATUTINO</h2>
                <span>Duração: Duas semanas – Segunda à Sexta</span>
                <span>Horário: 8h45 às 12h30</span>
            </article>

            <article class="box-time" data-aos="fade-up">
                <h2>VESPERTINO</h2>
                <span>Duração: Duas semanas – Segunda à Sexta</span>
                <span>Horário: 13h30 às 18h15</span>
            </article>

            <article class="box-time" data-aos="fade-up">
                <h2>NOTURNO</h2>
                <span>Duração: Duas semanas – Segunda à Sexta</span>
                <span>Horário: 18h30 às 22h30</span>
            </article>

            <article class="box-time" data-aos="fade-up">
                <h2>INTEGRAL</h2>
                <span>Duração: Uma semana – Segunda à Sexta</span>
                <span>Horário: 8h45 às 18h15 com 1 h de Almoço</span>
            </article>

            <article class="box-time" data-aos="fade-up">
                <h2>INTENSIVO</h2>
                <span>Duração: Cinco sábados- consecutivos</span>
                <span>Horário: 09h às 18h com 1 h de Almoço</span>
            </article>
        </div>
    </div>
</section>


    </main>

    <footer>

<section class="main-unidades">
    <div class="row">
        <header class="text-title">
            <h1 style="color: #f0ad4e;">Nossas Unidades</h1>
            <h2 style="color: #ffffff;">Locais de fácil acesso com indicação de hotéis, restaurantes e estacionamento</h2>
        </header>

        <div class="col-uni">
            <article class="box-uni">
                <h2 style="color: #f0ad4e;">CA cursos - Goiânia</h2>
                <ul>
                    <li><strong>Endereço:</strong> Rua 02,  Esquina com a 07 nº 115,<br/>
                        Centro – Goiânia – GO CEP : 74013-020 </li>
                    <li><strong>Fone:</strong> (62) 98400-2318 e 98200-1842</li>
                    <li><strong>E-mail</strong>relacionamento@cacursos.com.br</li>
                    <li><strong>Sugestões ou Reclamações</strong></li>
                    <li><strong>E-mail:</strong> cristiano@cacursos.com.br</li>
                </ul>
            </article>

            <article class="box-uni">
                <h2 style="color: #f0ad4e;">CA cursos - DF</h2>
                <ul>
                    <li><strong>Endereço:</strong> C 12 Bl. J Edificio Techmeier 2° Andar, Salas 201-202 Taguatinga Centro – Brasília – DF CEP: 72.019-900  </li>
                    <li><strong>Fone:</strong> (62) 98400-2318 e 98200-1842</li>
                    <li><strong>E-mail</strong>relacionamento@cacursos.com.br</li>
                    <li><strong>Sugestões ou Reclamações</strong></li>
                    <li><strong>E-mail:</strong> cristiano@cacursos.com.br</li>
                </ul>
            </article>
        </div>
    </div>
</section>

</footer>

</body>
<script src="js/jquery.js"></script>
<script src="js/cidades_estados.json"></script>
<script src="js/buscacidade.js"></script>
<script src="js/controller.js"></script>
<script src="js/utils.js"></script>
<script src="js/aos.js"></script>
<script>
 AOS.init();
</script>
</html
