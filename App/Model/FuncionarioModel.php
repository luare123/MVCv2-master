<?php
namespace App\Model;
use App\DAO\FuncionarioDAO;


class FuncionarioModel extends Model
{
    public $id, $nome, $salario, $cargo;

    public function save()
    {
        include 'DAO/FuncionarioDAO.php';

        $dao = new FuncionarioDAO();


        if($this->id == null) 
        {
            $dao->insert($this);

        } else {
            $dao->update($this);
        }
    }

    public function getAllRows()
    {
        include 'DAO/FuncionarioDAO.php';
        $dao = new FuncionarioDAO();
        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/FuncionarioDAO.php';
        
        $dao = new FuncionarioDAO();
        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new FuncionarioModel();
    }

    public function delete(int $id)
    {
        include 'DAO/FuncionarioDAO.php';
        $dao = new FuncionarioDAO();
        $dao->delete($id);
    }
}