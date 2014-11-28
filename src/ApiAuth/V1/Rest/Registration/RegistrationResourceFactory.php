<?php
/**
* @author Jhon Mike Soares <http://www.jhonmike.com.br>
* @version 1.0
*/

namespace ApiAuth\V1\Rest\Registration;

class RegistrationResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('ApiAuth\V1\Rest\Registration\RegistrationMapper');
        return new RegistrationResource($mapper);
    }
}
