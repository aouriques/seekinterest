<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Interest\V1\Rest\Interest;

use Interest\V1\Rest\Interest\InterestEntity as Entity;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway as ZFTableGateway;
use Zend\Hydrator\ObjectPropertyHydrator;

/**
 * Custom TableGateway instance
 *
 * Creates a HydratingResultSet seeded with an ObjectProperty hydrator and Entity instance.
 */
class InterestTableGateway extends ZFTableGateway
{
    public function __construct($table, AdapterInterface $adapter, $features = null)
    {
        $resultSet = new HydratingResultSet(new ObjectPropertyHydrator(), new Entity());
        return parent::__construct($table, $adapter, $features, $resultSet);
    }
}
