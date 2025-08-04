<?php

class ControllerHQ
{
    public static function index()
    {
        include 'Model/ModelHQ.php';
        $model = new ModelHQ();
        $model->getAllRows();
        include "View/modulos/HQS";

    }

    public static function save()
    {
        //var_dump($_POST);
        //exit;
        include 'Model/ModelHQ.php'; // inclui a model para transportar o HQ

        $model = new ModelHQ(); // instancia o objeto

        $model->id = $_POST["id"];
        $model->nome = $_POST["nome"];
        $model->genero = $_POST["genero"];
        $model->autor = $_POST["autor"];
        $model->capitulos = $_POST["capitulos"];

        $model->save(); // salva o animal

        header("Location: /hqs");
    }

    public static function form()
    {
        include "Model/ModelHQ.php";

        $model = new ModelHQ();

        if (isset($_GET['id'])) {
            $model = $model->getById((int) $_GET['id']);
        }
        include 'View/modulos/HQS/FormHQ.php';

        // var_dump($model);
    }

    public static function delete()
    {
        //var_dump($_POST);
        //exit;
        include 'Model/ModelHQ.php'; // inclui a model para transportar o HQ

        $model = new ModelHQ(); // instancia o objeto
        $model->delete((int) $_GET['id']); //deleta o HQ

        header("Location: /hqs");
    }
}