<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database

	'connectionString' => 'mysql:host=localhost;dbname=hdm0580594_db',
    //'connectionString' => 'mysql:host=localhost;dbname=shop',
	'emulatePrepare' => true,
	'username' => 'root',
    //'username' => 'root',
    'password' => 'root123',
    //'password' => 'root123',
	'charset' => 'utf8',
    'tablePrefix'=>'lzz_',
);
