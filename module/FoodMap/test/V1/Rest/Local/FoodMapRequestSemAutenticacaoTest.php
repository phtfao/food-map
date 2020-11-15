<?php

namespace FoodMap\V1\Rest\Local;

/**
 * @group request
 */
class FoodMapRequestSemAutenticacaoTest extends AbstractRequestTest
{
    public function setUp(): void
    {
        parent::setUp();
        $this->addHeaders(['Accept' => 'application/json']);
    }

    public function testTentarCadastrarLocalSemAutenticarDeveRetornarStatus403()
    {
        $this->dispatch('/food-map/local', 'POST');
        $this->assertResponseStatusCode(403);
    }

    public function testTentarExcluirLocalUnicoSemAutenticarDeveRetornarStatus403()
    {
        $this->dispatch('/food-map/local/1', 'DELETE');
        $this->assertResponseStatusCode(403);
    }

    public function testTentarExcluirListaDeLocaisSemAutenticarDeveRetornarStatus403()
    {
        $this->dispatch('/food-map/local', 'DELETE');
        $this->assertResponseStatusCode(403);
    }

    public function testTentarRecuperarLocalUnicoSemAutenticarDeveRetornarStatus403()
    {
        $this->dispatch('/food-map/local/1', 'GET');
        $this->assertResponseStatusCode(403);
    }

    public function testTentarRecuperarListaDeLocaisSemAutenticarDeveRetornarStatus403()
    {
        $this->dispatch('/food-map/local', 'GET');
        $this->assertResponseStatusCode(403);
    }

    public function testTentarAlteracaoParcialDeLocalSemAutenticarDeveRetornarStatus403()
    {
        $this->dispatch('/food-map/local/1', 'PATCH');
        $this->assertResponseStatusCode(403);
    }

    public function testTentarAlteracaoParcialDeListaDeLocaisSemAutenticarDeveRetornarStatus403()
    {
        $this->dispatch('/food-map/local', 'PATCH');
        $this->assertResponseStatusCode(403);
    }

    public function testTentarAlteracaoTotalDeLocalSemAutenticarDeveRetornarStatus403()
    {
        $this->dispatch('/food-map/local/1', 'PUT');
        $this->assertResponseStatusCode(403);
    }

    public function testTentarAlteracaoTotalDeListaDeLocaisSemAutenticarDeveRetornarStatus403()
    {
        $this->dispatch('/food-map/local', 'PUT');
        $this->assertResponseStatusCode(403);
    }
}
