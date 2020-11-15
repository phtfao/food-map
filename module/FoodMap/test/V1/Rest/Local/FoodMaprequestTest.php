<?php

namespace FoodMap\V1\Rest\Local;

use Laminas\Http\Client;
use Laminas\ApiTools\ContentNegotiation\Request as LaminasRequest;

/**
 * @group request
 */
class FoodMaprequestTest extends AbstractRequestTest
{
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
        $this->lastInsertId = $content->id;
    }

    /**
     * @group x
     */
    public function testExcluirLocalAutenticadoDeveRetornarStatus204()
    {
        $paramns = [
            'latitude' => '-15.258741',
            'longitude' => '-15.248521',
            'observacao' => '',
        ];
        $request = new LaminasRequest();
        $token = $this->autenticar();
        $headers = $request->getHeaders();
        $headers->addHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Basic {$token}"
        ]);
        $request->setHeaders($headers);

        $request->setMethod('POST');
        $request->setUri('http://localhost:8080/food-map/local');
        $request->setContent(json_encode($paramns));

        $client = new Client();
        $response = $client->send($request);

        $contentJson = $response->getContent();
        $content = json_decode($contentJson);

        $this->dispatch("/food-map/local/{$content->id}", 'DELETE');
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
