<?php

namespace Pdf4me\API\LiveTests;

/**
 * Optimize test class
 */
class OptimizeTest extends BasicTest
{
    /**
     * Test the use of API 'Optimize/Optimize'
     */
    public function testpdfOptimize()
    {
        $pdfOptimize = $this->client->pdf4me()->pdfOptimize(
            [
                'document'=> ['jobId' => '00000000-0000-0000-0000-000000000000',
                'name' => 'Scan-Shon-Agrmnt.pdf',
                'docData' => $this->client->getFileData('D:\xampp\htdocs\MISC\sample.pdf')
                ],
            'optimizeAction' => [
                'profile' => 'Max',
                'useProfile' => true
            ],
            'notification' => ''
            ]
        );
        $this->assertTrue(is_object($pdfOptimize), 'Should return a valid object.');
    }

    /**
     * Test the use of API 'Optimize/OptimizeByProfile'
     */
    public function testoptimizeByProfile()
    {
        $optimizePdfByProfile = $this->client->pdf4me()->optimizeByProfile(
            [
                "profile"=> "default",
                "file" => 'D:\xampp\htdocs\MISC\sample.pdf'
            ]
        );
        $this->assertTrue(is_string($optimizePdfByProfile), 'Should return a valid object.');
    }

}
