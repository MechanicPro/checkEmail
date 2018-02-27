#!/usr/bin/php
<?php
/**
 * Created by PhpStorm.
 * User: MechanicPro
 * Date: 17.02.2018
 * Time: 14:23
 */

include 'calc.php';

try {
    if (isset($argv[1]))
        $file = $argv[1];
    else
        throw new Exception('no file name entered');

    if (!file_exists($file))
        throw new Exception('file already exists');

    $file = file($file);

    $clc = new Calc($file);
    $result = $clc->getResult();

    foreach ($result as $keyItem => $resItem) {
        echo "\nNAME DOMEN: " . $keyItem . "\n";
        echo "COUNT: " . $resItem . "\n";
    }
} catch (Exception $e) {
    echo "\n Error: " . $e->getMessage() . "\n";
}