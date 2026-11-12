<?php
require_once '../backend/singleneuron.php';

$neuron = new neuron();
$rawdata = file_get_contents('aiconfiguration.js');
$data = json_decode($rawdata, true);

$traininginp = $data['traininginp'];
$trainingout = $data['trainingout'];
$bias = $data['bias'];

$neuron->setBias($bias);
$neuron->train($traininginp, $trainingout, 50000000000000);

echo json_encode([
    'bias' => $neuron->getBias()
]);