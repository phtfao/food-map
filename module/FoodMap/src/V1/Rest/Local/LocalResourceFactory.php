<?php
namespace FoodMap\V1\Rest\Local;

class LocalResourceFactory
{
    public function __invoke($services)
    {
        return new LocalResource();
    }
}
