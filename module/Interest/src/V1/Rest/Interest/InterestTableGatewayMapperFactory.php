<?php
namespace Interest\V1\Rest\Interest;

/**
 * Service factory for returning a StatusLib\TableGatewayMapper instance.
 *
 * Requires the StatusLib\TableGateway service be present in the service locator.
 */
class InterestTableGatewayMapperFactory
{
    public function __invoke($services)
    {
        $tableService = null;
        $tableMapper = null;
        $identifierName = null;
        $collectionClass = null;
        if ($services->has('config')) {
            $config = $services->get('config');
            if ( isset($config['module-db-config']) && isset($config['module-db-config'][__NAMESPACE__])) {
                $container = $config['module-db-config'][__NAMESPACE__];
                $tableService = $container['table_service'];
                $tableMapper = $container['table_mapper'];
                $identifierName = $container['entity_identifier_name'];
                $collectionClass = $container['collection_class'];
            }
        }

        return new $tableMapper($services->get($tableService), $identifierName, $collectionClass);
    }
}
