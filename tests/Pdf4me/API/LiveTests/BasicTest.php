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
    protected $clientId;
    /**
     * @var string
     */
    protected $secretKey;
    /**
    * @var string
    */
    protected $accessType;
    /**
    * @var string
    */
    protected $authurl;

    /**
     * {@inheritdoc}
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->oAuthToken   = getenv('OAUTH_TOKEN');
        $this->clientId     = getenv('ClientId');
        $this->secretKey    = getenv('SecretKey');
        $this->accessType   = getenv('AccessType');
        $this->authurl      = getenv('OAUTH_URL');
        $this->apischema    = getenv('ApiSchema');
        $this->apihost      = getenv('ApiHost');
        

        parent::__construct($name, $data, $dataName);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->client = new HttpClient($this->apischema,$this->apihost);
        if($this->accessType=='token') {
            $this->client->setToken($this->oAuthToken);
        }
        else {
            $this->client->setAuthHeader($this->clientId, $this->secretKey, $this->authurl);
        }
        
    }
}
