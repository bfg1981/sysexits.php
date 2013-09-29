<?php

error_reporting(E_ALL | E_STRICT);

require __DIR__ . '/../vendor/autoload.php';

use sdj\Sysexits;

echo 'EX_OK: ', Sysexits::EX_OK, PHP_EOL;
echo 'EX_USAGE: ', Sysexits::EX_USAGE, PHP_EOL;
echo 'exit_status(ok): ', Sysexits::exit_status('ok'), PHP_EOL;
echo 'exit_status(usage):', Sysexits::exit_status('usage'), PHP_EOL;

echo 'do_exit(usage)', PHP_EOL;
Sysexits::do_exit('usage'); // errorcode 64
