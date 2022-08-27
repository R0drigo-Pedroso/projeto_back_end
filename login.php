<?php


use Projeto\ControleDeAcesso;
use Projeto\Usuario;

require "./vendor/autoload.php";
?>
<?php
		if(isset($_POST['entrar'])){
			//Verificação de campos do formulário
			if(empty($_POST['email']) || empty($_POST['senha'])){
				header("location:login.php?campos_obrigatorios");
			} else {
				
					$usuario = new Usuario;
					$usuario->setEmail($_POST['email']);
	
					// Buscando um usuário no banco a partir do e-mail
					$dados = $usuario->buscar();
				}
				// Capturamos o email informado
			

				//if($dados === false){ - Se dados for false(ou seja, não tem dados de nenhum usuário cadastrado)
				if(!$dados) {
					//echo "Não tem ninguém nessa bagaça!";
					header("location:login.php?nao_encontrado");
				} else {
					// Verificação da senha e login
					if(password_verify($_POST['senha'], $dados['senha']) ) {
						$sessao = new ControleDeAcesso;
						if($dados['categoria_id'] !== null){
							$sessao->loginDois($dados['id'], $dados['email'], $dados['nome'], $dados['perfil'], $dados['categoria_id']);
								// header('location:index.php');
								echo 'errou';
						} else {
							$sessao->login($dados['id'], $dados['email'], $dados['nome'], $dados['perfil']);
								header('location:index.php?id=' . $_SESSION['id']);
                        }
					} else {
						header("location:login.php?senha_incorreta");
					}
				}
				
				// Utilitarios::dump($dados);
			}
		
		?>



	<div class="container marketing shadow">
		<div class="row featurette my-5 p-sm-5">

			<div class="col-md-6 d-none d-md-block">
				<h1 >XPTO.com</h1>
                    <h4 class="text-start">Entre na XPTO, e contemple nossos beneficíos</h4>
                    <p class="text-start">Realize o login para uma melhor experiência</p>
                    <p class="text-start">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis nemo nostrum aliquam voluptatibus. Cumque, nulla?</p>
					<img class="d-flex w-100 m-auto" src="img/img-projetando.png">
			</div>

			<div class="col-md-6 p-sm-5 p-4">
				<form class="form-horizontal bg-form p-sm-5 p-3 rounded" role="form" action="#">
				<div class="d-grid gap-2 text-center">
						<button class="btn btn-primary google-button" type="button">Google</button>
						<button class="btn btn-primary" type="button">LinkedIn</button>
						<p class="my-2">OU</p>
					</div>
					<div class="form-group mt-2">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email">
					</div>
					<div class="form-group mt-2">
						<label for="senha">Senha</label>
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                     </div>
                    
                     <!-- 2 column grid layout for inline styling -->
                    <div class="row mt-2">
                        <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
                            <label class="form-check-label" for="form2Example34"> Lembrar senha </label>
                        </div>
                        </div>

                        <div class="col">
                        <!-- Simple link -->
                        <a href="#!">Esqueci a senha?</a>
                        </div>
                    </div>

          
                    <div class="d-grid gap-2 text-center">
					    <button type="submit" class="btn btn-primary mt-3" name="entrar">Entra</button>
                        <a href="cadastro.php">Ainda não criou sua conta? Cadastre-se</a>
                    </div>
				</form>
			</div>
		</div>
	</div>
