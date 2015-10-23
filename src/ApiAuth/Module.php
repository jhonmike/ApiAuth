<?php
/**
* @author Jhon Mike Soares <http://www.jhonmike.com.br>
* @version 1.0
*/

namespace ApiAuth;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;

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
                'ApiAuth\V1\Rest\Registration\RegistrationMapper' => function($sm) {
                    $table = 'oauth_users';
                    $dbAdapter = $sm->get('Db\\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \ApiAuth\V1\Rest\Registration\RegistrationEntity);
                    $tableGateway = new TableGateway($table, $dbAdapter, null, $resultSetPrototype);
                    $sql = new Sql($dbAdapter, $table);
                    return new \ApiAuth\V1\Rest\Registration\RegistrationMapper($tableGateway, $sql);
                }
            )
        );
    }
}
