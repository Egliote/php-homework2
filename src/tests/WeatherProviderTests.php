<?php
/**
 * Created by PhpStorm.
 * User: egliote
 * Date: 18.4.6
 * Time: 23.24
 */
//declare(strict_types=1);
namespace Nfq\Weather;
use PHPUnit\Framework\TestCase;
use Nfq\Weather\YahooWP;
use Nfq\Weather\Weather;
use Nfq\Weather\Location;
use Nfq\Weather\OpenWMapP;
use Nfq\Weather\DelegatingWP;
use Nfq\Weather\tests\FakeWPbad;
use Nfq\Weather\tests\FakeWPgood;

class WeatherProviderTests extends TestCase
{

    public function testYahoo(): void
    {
        $location = new Location(54.687157, 25.279652);
        $provider = new YahooWP();
        $weather = $provider->fetch($location);
        $this->assertNotNull($weather);

        $t = $weather->getTemperature();
        echo 'Temperatura Vilniuje: '.$t;
        $this->assertGreaterThan(-25, $t);
        $this->assertLessThan(35, $t);
    }

    public function testOpenWM(): void
    {
        $apiKey="28632ef058498bb36774567456cfe912";
        $location = new Location(54.687157, 25.279652);
        $provider = new OpenWMapP($apiKey);
        $weather = $provider->fetch($location);
        $this->assertNotNull($weather);

        $t = $weather->getTemperature();
        echo 'Temperatura Vilniuje: '.$t;
        $this->assertGreaterThan(-25, $t);
        $this->assertLessThan(35, $t);
    }

    public function testDelegating(): void
    {
        $location = new Location(54.687157, 25.279652);
        $providerFakebad = new FakeWPbad();
        $providerFakegood = new FakeWPgood();
        $provider = new DelegatingWP([$providerFakebad, $providerFakegood]);
        $weather = $provider->fetch($location);
        $this->assertNotNull($weather);

        $t = $weather->getTemperature();
        $this->assertEquals(5.5, $t);
    }
}
