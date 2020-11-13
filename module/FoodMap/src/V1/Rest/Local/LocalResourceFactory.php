<?php
namespace FoodMap\V1\Rest\Local;

class LocalResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get(LocalMapper::class);
        return new LocalResource($mapper);
    }
}
