<?php
require_once '../backend/singleneuron.php';

$neuron = new neuron();
$rawdata = file_get_contents('aiconfiguration.js');
$data = json_decode($rawdata, true);

$traininginp = $data['traininginp'];
$trainingout = $data['trainingout'];
$bias = $data['bias'];

foreach($traininginp as $input) {
    $neuron->train($input[0], $input[1], $input[2]);
}