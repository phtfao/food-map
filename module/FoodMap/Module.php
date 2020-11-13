<?php
namespace FoodMap;

use Laminas\ApiTools\Provider\ApiToolsProviderInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use FoodMap\V1\Rest\Local\LocalMapper;
use FoodMap\V1\Rest\Local\LocalEntity;

class Module implements ApiToolsProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'LocalTableGeteway' => function ($serviceManager) {
                    $dbAdapter = $serviceManager->get('DBFoodMap');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new LocalEntity());
                    return new TableGateway('local', $dbAdapter, null, $resultSetPrototype);
                },
                LocalMapper::class => function ($serviceManager) {
                    $tableGateway = $serviceManager->get('LocalTableGeteway');
                    return new LocalMapper($tableGateway);
                }
            ]
        ];
    }

    public function getAutoloaderConfig()
    {
        return [
            'Laminas\ApiTools\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
}
