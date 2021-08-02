<?php

require __DIR__ . '/vendor/autoload.php';
require ("./models/Job.php");
require ("./controllers/readJobController.php");

use Pheanstalk\Pheanstalk;
use Phalcon\Db\Adapter\Pdo\Mysql as MysqlConnection;

try {
    $pheanstalk = Pheanstalk::create('127.0.0.1');
    $pheanstalk->watch('pheanTube');
    
    $job         = $pheanstalk->reserveWithTimeout(30);
    $jobPayload  = json_decode($job->getData(), true);

    $receivedJob = new \models\Job();
    $receivedJob
        ->setId($jobPayload["id"])
        ->setStatus($jobPayload["status"])
    ;

    $pheanstalk->touch($job);

    sleep(2);

    $controller = new readJobController();
    $controller->insert($receivedJob);

    // $pheanstalk->delete($job);
} catch(\Exception $e) {
    $pheanstalk->release($job);
}