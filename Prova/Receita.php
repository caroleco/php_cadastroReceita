<?php


namespace Prova;


class Receita
{
    private $idreceitas, $nome, $preparo;

    /**
     * @return mixed
     */
    public function getIdreceitas()
    {
        return $this->idreceitas;
    }

    /**
     * @param mixed $idreceitas
     */
    public function setIdreceitas($idreceitas)
    {
        $this->idreceitas = $idreceitas;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getPreparo()
    {
        return $this->preparo;
    }

    /**
     * @param mixed $preparo
     */
    public function setPreparo($preparo)
    {
        $this->preparo = $preparo;
    }


}