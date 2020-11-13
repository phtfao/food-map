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
}
