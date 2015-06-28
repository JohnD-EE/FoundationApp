<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

$configFile = dirname(__FILE__) . sprintf("/../env-settings/%s.ini", APP_ENV);
$settings = parse_ini_file($configFile, true);

$settings['date_format'] = 'Y-m-d';
$settings['datetime_format'] = 'Y-m-d H:m:i';
$dbParams = &$settings['db-connection'];

$buildini = 'config/build.ini';

$build = [];
if(is_file($buildini)) {
    $build = parse_ini_file($buildini, true);
}

return array(
    'static_salt' => '32423+fg*( // ~#uWRExcxbNtmHQ)', //- this is set is 2 places, do not change!
    'settings'    => $settings,
    'build'       => $build,
    'devTier'     => APP_ENV,
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host'     => $dbParams['server'],
                    'port'     => $dbParams['port'],
                    'user'     => $dbParams['user'],
                    'password' => $dbParams['password'],
                    'dbname'   => $dbParams['db']
                )
            )
        )
    ),
    'session' => array(
        'config' => array(
            'class' => 'Zend\Session\Config\SessionConfig',
            'options' => array(
                'cookie_httponly'     => true
            ),
        ),
    )
);
