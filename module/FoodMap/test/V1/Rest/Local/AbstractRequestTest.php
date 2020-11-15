<?php

namespace FoodMap\V1\Rest\Local;

use Laminas\Stdlib\ArrayUtils;
use Laminas\Http\Headers;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

abstract class AbstractRequestTest extends AbstractHttpControllerTestCase
{
    /**
     *
     * @var Headers
     */
    public $headers = null;

    public function setUp(): void
    {
        $config = [
            'module_listener_options' => [
                'config_cache_enabled' => false,
            ],
        ];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../../../config/application.config.php',
            $config
        ));

        parent::setUp();
    }

    public function getHeaders(): Headers
    {
        if (! $this->headers) {
            $headers = $this->getRequest()->getHeaders();
            $this->headers = $headers;
        }
        return $this->headers;
    }

    public function addHeaders(array $arrHeaders)
    {
        $headers = $this->getHeaders();
        foreach ($arrHeaders as $key => $value) {
            $headers->addHeaderLine($key, $value);
        }
    }

    public function autenticar($login = 'teste', $senha = 'teste')
    {
        $token = sprintf('%s', base64_encode(sprintf('%s:%s', $login, $senha)));

        $arrHeaders = [
            'Authorization' => "Basic {$token}"
        ];

        $this->addHeaders($arrHeaders);

        return $token;
    }
}
