<?php

namespace FoodMap\V1\Rest\Local;

use Laminas\Http\Client;
use Laminas\ApiTools\ContentNegotiation\Request as LaminasRequest;

/**
 * @group request
 */
class FoodMaprequestTest extends AbstractRequestTest
{
    public static $lastInsertId;

    public static function setUpBeforeClass(): void
    {
        self::$lastInsertId = null;
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->autenticar();
        $this->addHeaders(['Accept' => 'application/json']);
    }

    public function testCadastrarLocaisAutenticadoDeveRetornarStatus201()
    {
        $paramns = [
            'latitude' => '-15.258741',
            'longitude' => '-15.248521',
            'observacao' => '',
        ];
        $this->dispatch('/food-map/local', 'POST', $paramns);
        $this->assertResponseStatusCode(201);

        $contentJson = $this->getResponse()->getContent();
        $this->assertJson($contentJson);

        $content = json_decode($contentJson);
        $this->assertObjectHasAttribute('id', $content);
        self::$lastInsertId = $content->id;
    }

    public function testExcluirLocalAutenticadoDeveRetornarStatus204()
    {
        $this->dispatch('/food-map/local/' . self::$lastInsertId, 'DELETE');
        $this->assertResponseStatusCode(204);
    }

    public function testExcluirLocalInexistenteAutenticadoDeveRetornarStatus404()
    {
        $this->dispatch("/food-map/local/99999", 'DELETE');
        $this->assertResponseStatusCode(404);
    }

    public function testListarLocaisAutenticadoDeveRetornarStatus200()
    {
        $this->dispatch('/food-map/local', 'GET');
        $this->assertResponseStatusCode(200);
    }

    public function testRecuperarLocalAutenticadoDeveRetornarStatus200()
    {
        $this->dispatch('/food-map/local/18', 'GET');
        $this->assertResponseStatusCode(200);
    }

    public function testAlterarLocalAutenticadoDeveRetornarStatus200()
    {
        $paramns = [
            'latitude' => '-15.258741',
            'longitude' => '-15.248521',
            'observacao' => '',
        ];

        $this->addHeaders(['Content-Type' => 'application/json']);
        $this->getRequest()->setContent(json_encode($paramns));
        $this->dispatch('/food-map/local/18', 'PATCH');
        $this->assertResponseStatusCode(200);
    }

}
