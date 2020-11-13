<?php
namespace FoodMap\V1\Rest\Local;

class LocalEntity
{
    public $id;
    public $latitude;
    public $longitude;
    public $observacao;
    public $dtCadastro;
    public $usuarioCadastro;
    public $dtAlteracao;
    public $usuarioAlteracao;

    public function getArrayCopy()
    {
        return [
            'id'                => $this->id,
            'latitude'          => $this->latitude,
            'longitude'         => $this->longitude,
            'observacao'        => $this->observacao,
            'dtCadastro'        => $this->dtCadastro,
            'usuarioCadastro'   => $this->usuarioCadastro,
            'dtAlteracao'       => $this->dtAlteracao,
            'usuarioAlteracao'  => $this->usuarioAlteracao,
        ];
    }

    public function exchangeArray(array $array)
    {
		$this->id                   = $array['id'];
		$this->latitude         = $array['latitude'];
		$this->longitude        = $array['longitude'];
		$this->observacao       = $array['observacao'];
		$this->dtCadastro       = $array['dtCadastro'];
		$this->usuarioCadastro  = $array['usuarioCadastro'];
		$this->dtAlteracao      = $array['dtAlteracao'];
		$this->usuarioAlteracao = $array['usuarioAlteracao'];
    }

}
