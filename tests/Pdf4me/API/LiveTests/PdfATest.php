<?php

namespace Pdf4me\API\LiveTests;

/**
 * PdfA test class
 */
class PdfATest extends BasicTest
{
    /**
     * Test the use of API 'PdfA/PdfA'
     */
    public function testpdfA()
    {
        $pdfA = $this->client->pdf4me()->pdfA(
            [
                "document"=> [
                    'name' => 'test.pdf',
                    'docData' => $this->client->getFileData(__DIR__.'/testcase.pdf')
                ],
                "pdfAAction"=> [
                    "compliance"=> "pdfa1b"
                ]
            ]
        );
        $this->assertTrue(is_object($pdfA), 'Should return a valid object.');
    }

    /**
     * Test the use of API 'PdfA/CreatePdfA'
     */
    public function testcreatePdfA()
    {
        $createPdfAFile = $this->client->pdf4me()->createPdfA(
            [
                "pdfCompliance"=> "pdfa1b",
                "file" => __DIR__.'/testcase.pdf'
            ]
        );
        $this->assertTrue(is_string($createPdfAFile), 'Should return a valid object.');
    }

}
