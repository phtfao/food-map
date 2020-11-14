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

    public function save(array $data)
    {
        $local = new LocalEntity();

        $local->setLatitude($data['latitude']);
        $local->setLongitude($data['longitude']);
        $local->setObservacao($data['observacao']);
        $local->setDtCadastro((new \DateTime())->format('d/m/Y H:i:s'));

        $this->tableGateway->insert($local->getArrayCopy());
        $local->setId($this->tableGateway->lastInsertValue);
        return $local;
    }

    public function update(int $id, array $data)
    {
        $local = $this->find($id);
        $this->validaLocalExiste($local);

        if (isset($data['latitude'])) {
            $local->setLatitude($data['latitude']);
        }

        if (isset($data['longitude'])) {
            $local->setLongitude($data['longitude']);
        }

        if (isset($data['observacao'])) {
            $local->setObservacao($data['observacao']);
        }
        $local->setDtAlteracao((new \DateTime())->format('d/m/Y H:i:s'));

        $this->tableGateway->update($local->getArrayCopy(), ['id' => $id]);
        return $local;
    }

    public function delete(int $id)
    {
        $local = $this->find($id);
        $this->validaLocalExiste($local);
        
        if ($this->tableGateway->delete(['id' => $id]))
        {
            return true;
        } else {
            throw new \Exception("Falha ao excluir Ponto de Interesse de id $id.");
        }
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
