<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Interest\V1\Rest\Interest;

use DomainException;

/**
 * Service factory for the TableGateway
 *
 * If the DB service does not exist, raises an error.
 *
 * Otherwise, creates a TableGateway instance with the DB service and table.
 */
class InterestTableGatewayFactory
{
    public function __invoke($services)
    {
        $db = null;
        $table = null;
        $tableService = null;
        if ($services->has('config')) {
            $config = $services->get('config');
            if ( isset($config['module-db-config']) && isset($config['module-db-config'][__NAMESPACE__])) {
                $container = $config['module-db-config'][__NAMESPACE__];
                $db = $container['adapter_name'];
                $table = $container['table_name'];
                $tableService = $container['table_service'];
            }
        }

        if (! $services->has($db)) {
            throw new DomainException(sprintf(
                'Unable to create %s due to missing "%s" service',
                $tableService,
                $db
            ));
        }

        return new $tableService($table, $services->get($db));
    }
}
