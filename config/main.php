<?php 
// 
return array(
    'db' => array(
        'enableSlaves' => true,
        'masterConfig' => array(
            'username' => 'developer',
            'password' => 'zhangyoutianxia&2015',
            'attributes' => array(
                PDO::ATTR_TIMEOUT => 10,
            )
        ),
        'masters' => array(
            array('dsn' => 'mysql:host=192.168.0.111;dbname=zplay_basic_data'),
            array('dsn' => 'mysql:host=192.168.0.111;dbname=zplay_basic_data')
        ),
        'slaveConfig' => array(
            'username' => 'developer',
            'password' => 'zhangyoutianxia&2015',
            'attributes' => array(
                PDO::ATTR_TIMEOUT => 10,
            )
        ),
        'slaves' => array(
            array('dsn' => 'mysql:host=192.168.0.111;dbname=zplay_basic_data'),
            array('dsn' => 'mysql:host=192.168.0.111;dbname=zplay_basic_data'),
            array('dsn' => 'mysql:host=192.168.0.111;dbname=zplay_basic_data')
        )
    ),
);
