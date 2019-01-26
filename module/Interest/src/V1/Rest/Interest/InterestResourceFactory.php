<?php
namespace Interest\V1\Rest\Interest;

use \Interest\V1\Rest\Interest\InterestTableGatewayMapper as Mapper;

class InterestResourceFactory
{
    public function __invoke($services)
    {
        return new InterestResource($services->get(Mapper::class));
    }
}
