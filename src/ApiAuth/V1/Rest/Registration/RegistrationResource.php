<?php
/**
* @author Jhon Mike Soares <http://www.jhonmike.com.br>
* @version 1.0
*/

namespace ApiAuth\V1\Rest\Registration;

use ApiBase\Rest\AbstractResource;

class RegistrationResource extends AbstractResource
{
    public function __construct($mapper)
    {
        $this->mapper = $mapper;
        $this->entity = 'ApiAuth\V1\Rest\Registration\RegistrationEntity';
    }
}