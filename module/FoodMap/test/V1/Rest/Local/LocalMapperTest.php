<?php

namespace FoodMap\V1\Rest\Local;

use Laminas\Db\ResultSet\ResultSet;

/**
 * @group unitario
 */
class LocalMapperTest extends AbstractTest
{

    /**
     *
     * @var LocalMapper
     */
    public $mapper;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mapper = $this->getServiceManager()->get(LocalMapper::class);
    }

    public function testFetchAll()
    {
        $resultset = $this->mapper->fetchAll();
        $this->assertInstanceOf(ResultSet::class, $resultset);

        $localEntity = $resultset->current();
        $this->assertInstanceOf(LocalEntity::class, $localEntity);
    }

    public function testFetch()
    {
        $arrData = [
            'latitude' => '-15.258741',
            'longitude' => '-15.248521',
            'observacao' => 'Lagoa do Bispo'
        ];

        $localEntity = $this->mapper->save($arrData);
        $localBusca = $this->mapper->fetch($localEntity->getId());

        $this->assertInstanceOf(LocalEntity::class, $localBusca);
        $this->assertEquals($localBusca->getObservacao(), $localEntity->getObservacao());
    }

    public function testFetchLocalInexistente()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Ponto de Interesse não encontrado.');

        $localBusca = $this->mapper->fetch(999999);
    }

    public function testSave()
    {
        $arrData = [
            'latitude' => '-15.258741',
            'longitude' => '-15.248521',
            'observacao' => 'Lagoa do Bispo'
        ];


        $localEntity = $this->mapper->save($arrData);
        $this->assertInstanceOf(LocalEntity::class, $localEntity);
        $this->assertObjectHasAttribute('id', $localEntity);
        $this->assertEquals($arrData['observacao'], $localEntity->getObservacao());
    }

    public function testUpdate()
    {
        $arrData = [
            'latitude' => '-15.258741',
            'longitude' => '-15.248521',
            'observacao' => 'Lagoa do Bispo'
        ];

        $localEntity = $this->mapper->save($arrData);

        $arrDataAlteracao = [
            'latitude' => '-15.248521',
            'longitude' => '-15.258741',
            'observacao' => 'Lagoa da Pambulha'
        ];

        $localAlterado = $this->mapper->update($localEntity->getId(), $arrDataAlteracao);

        $this->assertInstanceOf(LocalEntity::class, $localAlterado);
        $this->assertNotEquals($localAlterado->getObservacao(), $localEntity->getObservacao());
        $this->assertEquals($localAlterado->getObservacao(), $arrDataAlteracao['observacao']);
    }

    public function testDelete()
    {
        $arrData = [
            'latitude' => '-15.258741',
            'longitude' => '-15.248521',
            'observacao' => 'Lagoa do Bispo'
        ];

        $localEntity = $this->mapper->save($arrData);
        $booExcluido = $this->mapper->delete($localEntity->getId());
        $this->assertTrue($booExcluido);
    }

    public function testDeleteLocalInexistente()
    {
        $arrData = [
            'latitude' => '-15.258741',
            'longitude' => '-15.248521',
            'observacao' => 'Lagoa do Bispo'
        ];

        $localEntity = $this->mapper->save($arrData);
        $booExcluido = $this->mapper->delete($localEntity->getId());

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Ponto de Interesse não encontrado.');
        $this->mapper->fetch($localEntity->getId());
    }
}
