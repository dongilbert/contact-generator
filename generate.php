<?php

require './vendor/autoload.php';

use League\Csv\Writer;
use Faker\Factory;

$args = $argv;
unset($args[0]);
$toGenerate = array_shift($args);
$columns = array_values($args);

if (empty($columns)) {
    $columns = ['firstName', 'lastName', 'email', 'city', 'state', 'country', 'postcode', 'streetAddress'];
}

$faker = Factory::create();
$writer = Writer::createFromPath(__DIR__.'/output.csv', 'w+');
$writer->insertOne($columns);

$counter = $toGenerate ?? 10000;

try {
    while($counter) {
        $row = [];

        foreach ($columns as $col) {
            $row[] = $faker->$col;
        }

        $writer->insertOne($row);

        --$counter;
    }
} catch (CannotInsertRecord $e) {
    print_r($e->getRecords());
    die;
}

echo 'Done'.PHP_EOL;
