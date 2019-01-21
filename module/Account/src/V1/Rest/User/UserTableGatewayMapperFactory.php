<?php
namespace Account\V1\Rest\User;

/**
 * Service factory for returning a StatusLib\TableGatewayMapper instance.
 *
 * Requires the StatusLib\TableGateway service be present in the service locator.
 */
class UserTableGatewayMapperFactory
{
    public function __invoke($services)
    {
        $tableService = null;
        $tableMapper = null;
        if ($services->has('config')) {
            $config = $services->get('config');
            if ( isset($config['module-db-config']) && isset($config['module-db-config'][__NAMESPACE__])) {
                $container = $config['module-db-config'][__NAMESPACE__];
                $tableService = $container['table_service'];
                $tableMapper = $container['table_mapper'];
            }
        }

        return new $tableMapper($services->get($tableService));
    }
}
