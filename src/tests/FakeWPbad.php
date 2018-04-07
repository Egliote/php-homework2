<?php
/**
 * Created by PhpStorm.
 * User: egliote
 * Date: 18.4.7
 * Time: 16.15
 */

namespace Nfq\Weather\tests;
use Nfq\Weather\Weather;
use Nfq\Weather\Location;
use Nfq\Weather\iWeatherProvider;
use Exception;

class FakeWPbad implements iWeatherProvider
{
    public function __construct()
    {
    }

    public function fetch(Location $location): Weather
    {
        throw new Exception('Broken');
    }
}