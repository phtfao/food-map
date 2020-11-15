<?php
namespace FoodMap\V1\Rest\Local;

use Laminas\Hydrator;

class LocalEntity
{
    public $id;
    public $latitude;
    public $longitude;
    public $observacao;
    public $dt_cadastro;
    public $dt_alteracao;

    public function __construct($data = [])
    {
        $this->exchangeArray($data);
    }

    public function getArrayCopy()
    {
        return [
            'id' => $this->getId(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'observacao' => $this->getObservacao(),
            'dt_cadastro' => $this->getDtCadastro(),
            'dt_alteracao' => $this->getDtAlteracao(),
        ];
    }

    public function exchangeArray(array $data)
    {
        (new Hydrator\ClassMethodsHydrator)->hydrate($data, $this);
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getObservacao()
    {
        return $this->observacao;
    }

    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
        return $this;
    }

    public function getDtCadastro()
    {
        return $this->dt_cadastro;
    }

    public function setDtCadastro($dt_cadastro)
    {
        $this->dt_cadastro = $dt_cadastro;
        return $this;
    }

    public function getDtAlteracao()
    {
        return $this->dt_alteracao;
    }

    public function setDtAlteracao($dt_alteracao)
    {
        $this->dt_alteracao = $dt_alteracao;
        return $this;
    }
}
