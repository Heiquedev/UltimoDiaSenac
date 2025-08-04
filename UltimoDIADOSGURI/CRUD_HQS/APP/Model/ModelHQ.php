<?php class ModelHQ
{
    public $id, $nome, $genero, $autor, $capitulos, $rows;

    public function getAllRows()
    {
        include "DAO/DAOHQ.php"; // conexao com a DAO

        $dao = new DAOHQ();
        $this->rows = $dao->select();
    }

    public function save()
    {
        include "DAO/HQDAO.php"; // conexao com a DAO

        $dao = new DAOHQ();

        if (empty($this->id)) {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getById(int $id)
    {
        include "DAO/DAOHQ.php";

        $dao = new DAOHQ();
        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new ModelHQ();

        /*if ($obj) {
                    return $obj;
            } else {
                    return new ModelHQ();
            }*/

        return $dao->selectById($id);
    }

    public function delete(int $id)
    {
        include "DAO/DAOHQ.php"; // conexao com a DAO
        $dao = new DAOHQ();
        $dao->delete($id);
    }
}
?>