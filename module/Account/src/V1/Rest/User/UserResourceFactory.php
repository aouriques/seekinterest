<?php
namespace Account\V1\Rest\User;

use Account\V1\Rest\User\UserTableGatewayMapper as Mapper;

class UserResourceFactory
{
    public function __invoke($services)
    {
        return new UserResource($services->get(Mapper::class));
    }
}
