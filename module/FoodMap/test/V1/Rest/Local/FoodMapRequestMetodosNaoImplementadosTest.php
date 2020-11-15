<?php

namespace FoodMap\V1\Rest\Local;

use Laminas\Stdlib\ArrayUtils;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * @group request
 */
class FoodMapRequestMetodosNaoImplementadosTest extends AbstractRequestTest
{
    public function setUp(): void
    {
        parent::setUp();
        $this->autenticar();
        $this->addHeaders(['Accept' => 'application/json']);
    }

    public function testTentarExcluirListaDeLocaisDeveRetornarStatus405()
    {
        $this->addHeaders(['Content-Type' => 'application/json']);

        $paramns = [
            [
              'id' => '12'
            ],
            [
              'latitude' => '13'
            ],
        ];

        $this->dispatch('/food-map/local', 'DELETE', $paramns);
        $this->assertResponseStatusCode(405);
    }

    public function testTentarAlteracaoParcialDeListaDeLocaisDeveRetornarStatus405()
    {
        $this->addHeaders(['Content-Type' => 'application/json']);

        $paramns = [
            0 => [
              'latitude' => '12',
              'longitude' => '12',
            ],
            1 => [
              'latitude' => '13',
              'longitude' => '13',
            ],
        ];

        $this->getRequest()->setContent(json_encode($paramns));
        $this->dispatch('/food-map/local', 'PATCH');
        $this->assertResponseStatusCode(405);
    }

    public function testTentarAlteracaoTotalDeListaDeLocaisDeveRetornarStatus405()
    {
        $paramns = [
            [
              'id' => '1',
              'latitude' => '100',
              'longitude' => '100',
              'observacao' => ''
            ],
            [
              'id' => '2',
              'latitude' => '-100',
              'longitude' => '-100',
              'observacao' => ''
            ],
        ];

        $this->addHeaders(['Content-Type' => 'application/json']);
        $this->getRequest()->setContent(json_encode($paramns));
        $this->dispatch('/food-map/local', 'PUT');
        $this->assertResponseStatusCode(405);
    }

    /**
     * @group a
     */
    public function testTentarAlteracaoTotalDeLocalDeveRetornarStatus405()
    {
        $paramns = [
            'id' => '1',
            'latitude' => '100',
            'longitude' => '100',
            'observacao' => ''
        ];

        $this->addHeaders(['Content-Type' => 'application/json']);
        $this->getRequest()->setContent(json_encode($paramns));
        $this->dispatch('/food-map/local/1', 'PUT');
        $this->assertResponseStatusCode(405);
    }
}
