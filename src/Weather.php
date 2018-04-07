<?php
namespace Nfq\Weather;

class Weather
{
    private $temperature;

    public function __construct(float $temperature)
    {
        $this->temperature = $temperature;
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature)
    {
        $this->temperature = $temperature;
    }
}