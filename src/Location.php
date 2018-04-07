<?php

namespace Nfq\Weather;


class Location
{
    public function __construct(float $lon, float $lat)
    {
        $this->lon=$lon;
        $this->lat=$lat;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }
}