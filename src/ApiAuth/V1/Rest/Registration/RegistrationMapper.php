<?php
/**
* @author Jhon Mike Soares <http://www.jhonmike.com.br>
* @version 1.0
*/

namespace ApiAuth\V1\Rest\Registration;

use Zend\Db\TableGateway\TableGateway;
use ApiBase\Rest\AbstractMapper;
use Zend\Crypt\Password\Bcrypt;

class RegistrationMapper extends AbstractMapper
{
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function save($entity)
	{
		$id = (int) $entity->user_id;

		$bcrypt = new Bcrypt();
		$entity->password = $bcrypt->create($entity->password);

		if ($id === 0) {
			$res = $this->tableGateway->insert($entity->toArray());
			$entity->user_id = $this->tableGateway->lastInsertValue;
		} else {
			if ($this->fetchOne($id)) {
				$res = $this->tableGateway->update($entity->toArray(), array('id' => $id));
			}
		}
		return $entity->toArray();
	}
}