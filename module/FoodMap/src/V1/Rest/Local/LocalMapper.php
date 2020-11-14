<?php

namespace FoodMap\V1\Rest\Local;

use Laminas\Db\TableGateway\TableGateway;

class LocalMapper
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultset = $this->tableGateway->select();
        return $resultset;
    }

    public function fetch(int $id)
    {
        $local = $this->find($id);
        $this->validaLocalExiste($local);
        return $local;
    }

    public function find(int $id)
    {
        $rowset = $this->tableGateway->select(['id' => $id]);
        return $rowset->current();
    }

    public function validaLocalExiste($local)
    {
        if (!($local instanceof LocalEntity)) {
            throw new \Exception('Ponto de Interesse não encontrado.', 404);
        }
        return true;
    }
}
