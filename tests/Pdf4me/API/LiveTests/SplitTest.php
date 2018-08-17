<?php

namespace Pdf4me\API\LiveTests;

/**
 * Split test class
 */
class SplitTest extends BasicTest
{
    /**
     * Test the use of API 'Split/Split'
     */
    public function testsplitPdf()
    {
        $splitPdf = $this->client->pdf4me()->split(
            [
                "document"=> [
                    'name' => 'test.pdf',
                        'docData' => $this->client->getFileData(__DIR__.'/testcase.pdf')
                ],
                "splitAction"=> [
                    "splitAfterPage"=> 1
                ],
                "notification"=> [
                    "getNotification"=> false
                ]
            ]
        );
        $this->assertTrue(is_object($splitPdf), 'Should return a valid object.');
    }

    /**
     * Test the use of API 'Split/SplitByPageNr'
     */
    public function testsplitByPageNr()
    {
        $splitPdfByPageNr = $this->client->pdf4me()->splitByPageNr(
            [
                "pageNr"=> 1,
                "file" => __DIR__.'/testcase.pdf'
            ]
        );
        $this->assertTrue(is_string($splitPdfByPageNr), 'Should return a valid object.');
    }

}
