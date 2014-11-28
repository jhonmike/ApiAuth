<?php
namespace ApiAuth\V1\Rest\Registration;

class RegistrationResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('ApiAuth\V1\Rest\Registration\RegistrationMapper');
        return new RegistrationResource($mapper);
    }
}
