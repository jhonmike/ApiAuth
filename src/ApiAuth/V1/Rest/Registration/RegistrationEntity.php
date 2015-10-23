<?php
/**
* @author Jhon Mike Soares <http://www.jhonmike.com.br>
* @version 1.0
*/

namespace ApiAuth\V1\Rest\Registration;

use Zend\Stdlib\Hydrator;
use ApiBase\Rest\AbstractEntity;
use ApiBase\Hydrator as BaseHydrator;

class RegistrationEntity extends AbstractEntity
{
    public $user_id;
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    
    public function toArray($password = false)
    {
        $hydrator = new Hydrator\ArraySerializable();
        $result = $hydrator->extract($this);
        if (!$password)
            unset($result['password']);

        return $result;
    }
}