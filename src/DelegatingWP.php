<?php

namespace Nfq\Weather;

use Throwable;

class DelegatingWP implements iWeatherProvider
{
    private $providers;
    /*@param iWeatherProvider[] $providers;*/

    public function __construct(array $providers)
    {
        $this->providers = $providers;
    }

    public function fetch(Location $location): Weather
    {
        foreach ($this->providers as $providerIterator)
        {
            try
            {
                $weather = $providerIterator->fetch($location);
                return $weather;
            }
            catch (Throwable $ex)
            {
                // This provider failed. Log error and let's try new one
                error_log(sprintf('Failed to get data. Message: %s', $ex->getMessage()));
            }
        }
        throw new WPException('All providers failed to respond');
    }
}
