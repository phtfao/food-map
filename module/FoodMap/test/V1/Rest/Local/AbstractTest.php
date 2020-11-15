<?php

namespace FoodMap\V1\Rest\Local;

use Laminas\Stdlib\ArrayUtils;
use Laminas\ServiceManager\ServiceManager;
use Laminas\Mvc\Service\ServiceManagerConfig;
use Laminas\Test\PHPUnit\Controller\AbstractControllerTestCase;

abstract class AbstractTest extends AbstractControllerTestCase
{

    /**
     *
     * @var ServiceManager
     */
    protected static $serviceManager = null;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $config = [
            'module_listener_options' => [
                'config_cache_enabled' => false,
            ],
        ];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../../../config/application.config.php',
            $config
        ));

        $serviceManager = new ServiceManager((new ServiceManagerConfig())->toArray());
        $serviceManager->setService('ApplicationConfig', $this->getApplicationConfig());
        $serviceManager->get('ModuleManager')->loadModules();
        static::$serviceManager = $serviceManager;
    }

    public static function getServiceManager(): ServiceManager
    {
        return static::$serviceManager;
    }
}
