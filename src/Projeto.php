<?php
namespace Projeto;
use PDO, Exception;

final class Projeto{
    private int $id;
    private string $titulo;
    private string $resumo;
    private string $descricao;
    private int $usuarioId;
    private int $categoriaId;
    private PDO $conexao;

    
    public function __construct()
    {


        /* Reaproveitando a conexão já existente
        a partir da classe de Usuario */
        $this->conexao = $this->cliente->getConexao();
    }

     // Testado e funcionando
     public function listar():array {
        $sql = "SELECT projeto.id, projeto.nome, projeto.imagem, projeto.descricao, projeto.cliente_id, categoria.nome AS categoria, cliente.nome AS cliente
        FROM projeto LEFT JOIN categoria ON projeto.categoria_id = categoria.id LEFT JOIN cliente ON projeto.cliente_id = cliente.id ORDER BY id";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ". $erro->getMessage());
        }
        return $resultado;
    }

    public function cadastrar():void {
        $sql = "INSERT INTO projeto(titulo, resumo, descricao, usuario_id, categoria_id) VALUES(:titulo, :resumo, :descricao, :resumo, :usuario_id, :categoria_id)";
        
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":titulo", $this->titulo, PDO::PARAM_STR);
            $consulta->bindParam(":resumo", $this->resumo, PDO::PARAM_STR);
            $consulta->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
            $consulta->bindParam(":usuario_id", $this->usuarioId, PDO::PARAM_INT);
            $consulta->bindParam(":categoria_id", $this->categoriaId, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ". $erro->getMessage());
        }
    }

    // Testado e funcionando
    public function upload(array $arquivo) {
        $tiposAceitos = [
            "image/png",
            "image/jpeg",
            "image/gif",
            "image/svg+xml"
        ];

        if(!in_array($arquivo['type'], $tiposAceitos)) {
            die("<script>alert('formato válido');</script>");
        }
            $nome = $arquivo['name'];

            $temporario = $arquivo['tmp_name'];

            $destino = "./imagem/".$nome;

            move_uploaded_file($temporario, $destino);
        }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao(string $descricao)
    {
        $this->descricao = filter_var($descricao, FILTER_SANITIZE_SPECIAL_CHARS);
    }


    

  
    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

     
    public function setCategoriaId($categoriaId)
    {
        $this->categoriaId = filter_var($categoriaId, FILTER_SANITIZE_NUMBER_INT);

    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    /**
     * Get the value of resumo
     */ 
    public function getResumo()
    {
        return $this->resumo;
    }

    /**
     * Set the value of resumo
     *
     * @return  self
     */ 
    public function setResumo($resumo)
    {
        $this->resumo = filter_var($resumo, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}