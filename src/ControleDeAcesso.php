<?php
namespace Projeto;
use PDO, Exception;

final class ControleDeAcesso {
   
    public function __construct() {
        if( !isset($_SESSION) ){
            session_start();
        }
    }     



 public function verificaAcesso():void {

     if (!isset($_SESSION['id'])) {
         session_destroy();
        header("location:../login.php?acesso_negado");
        die();
             } }





public function login (int $id, string $nome, string $email, string $perfil): void {
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['perfil'] = $perfil;
  
}

public function loginDois (int $id, string $nome, string $email, string $perfil, int $usuarioId): void {
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['perfil'] = $perfil;
    $_SESSION['usuario_id'] = $usuarioId;
}

public function loginTres (int $usuarioId, string $nome, string $email, string $perfil, int $categoriaId, string $titulo): void {
    $_SESSION['usuario_id'] = $usuarioId;
    $_SESSION['nome'] = $nome;
    $_SESSION['perfil'] = $perfil;
    $_SESSION['email'] = $email;
    $_SESSION['categoria_id'] = $categoriaId;
    $_SESSION['titulo'] = $titulo;
  
}


public function confirmaExcluirUm(int $id, string $confirme, int $usuarioId){
    $_SESSION['id'] = $id;
    $_SESSION['confirme'] = $confirme;
    $_SESSION['usuario_id'] = $usuarioId;
}

public function confirmaExcluirDois(int $id, string $confirme){
    $_SESSION['id'] = $id;
    $_SESSION['confirme'] = $confirme;
}




public function logout():void {
    session_start();
    session_destroy();
    header("location:../index.php?logout");
    die(); // exit;
}

public function logoutExterno():void {
    session_start();
    session_destroy();
    header("location:index.php?logout");
    die(); // exit;
}

public function logoutAtualiza():void {
    session_start();
    session_destroy();
    header("location:./perfil_valida.php?id=" . $_SESSION['id']);
    die(); // exit;
}

}