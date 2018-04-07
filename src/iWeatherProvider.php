<?php

namespace Nfq\Weather;

interface iWeatherProvider
{
    public function fetch(Location $location): Weather;
}
