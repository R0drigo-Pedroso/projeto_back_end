<?php

use Projeto\ControleDeAcesso;
use Projeto\Projeto;

require_once './vendor/autoload.php';
 require_once './inc/cabecalho_admin.php'; 
$sessao = new ControleDeAcesso;
$projeto = new Projeto;
$projeto->usuario->setId($_SESSION['id']);
$listaDeNoticias = $projeto->listarDetalhes();
// if ($_SESSION['id'] == $dados['usuario_id']) {
//   echo 'alo';
// } else {
//   echo 'não';
// }

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
// date_default_timezone_set('America/Sao_Paulo');
// // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
//     $dataLocal = date('d/m/Y', time());

    // echo $dataLocal;

?>


  <main class="my-4">

  <!-- Desktop Table perfil lateral -->
    <aside class="text-center d-lg-block d-none">
      <section class="perfil pt-3 pb-3 mb-4">
        <img src="./imagem/<?=$_SESSION['perfil']?>" alt="" width="150">
            <p><strong><?=$_SESSION['nome']?></strong></p>

            <!-- estrelas -->
            <ul class="avaliacao d-flex">
              <li class="star-icon ativo" data-avaliacao="1"></li>
              <li class="star-icon" data-avaliacao="2"></li>
              <li class="star-icon" data-avaliacao="3"></li>
              <li class="star-icon" data-avaliacao="4"></li>
              <li class="star-icon" data-avaliacao="5"></li>
            </ul>
            <!-- Final estrelas -->

            <div class="d-grid gap-2 col-6 mx-auto">
              <button class="botao-perfil rounded-3" type="button">Editar Perfil</button>
              <button class="botao-perfil rounded-3" type="button">Encontrar Projetos</button>
            </div>

            <hr>
           <h2>Projetos Publicados:</h2>
          <p class="contador"><?=count($listaDeNoticias)?></p>
      </section>
    </aside>
  <!-- Desktop Table -->

  <!-- Mobile Table -->
    <section class="text-center d-lg-none">
          <section class="perfil pt-3 pb-3 mb-4">
            <img src="./imagem/<?=$_SESSION['perfil']?>" alt="" width="150">
              <p><strong><?=$_SESSION['nome']?></strong></p>
              
            <div class="d-grid gap-2 col-6 mx-auto">
              <button class="botao-perfil rounded-3" type="button">Editar Perfil</button>
              <button class="botao-perfil rounded-3" type="button">Encontrar novos projetos</button>
            </div>
              
              <hr>
              <h2>Projetos Publicados:</h2>
          </section>

          <section class="projetos pt-3 pb-4">
            <h1>Meus Projetos</h1>
            <hr>
              <div class="d-flex justify-content-center">
                <button class="rounded-3 btn-projeto px-5 py-1 mt-2 text-decoration-none" type="button"><a href="projeto_insere.php" class="text-decoration-none">Cadastrar Projeto</a></button>
              </div>
            <hr>
              <div class="ls-custom-select d-flex gap-4 align-items-center justify-content-center">
                <p class="mt-3">Filtrar por categoria:</p>
                  <select class="ls-select">
                    <option value="1">Todos Projetos</option>
                    <option value="2">Web, Software & Mobile</option>
                    <option value="3"> Opção 3 </option>
                    <option value="4"> Opção 4 </option>
                  </select>
              </div>

              <div class="col-12 px-md-1 mt-4">
                <div class="list-group">
                  <h4 class="">Título: </h4>
                    <span><strong>Data:</strong> 25/08/2022</span>
                    <p><strong>Resumo do projeto:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium consequuntur sed illum repellendus aut perspiciatis maiores exercitationem labore nisi necessitatibus facilis ratione numquam eum voluptatibus, facere enim modi incidunt corrupti!</p>
                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="botao-perfil rounded-3" type="button">Visualizar projeto</button>
                  </div>

                </div>
              </div>

          </section>
    </section>

    <section class="projetos_desktop pt-3 pb-2 float-end d-none d-lg-block ps-3 me-3">
                <h1 class="me-5">Meus Projetos</h1>
                <hr>
                <div class="d-flex justify-content-center text-decoration-none">
                  <button class="rounded-3 btn-projeto px-5 py-1 mt-2" type="button">
                    <a href="projeto_insere.php?id=<?=$_SESSION['id']?>">
                      Cadastrar Projeto
                    </a>
                  </button>
              </div>
              <hr>
              
            <div class="ls-custom-select d-flex gap-4 align-items-center">
                  <p class="mt-3">Filtrar por categoria:</p>
              <select class="ls-select">
                  <option value="1">Todos Projetos</option>
                  <option value="2">Web, Software & Mobile</option>
                  <option value="3"> Opção 3 </option>
                  <option value="4"> Opção 4 </option>
              </select>
          </div>
          
          <?php foreach ($listaDeNoticias as $noticia) {  ?> 
              <div class="col-12 px-md-1 mt-2">
                  <div class="list-group">
                        <div class="list-group-item list-group-item-action">
                          <h4 class="">Título: <?=$noticia['titulo']?></h4>
                            <span><strong>Data:</strong> 25/08/2022</span>
                            <p><strong>Resumo do projeto:</strong> <?=$noticia['resumo']?></p>
                        <div class="d-flex justify-content-center">
                          <button class="botao-perfil rounded-3 px-5" type="button">Visualizar projeto</button>
                        </div>
                      </div>
                  </div>
              </div>
                    <?php } ?>
      </section>
    <!-- Mobile Table -->   
  </main>

  <footer class="bg-marinho-footer text-center text-white mt-5">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1 fs-5" href="#!" role="button"><i class="bi bi-instagram"></i></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1 fs-5" href="#!" role="button"><i class="bi bi-twitter"></i></a>
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">

      <p class="copyright">
        © 2022 Copyright:<a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </p>
      
      <p class="copyright">
        <a class="text-white" href="https://mdbootstrap.com/">Politica de Privacidade</a>
      </p>
    </div>
    <!-- Copyright -->
  </footer>

  <script type="text/javascript" src="./js/estrelas.js"></script>