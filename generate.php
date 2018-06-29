<?php

require './vendor/autoload.php';

use League\Csv\Writer;
use Faker\Factory;

$faker = Factory::create();
$writer = Writer::createFromPath(__DIR__.'/output.csv', 'w+');
$writer->insertOne(['firstname', 'lastname', 'email', 'city', 'state', 'country', 'zipcode', 'address1']);

$counter = $argv[1] ?? 10000;

try {
    while($counter) {
        $writer->insertOne([$faker->firstName, $faker->lastName, $faker->email, $faker->city, $faker->stateAbbr, $faker->country, $faker->postcode, $faker->streetAddress]);

        --$counter;
    }
} catch (CannotInsertRecord $e) {
    print_r($e->getRecords());
    die;
}

echo 'Done'.PHP_EOL;
