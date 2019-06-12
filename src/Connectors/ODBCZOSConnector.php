<?php

namespace Thalfm\Database\DB2\Connectors;

/**
 * Class ODBCZOSConnector
 *
 * @package Thalfm\Database\DB2\Connectors
 */
class ODBCZOSConnector extends ODBCConnector
{
    /**
     * @param array $config
     *
     * @return string
     */
    protected function getDsn(array $config)
    {
        $dsnParts = [
            "odbc:DRIVER=$driverName",
            'Database=%s',
            'Hostname=%s',
            'Port=%s',
            'Protocol=TCPIP',
            'Uid=%s',
            'Pwd=%s',
            '', // Just to add a semicolon to the end of string
        ];

        $dsnConfig = [
            $config['database'],
            $config['host'],
            $config['port'],
            $config['username'],
            $config['password'],
        ];

        return sprintf(implode(';', $dsnParts), ...$dsnConfig);
    }
}
