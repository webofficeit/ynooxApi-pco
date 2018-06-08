# Ynoox Document PHP API Client Library #


## API Client Version

This is the poc version of our PHP API client.

## API version support

This client **only** supports Ynoox's API .

## Requirements
* PHP 5.5+

## Installation

The Ynoox PHP API client can be installed using [Composer](https://packagist.org/packages/ynooxpdf4me/ynooxpdf4me_api_client_php).

### Composer

To install run `composer require ynooxpdf4me/ynooxpdf4me_api_client_php:"dev-master"`


## Configuration

Configuration is done through an instance of `Ynooxpdf4me\API\HttpClient`.
The block is mandatory and if not passed, an error will be thrown.

``` php
// load Composer
require 'vendor/autoload.php';

use Ynooxpdf4me\API\HttpClient as Ynooxpdf4meAPI;

$client = new Ynooxpdf4meAPI();

// using token for Authentication
$token     = "6fghwiIBWbGkBMo1mRDMuVwkw1EPsNhjdS"; // replace this with your token
$client->setToken($token);

// using clientid and secretkey for Authentication
$clientid = 'edghj@-gkdv-fgffg#-hsokl-fg@ghn'; // replace this with your clientid
$secretkey = 'dgf4567@dfb'; // replace this with your secretkey
$client->setAuthHeader($clientid,$secretkey);
```

## Usage

### Basic Operations

``` php
//post dropDocument
$dropDocument = $client->pdf4me()->dropDocument([

	"notification"=> [
		"getNotification"=> true,
		"connectionId"=> "string"
	],
	"jobId"=> "string",
	"documentId"=> "string",
	"userId"=> "string",
	"url"=> "string",
	"document"=> "string",
	"fileName"=> "string",
	"cloudStorageProvider"=> "undef",
	"cloudStorageFiles"=> [
		"string"
	],
	"cloudStorageFilesDesc"=> "string",
	"getNotified"=> true,
	"connectionId"=> "string",
	"userFingerprint"=> [
		"ipAdress"=> "string",
		"browser"=> "string"
	]

    ]);

print_r($dropDocument);

//post produceDocuments

$produceDocuments = $client->pdf4me()->produceDocuments([
            "jobId"=> "00000000-0000-0000-0000-000000000000",
            'documents'=> ['jobId' => '00000000-0000-0000-0000-000000000000',
            'name' => 'test.pdf',
            'docData' => $client->getFileData('/var/www/test.pdf')
            ],
        'optimizeAction' => [
            'profile' => 'max',
            'useProfile' => true
        ],
        'notification' => ''
    ]);

print_r($produceDocuments);

//post createArchiveJobConfig
$createArchiveJob = $client->pdf4me()->createArchiveJobConfig([
            'jobId' => '00000000-0000-0000-0000-000000000000',
             "sourceFolder"=> [
    "storageType"=> "undef",
    "folderName"=> "string",
    "host"=> "string"
  ],
    "executionTrigger"=> [
    "startTime"=> "2018-05-10T13:10:43.064Z",
    "cronTrigger"=> "string",
    "continues"=> true
  ],
    "archiveConfig"=> [
    "archiveMetadata"=> [

        "key"=> "string",
        "value"=> "ddd"

    ],
    "stampAction"=> [
      "pageSequence"=> "string",
      "relativePosX"=> 0,
      "relativePosY"=> 0,
      "sizeX"=> 0,
      "sizeY"=> 0,
      "rotate"=> 0,
      "autoorientation"=> true,
      "alpha"=> 0,
      "scale"=> "relToA4",
      "alignX"=> "left",
      "alignY"=> "top",
      "stampType"=> "annotation",
      "text"=> [
        "format"=> true,
        "size"=> 0,
        "font"=> "string",
        "color"=> [
          "red"=> 1,
          "green"=> 1,
          "blue"=> 1
        ],
        "fontEncoding"=> "unicode",
        "value"=> "sss",
        "mode"=> "fill",
        "rotate"=> [
          "angle"=> 1,
          "originX"=> 1,
          "originY"=> 1
        ],
        "translate"=> [
          "offsetX"=> 1,
          "offsetY"=> 1
        ],
        "transform"=> [
          "a"=> 1,
          "b"=> 1,
          "c"=>1,
          "d"=>1,
           "x"=>1,
            "y"=>1

        ]
      ],
      "image"=> [
        "rectangle"=> [
          "x"=> 0,
          "y"=> 0,
          "width"=> 0,
          "height"=> 0
        ],
        "imageData"=> "string",
        "imageType"=> "string",
        "fileName"=> "string",
        "compression"=> "cCITTFax",
        "rotate"=> [
          "angle"=> 1,
          "originX"=> 1,
          "originY"=> 1
        ],
        "translate"=> [
          "offsetX"=> 1,
          "offsetY"=> 1
        ],
        "transform"=> [
          "a"=> 1,
          "b"=> 1,
          "c"=> 1,
          "d"=> 1,
          "x"=> 1,
          "y"=> 1
        ]
      ],
      "customProperties"=> [

          "key"=> "string",
          "value"=> "string"

      ]
    ],

    "signatureConfig"=> [],
    "useTSA"=> true,
  ],
      "targetFolder"=> [
    "storageType"=> "undef",
    "folderName"=> "string",
    "host"=> "string"
  ]  
                ]);


print_r($createArchiveJob);

//post convertToPdf
$createToPdf = $client->pdf4me()->convertToPdf([
"notification"=> [
  "getNotification"=> true,
  "connectionId"=> "test1"
],
"document"=> [
  "jobId"=> "000000-00000-00000-000000",
  "documentId"=> "123",
  "name"=> "test.pdf",
  "docStatus"=> "active",
  "docData" => $client->getFileData('/var/www/test.pdf')
],
"convertToPdfAction"=> [
  "pdfConformance"=> "pdf17",
  "conversionMode"=> "fast",
  "customProperties"=> [

      "key"=> "1233",
      "value"=> "examp1"

  ]
]

    ]);

print_r($createToPdf);

//get getDocuments
$getDocuments = $client->pdf4me()->getDocuments([
    "jobId"=> "00000000-0000-0000-0000-000000000000"
    ]);

print_r($getDocuments);

//post stampPdf
$stampPdf = $client->pdf4me()->stampPdf([
            'document'=> [
            'name' => 'test.pdf',
    	    'docData' => $client->getFileData('/var/www/test.pdf')
                ],
        'stampAction' => [
            "pageSequence"=>'all',
            "rotate"=>-45.0,
            "alpha"=>0.8,
            "alignX"=>'center',
            "alignY"=>'middle',
            "text"=> [
                "size"=> 20,
                "value"=> '***Testaaa***'
            ]
            ],
        'notification' => [
            "getNotification"=>false
            ]

    ]);

print_r($stampPdf);

//post splitPdf
$splitPdf = $client->pdf4me()->splitPdf([

	"document"=> [
		'name' => 'test.pdf',
    		'docData' => $client->getFileData('/var/www/test.pdf')
	],
	"SplitAction"=> [
		"splitAfterPage"=> 1
	],
	"notification"=> [
		"getNotification"=> false
	]

    ]);
print_r($splitPdf);

//post createImages
$createImages = $client->pdf4me()->createImages([
  "document"=>[
   'name' => 'test.pdf',
    'docData' => $client->getFileData('/var/www/test.pdf')
],
  "imageAction"=> [
		"pageSelection"=> [
			"pageNrs"=> [1]
		],
		'renderOptions' =>[
            'noAntialiasing'
        ],
		"widthPixel"=> 1000,
		"imageExtension"=> "png"
	]
]);
print_r($createImages);

// post pdfMerge
$pdfMerge = $client->pdf4me()->pdfMerge([
          "documents"=> [
              [
		'name' => 'test1.pdf',
    		'docData' => $client->getFileData('/var/www/test1.pdf')
], [
		'name' => 'test.pdf',
    		'docData' => $client->getFileData('/var/www/test.pdf')
]]

    ]);

print_r($pdfMerge);

// post pdfA
$pdfA = $client->pdf4me()->pdfA([
            "document"=> [
		'name' => 'test.pdf',
    		'docData' => $client->getFileData('/var/www/test.pdf')
	],
	"pdfAAction"=> [
		"compliance"=> "pdfa1b"
	]
    ]);

print_r($pdfA);
// Get all jobconfig
$jobconfig = $client->pdf4me()->jobConfig();;
print_r($jobconfig);


// post pdfOptimize
$pdfOptimize = $client->pdf4me()->pdfOptimize([
    'document'=> ['jobId' => '00000000-0000-0000-0000-000000000000',
    'name' => 'test.pdf',
    'docData' => $client->getFileData('var\www\ynoox\test.pdf')
    ],
'optimizeAction' => [
    'profile' => 'Max',
    'useProfile' => true
],
'notification' => ''
]);

echo "<pre>";
print_r($pdfOptimize);

```
