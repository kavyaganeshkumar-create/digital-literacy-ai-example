<?php

class neuron
{
    private array $weight;
    private float $bias;

    public function __construct()
    {
        $this->weight = [
            (2 * mt_rand() / mt_getrandmax()) - 1,
            (2 * mt_rand() / mt_getrandmax()) - 1,
            (2 * mt_rand() / mt_getrandmax()) - 1
        ];

        $this->bias = 0.0;
    }

    private function tanh(float $x): float
    {
        return tanh($x);
    }

    private function derivativetanh(float $output): float
    {
        return 1 - ($output * $output);
    }

    public function predict(array $inputs): float
    {
        if (count($inputs) != 3) {
            die("Neuron needs 3 inputs");
        }
        $sum = $this->bias;

        for ($i = 0; $i < count($inputs); $i++) {
            $sum += $inputs[$i] * $this->weight[$i];
        }

        return $this->tanh($sum);
    }

    public function train(array $traininginps, array $expectedouts, int $iterations, float $learningrate = 0.1): void
    {
        $samplecount = count($traininginps);

        for ($round = 0; $round < $iterations; $round++) {
            $adjustments = [0, 0, 0];
            $biasadjustment = 0.0;

            for ($sample = 0; $sample < $samplecount; $sample++) {
                $inputs = $traininginps[$sample];
                $expected = $expectedouts[$sample];

                $prediction = $this->predict($inputs);

                $error = $expected - $prediction;

                $delta = $error * $this->derivativetanh($prediction);

                for ($i = 0; $i < 3; $i++) {
                    $adjustments[$i] += $inputs[$i] * $delta;
                }

                $biasadjustment += $delta;
            }

            for ($i = 0; $i < 3; $i++) {
                $this->weight[$i] += $learningrate * ($adjustments[$i] / $samplecount);
            }

            $this->bias += $learningrate * ($biasadjustment / $samplecount);
        }
    }
}
