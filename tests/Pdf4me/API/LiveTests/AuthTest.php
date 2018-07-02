<?php

namespace Pdf4me\API\LiveTests;

/**
 * Auth test class
 */
class AuthTest extends BasicTest
{
    /**
     * Test the use of basic test
     */
    public function testBasicAuth()
    {
        
        $job = $this->client->pdf4me()->getDocuments([
            'jobId'=> '00000000-0000-0000-0000-000000000000'
            ]);
        $this->assertTrue(is_object($job), 'Should return a valid object.');
        
        
    }

    /**
     * Test the use of basic test
     */
    // public function testOAuth()
    // {
    //     $this->client->setAuth('oauth', ['token' => $this->oAuthToken]);
    //     $users = $this->client->users()->findAll();
    //     $this->assertTrue(isset($users->users), 'Should return a valid user object.');
    // }
}
