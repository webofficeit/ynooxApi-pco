<?php

namespace Pdf4me\API\LiveTests;

use Pdf4me\API\HttpClient;

/**
 * Basic test class
 */
abstract class BasicTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HttpClient
     */
    protected $client;
    /**
     * @var string
     */
    protected $oAuthToken;
    /**
     * @var string
     */
    protected $oAuthAPI;
    /**
     * @var string
     */
    protected $hostname;
    

    /**
     * {@inheritdoc}
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->oAuthToken   = getenv('OAUTH_TOKEN');
        $this->authApi      = getenv('OAUTH_API');
        $this->hostname     = getenv('HostName');
        

        parent::__construct($name, $data, $dataName);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->client = new HttpClient();
        $this->client->setToken($this->oAuthToken);
    }
}
