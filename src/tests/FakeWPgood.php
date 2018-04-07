<?php
/**
 * Created by PhpStorm.
 * User: egliote
 * Date: 18.4.7
 * Time: 17.48
 */

namespace Nfq\Weather\tests;
use Nfq\Weather\Location;
use Nfq\Weather\Weather;
use Nfq\Weather\iWeatherProvider;

class FakeWPgood implements iWeatherProvider
{
    public function __construct()
    {
    }

    public function fetch(Location $location): Weather
    {
        return new Weather(5.5);
    }
}