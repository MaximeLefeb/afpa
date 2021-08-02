<?php
require __DIR__ . '/vendor/autoload.php';

use Pheanstalk\Pheanstalk;
    

try {
    $pheanstalk = Pheanstalk::create('127.0.0.1');

    $pheanstalk
        ->useTube('pheanTube')
        ->put(
            json_encode(['id' => 2, 'status' => 'OK'])
        )
    ;

    echo('Envoie ok');
} catch (Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}