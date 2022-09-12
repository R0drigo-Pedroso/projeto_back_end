- Criando Banco de Dados
```sql
CREATE DATABASE tentativa CHARA
CTER SET utf8mb4;
```

- Criando a tabela Usuário
```sql
CREATE TABLE usuario(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR (45) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    perfil varchar(45),
    profissao_id INT NOT NULL
);
```
- Criando a tabela de Profissao
```sql
CREATE TABLE profissao(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR (45) NOT NULL,
    descricao VARCHAR(500) NOT NULL,
    usuario_id INT NOT NULL,
    categoria_id TINYINT NOT NULL
);
```
## Relacionamento da tabela de Profissão e Usuario

---

```sql 
ALTER TABLE profissao
ADD CONSTRAINT fk_usuario_profissao
FOREIGN KEY (usuario_id) REFERENCES usuario(id);
```

## Relacionamento da tabela de Profissao e Categoria
```sql
ALTER TABLE profissao
ADD CONSTRAINT fk_profissao_categoria
FOREIGN KEY (categoria_id) REFERENCES categoria(id);
```

---
- Criando a tabeka categoria
```sql 
CREATE TABLE categoria(
    id TINYINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL
);
```
---
- Criando tabela Projeto
```sql 
CREATE TABLE projeto(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(45) NOT NULL,
    resumo VARCHAR(150) NOT NULL,
    descricao VARCHAR(1000) NULL,
    usuario_id INT NOT NULL,
    categoria_id TINYINT NOT NULL
);
```

```sql
ALTER TABLE projeto
ADD CONSTRAINT fk_projeto_usuario
FOREIGN KEY (usuario_id) REFERENCES usuario(id);

```

```sql
ALTER TABLE projeto
ADD CONSTRAINT fk_projeto_categoria
FOREIGN KEY (categoria_id) REFERENCES categoria(id);

```
---
- Criando tabela rede
```sql
CREATE TABLE rede(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    website VARCHAR(50) NULL,
    linkedin VARCHAR(50) NULL,
    instagram VARCHAR(50) NULL,
    github VARCHAR(50) NULL,
    behance VARCHAR(50) NULL,
    usuario_id INT NOT NULL
);
```
```sql
ALTER TABLE rede
ADD CONSTRAINT fk_rede_usuario
FOREIGN KEY (usuario_id) REFERENCES usuario(id);

```