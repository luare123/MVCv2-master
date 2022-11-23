<?php
namespace App\Controller;
use App\Model\ProdutoModel;

class ProdutoController extends Controller
{
    public static function lista()
    {
        parent::isAuthenticated();
        include 'Model/ProdutoModel.php';
        $model = new ProdutoModel();
        $model->getAllRows();

        parent::render('Produto\produtolista', $model);
    }

    public static function form()
    {
        parent::isAuthenticated();
        include 'Model/ProdutoModel.php';
        $model = new ProdutoModel();

        if(isset($_GET['id']))
        {
            $model = $model->getById( (int) $_GET['id']);
        }

        parent::render('Produto\produtoform', $model);
    }

    public static function save()
    {
        parent::isAuthenticated();
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();
        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->preco = $_POST['preco'];
        $model->descricao = $_POST['descricao'];
        $model->id_categoria = $_POST['id_categoria'];

        $model->save();

        header("Location: /produto");
    }

    public static function delete()
    {
        parent::isAuthenticated();
        include 'Model/ProdutoModel.php';
        $model = new ProdutoModel();
        $model->delete( (int) $_GET['id']);

        header("Location: /produto");
    }
}