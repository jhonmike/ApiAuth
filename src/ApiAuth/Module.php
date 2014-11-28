<?php
namespace ApiAuth;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'ZF\Apigility\Autoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'RegistrationTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Db\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \ApiAuth\V1\Rest\Registration\RegistrationEntity);
                    return new TableGateway('oauth_users', $dbAdapter, null, $resultSetPrototype);
                },
                'ApiAuth\V1\Rest\Registration\RegistrationMapper' => function($sm) {
                    $tableGateway = $sm->get('RegistrationTableGateway');
                    return new \ApiAuth\V1\Rest\Registration\RegistrationMapper($tableGateway);
                },
            )
        );
    }
}
