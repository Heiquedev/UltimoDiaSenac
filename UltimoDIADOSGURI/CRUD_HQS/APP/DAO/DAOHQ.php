<?php

class DAOHQ
{
    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=db_hqs";

        $this->conexao = new PDO($dsn, 'root', 'root'); //credenciais do DB
    }

    

    public function insert(ModelHQ $model)
    {
        $sql =
            "INSERT INTO hq(nome, genero, autor, capitulos)  
        VALUES (?, ?, ?, ?)"; //string sql

        $pst = $this->conexao->prepare($sql);

        $pst->bindValue(1, $model->nome);
        $pst->bindValue(2, $model->genero);
        $pst->bindValue(3, $model->autor);
        $pst->bindValue(3, $model->capitulos);

        $pst->execute();
    }

    public function select()
    {
        $sql =
            "SELECT * FROM hq"; //string sql

        $pst = $this->conexao->prepare($sql);
        $pst->execute();

        return $pst->fetchAll(PDO::FETCH_CLASS); //Organizar
    }

    public function selectById(int $id)
    {
        include_once "Model/ModelHQ.php";

        $sql = " SELECT * FROM hq WHERE id= ? "; //string sql

        $pst = $this->conexao->prepare($sql);
        $pst->bindValue(1, $id);
        $pst->execute();

        return $pst->fetchObject("ModelHQ");
    }

    public function update(ModelHQ $model)
    {
        $sql =
            "UPDATE hq SET nome=?, genero=?, autor=?, capitulos=? WHERE id=? "; //string sql

        $pst = $this->conexao->prepare($sql);

        $pst->bindValue(1, $model->nome);
        $pst->bindValue(2, $model->genero);
        $pst->bindValue(3, $model->autor);
        $pst->bindValue(3, $model->capitulos);

        $pst->execute();

        return $pst->fetchAll(PDO::FETCH_CLASS); //Organizar
    }

    public function delete(int $id)
    {
        $sql =
            "DELETE FROM hq WHERE id = ?"; //string sql

        $pst = $this->conexao->prepare($sql);
        $pst->bindValue(1, $id);
        $pst->execute();
    }
}