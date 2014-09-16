<?php

$GLOBALS['THRIFT_ROOT'] = dirname(__FILE__) . '/src';

require_once $GLOBALS['THRIFT_ROOT'] . '/packages/hive_service/TCLIService.php';
require_once $GLOBALS['THRIFT_ROOT'] . '/transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'] . '/transport/TSaslClientTransport.php';
require_once $GLOBALS['THRIFT_ROOT'] . '/protocol/TBinaryProtocol.php';

/**
 * example
 * @author dryoung
 * @version 0.1 13-12-2 20:19
 */

//hive2server`host and port
$transport = new TSaslClientTransport(new TSocket('localhost', 10000));

$protocol = new TBinaryProtocol($transport);

$client = new TCLIServiceClient($protocol);

//open session
$openSessionReq = new TOpenSessionReq(array(
    'client_protocol' => 0
));
$openSessionResp = $client->OpenSession($openSessionReq);

//print the sessionHandle
var_dump($openSessionResp->sessionHandle);
