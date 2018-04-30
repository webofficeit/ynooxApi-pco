<?php

namespace Ynooxpdf4me\API\Traits\Schema;


/**
 * Trait ResourceName
 * */
trait PdfSchema {

    /**
     * Appends the prefix to resource names
     * @return string
     */
    protected function getValidationSchemaData() {
        return ('
          {
	"Convert\/ConvertFileToPdf": {
		"file": {
			"parameters": {
				"type": "upload",
				"required": false
			}
		}
	},
	"Convert\/ConvertToPdf": {
		"notification": {
			"getNotification": {
				"parameters": {
					"type": "boolean"
				}
			},
			"connectionId": {
				"parameters": {
					"type": "string"
				}
			}
		},
		"document": {
			"jobId": {
				"parameters": {
					"type": "string"
				}
			},
			"documentId": {
				"parameters": {
					"type": "string"
				}
			},
			"name": {
				"parameters": {
					"type": "string"
				}
			},
			"docStatus": {
				"parameters": {
					"type": "string"
				}
			},
			"pages": {
				"documentId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageNumber": {
					"parameters": {
						"type": "integer"
					}
				},
				"rotate": {
					"parameters": {
						"type": "number"
					}
				},
				"thumbnail": {
					"parameters": {
						"type": "string"
					}
				},
				"sourceDocumentId": {
					"parameters": {
						"type": "string"
					}
				},
				"sourcePageNumber": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"docData": {
				"parameters": {
					"type": "string"
				}
			},
			"docMetadata": {
				"title": {
					"parameters": {
						"type": "string"
					}
				},
				"subject": {
					"parameters": {
						"type": "string"
					}
				},
				"pageCount": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"size": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"isEncrypted": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"pdfCompliance": {
					"parameters": {
						"type": "string"
					}
				},
				"isSigned": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"uploadedMimeType": {
					"parameters": {
						"type": "string"
					}
				},
				"uploadedFileSize": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"docLogs": {
				"messageType": {
					"parameters": {
						"type": "string"
					}
				},
				"message": {
					"parameters": {
						"type": "string"
					}
				},
				"timestamp": {
					"parameters": {
						"type": "string"
					}
				},
				"docLogLevel": {
					"parameters": {
						"enum": ["verbose", "info", "warning", "error", "timing"],
						"type": "string"
					}
				},
				"durationMilliseconds": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"notification": {
				"getNotification": {
					"parameters": {
						"type": "boolean"
					}
				},
				"connectionId": {
					"parameters": {
						"type": "string"
					}
				}
			}
		},
		"convertToPdfAction": {
			"options": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"Document\/GetDocuments": {
		"jobId": {
			"parameters": {
				"required": true,
				"type": "string"
			}
		}
	},
	"Document\/GetDocument": {
		"jobId": {
			"parameters": {
				"type": "string"
			}
		},
		"documentId": {
			"parameters": {
				"type": "string"
			}
		},
		"thumbnailsOnly": {
			"parameters": {
				"type": "boolean"
			}
		},
		"documentType": {
			"parameters": {
				"type": "string"
			}
		},
		"getNotified": {
			"parameters": {
				"type": "boolean"
			}
		},
		"connectionId": {
			"parameters": {
				"type": "string"
			}
		},
		"userFingerprint": {
			"ipAdress": {
				"parameters": {
					"type": "string"
				}
			},
			"browser": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"Document\/DropDocument": {
		"notification": {
			"getNotification": {
				"parameters": {
					"type": "boolean"
				}
			},
			"connectionId": {
				"parameters": {
					"type": "string"
				}
			}
		},
		"jobId": {
			"parameters": {
				"type": "string"
			}
		},
		"documentId": {
			"parameters": {
				"type": "string"
			}
		},
		"userId": {
			"parameters": {
				"type": "string"
			}
		},
		"url": {
			"parameters": {
				"type": "string"
			}
		},
		"document": {
			"parameters": {
				"type": "string"
			}
		},
		"fileName": {
			"parameters": {
				"type": "string"
			}
		},
		"cloudStorageProvider": {
			"parameters": {
				"enum": ["undef", "local", "url", "oneDrive", "dropbox", "googleDrive", "kloudless"],
				"type": "string"
			}
		},
		"cloudStorageFiles": {
			"parameters": {
				"type": "array",
				"items": {
					"type": "string"
				}
			}
		},
		"cloudStorageFilesDesc": {
			"parameters": {
				"type": "string"
			}
		},
		"getNotified": {
			"parameters": {
				"type": "boolean"
			}
		},
		"connectionId": {
			"parameters": {
				"type": "string"
			}
		},
		"userFingerprint": {
			"ipAdress": {
				"parameters": {
					"type": "string"
				}
			},
			"browser": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"Document\/ProduceDocuments": {
		"jobId": {
			"parameters": {
				"type": "string"
			}
		},
		"documents": {
			"jobId": {
				"parameters": {
					"type": "string"
				}
			},
			"documentId": {
				"parameters": {
					"type": "string"
				}
			},
			"name": {
				"parameters": {
					"type": "string"
				}
			},
			"docStatus": {
				"parameters": {
					"type": "string"
				}
			},
			"pages": {
				"documentId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageNumber": {
					"parameters": {
						"type": "integer"
					}
				},
				"rotate": {
					"parameters": {
						"type": "number"
					}
				},
				"thumbnail": {
					"parameters": {
						"type": "string"
					}
				},
				"sourceDocumentId": {
					"parameters": {
						"type": "string"
					}
				},
				"sourcePageNumber": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"docData": {
				"parameters": {
					"type": "string"
				}
			},
			"docMetadata": {
				"title": {
					"parameters": {
						"type": "string"
					}
				},
				"subject": {
					"parameters": {
						"type": "string"
					}
				},
				"pageCount": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"size": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"isEncrypted": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"pdfCompliance": {
					"parameters": {
						"type": "string"
					}
				},
				"isSigned": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"uploadedMimeType": {
					"parameters": {
						"type": "string"
					}
				},
				"uploadedFileSize": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"docLogs": {
				"messageType": {
					"parameters": {
						"type": "string"
					}
				},
				"message": {
					"parameters": {
						"type": "string"
					}
				},
				"timestamp": {
					"parameters": {
						"type": "string"
					}
				},
				"docLogLevel": {
					"parameters": {
						"enum": ["verbose", "info", "warning", "error", "timing"],
						"type": "string"
					}
				},
				"durationMilliseconds": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"notification": {
				"getNotification": {
					"parameters": {
						"type": "boolean"
					}
				},
				"connectionId": {
					"parameters": {
						"type": "string"
					}
				}
			}
		},
		"ocrAction": {
			"stapel": {
				"parameters": {
					"type": "string"
				}
			},
			"businesssCardReco": {
				"parameters": {
					"type": "boolean"
				}
			},
			"fullTextSearch": {
				"parameters": {
					"type": "boolean"
				}
			},
			"outputType": {
				"parameters": {
					"enum": ["undef", "txt", "docx", "xlsx", "pptx", "pdfSearchable", "xml", "rtf", "rtt", "vcf", "json"],
					"type": "string"
				}
			}
		},
		"pdfAAction": {
			"fontsToSubset": {
				"name": {
					"parameters": {
						"type": "string"
					}
				},
				"fontContent": {
					"parameters": {
						"type": "string"
					}
				}
			},
			"compliance": {
				"parameters": {
					"enum": ["pdfA1b", "pdfA1a", "pdfA2b", "pdfA2u", "pdfA2a", "pdfA3b", "pdfA3u", "pdfA3a"],
					"type": "string"
				}
			},
			"allowDowngrade": {
				"parameters": {
					"type": "boolean"
				}
			},
			"allowUpgrade": {
				"parameters": {
					"type": "boolean"
				}
			},
			"outputIntentProfile": {
				"parameters": {
					"enum": ["notSet", "sRGBColorSpace"],
					"type": "string"
				}
			},
			"linearize": {
				"parameters": {
					"type": "boolean"
				}
			}
		},
		"optimizeAction": {
			"profile": {
				"parameters": {
					"enum": ["default", "web", "print", "max"],
					"type": "string"
				}
			},
			"useProfile": {
				"parameters": {
					"type": "boolean"
				}
			},
			"removeRedundantObjects": {
				"parameters": {
					"type": "boolean"
				}
			},
			"subsetFonts": {
				"parameters": {
					"type": "boolean"
				}
			},
			"optimizeResources": {
				"parameters": {
					"type": "boolean"
				}
			},
			"forceCompressionTypes": {
				"parameters": {
					"type": "boolean"
				}
			},
			"forceRecompression": {
				"parameters": {
					"type": "boolean"
				}
			},
			"reduceColorComplexity": {
				"parameters": {
					"type": "boolean"
				}
			},
			"mergeEmbeddedFonts": {
				"parameters": {
					"type": "boolean"
				}
			},
			"bitonalCompressions": {
				"parameters": {
					"type": "array",
					"items": {
						"enum": ["none", "raw", "jPEG", "flate", "lZW", "group3", "group3_2D", "group4", "jBIG2", "jPEG2000", "mRC", "source"],
						"type": "string"
					}
				}
			},
			"bitonalResolutionDPI": {
				"parameters": {
					"type": "number"
				}
			},
			"bitonalThresholdDPI": {
				"parameters": {
					"type": "number"
				}
			},
			"clipImages": {
				"parameters": {
					"type": "boolean"
				}
			},
			"continuousCompressions": {
				"parameters": {
					"type": "array",
					"items": {
						"enum": ["none", "raw", "jPEG", "flate", "lZW", "group3", "group3_2D", "group4", "jBIG2", "jPEG2000", "mRC", "source"],
						"type": "string"
					}
				}
			},
			"linearize": {
				"parameters": {
					"type": "boolean"
				}
			},
			"imageQuality": {
				"parameters": {
					"type": "integer"
				}
			},
			"indexedCompressions": {
				"parameters": {
					"type": "array",
					"items": {
						"enum": ["none", "raw", "jPEG", "flate", "lZW", "group3", "group3_2D", "group4", "jBIG2", "jPEG2000", "mRC", "source"],
						"type": "string"
					}
				}
			},
			"ditheringMode": {
				"parameters": {
					"enum": ["none", "floydSteinberg", "halftone", "pattern", "g3Optimized", "g4Optimized", "atkinson"],
					"type": "string"
				}
			},
			"colorResolutionDPI": {
				"parameters": {
					"type": "number"
				}
			},
			"colorThresholdDPI": {
				"parameters": {
					"type": "number"
				}
			},
			"monochromeResolutionDPI": {
				"parameters": {
					"type": "number"
				}
			},
			"monochromeThresholdDPI": {
				"parameters": {
					"type": "number"
				}
			},
			"resolutionDPI": {
				"parameters": {
					"type": "integer"
				}
			},
			"thresholdDPI": {
				"parameters": {
					"type": "integer"
				}
			},
			"strip": {
				"parameters": {
					"type": "array",
					"items": {
						"enum": ["threads", "metadata", "pieceInfo", "structTree", "thumb", "spider", "alternates", "forms", "links", "annots", "formsAnnots", "outputIntents", "all"],
						"type": "string"
					}
				}
			},
			"infoEntries": {
				"key": {
					"parameters": {
						"type": "string"
					}
				},
				"value": {
					"parameters": {
						"type": "string"
					}
				}
			},
			"flattenSignatureFields": {
				"parameters": {
					"type": "boolean"
				}
			}
		},
		"produceOutput": {
			"fileType": {
				"parameters": {
					"enum": ["undef", "pdf", "zip"],
					"type": "string"
				}
			}
		},
		"notification": {
			"getNotification": {
				"parameters": {
					"type": "boolean"
				}
			},
			"connectionId": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"Extract\/ExtractPages": {
		"pageNrs": {
			"parameters": {
				"required": false,
				"type": "string"
			}
		},
		"file": {
			"parameters": {
				"type": "upload",
				"required": false
			}
		}
	},
	"Extract\/Extract": {
		"document": {
			"jobId": {
				"parameters": {
					"type": "string"
				}
			},
			"documentId": {
				"parameters": {
					"type": "string"
				}
			},
			"name": {
				"parameters": {
					"type": "string"
				}
			},
			"docStatus": {
				"parameters": {
					"type": "string"
				}
			},
			"pages": {
				"documentId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageNumber": {
					"parameters": {
						"type": "integer"
					}
				},
				"rotate": {
					"parameters": {
						"type": "number"
					}
				},
				"thumbnail": {
					"parameters": {
						"type": "string"
					}
				},
				"sourceDocumentId": {
					"parameters": {
						"type": "string"
					}
				},
				"sourcePageNumber": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"docData": {
				"parameters": {
					"type": "string"
				}
			},
			"docMetadata": {
				"title": {
					"parameters": {
						"type": "string"
					}
				},
				"subject": {
					"parameters": {
						"type": "string"
					}
				},
				"pageCount": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"size": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"isEncrypted": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"pdfCompliance": {
					"parameters": {
						"type": "string"
					}
				},
				"isSigned": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"uploadedMimeType": {
					"parameters": {
						"type": "string"
					}
				},
				"uploadedFileSize": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"docLogs": {
				"messageType": {
					"parameters": {
						"type": "string"
					}
				},
				"message": {
					"parameters": {
						"type": "string"
					}
				},
				"timestamp": {
					"parameters": {
						"type": "string"
					}
				},
				"docLogLevel": {
					"parameters": {
						"enum": ["verbose", "info", "warning", "error", "timing"],
						"type": "string"
					}
				},
				"durationMilliseconds": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"notification": {
				"getNotification": {
					"parameters": {
						"type": "boolean"
					}
				},
				"connectionId": {
					"parameters": {
						"type": "string"
					}
				}
			}
		},
		"extractAction": {
			"extractPages": {
				"parameters": {
					"type": "array",
					"items": {
						"format": "int32",
						"type": "integer"
					}
				}
			}
		},
		"notification": {
			"getNotification": {
				"parameters": {
					"type": "boolean"
				}
			},
			"connectionId": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"Image\/CreateThumbnail": {
		"width": {
			"parameters": {
				"required": true,
				"type": "integer"
			}
		},
		"pageNr": {
			"parameters": {
				"required": false,
				"type": "string"
			}
		},
		"imageFormat": {
			"parameters": {
				"required": false,
				"type": "string"
			}
		},
		"file": {
			"parameters": {
				"type": "upload",
				"required": false
			}
		}
	},
	"Image\/CreateImages": {
		"document": {
			"jobId": {
				"parameters": {
					"type": "string"
				}
			},
			"documentId": {
				"parameters": {
					"type": "string"
				}
			},
			"name": {
				"parameters": {
					"type": "string"
				}
			},
			"docStatus": {
				"parameters": {
					"type": "string"
				}
			},
			"pages": {
				"documentId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageNumber": {
					"parameters": {
						"type": "integer"
					}
				},
				"rotate": {
					"parameters": {
						"type": "number"
					}
				},
				"thumbnail": {
					"parameters": {
						"type": "string"
					}
				},
				"sourceDocumentId": {
					"parameters": {
						"type": "string"
					}
				},
				"sourcePageNumber": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"docData": {
				"parameters": {
					"type": "string"
				}
			},
			"docMetadata": {
				"title": {
					"parameters": {
						"type": "string"
					}
				},
				"subject": {
					"parameters": {
						"type": "string"
					}
				},
				"pageCount": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"size": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"isEncrypted": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"pdfCompliance": {
					"parameters": {
						"type": "string"
					}
				},
				"isSigned": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"uploadedMimeType": {
					"parameters": {
						"type": "string"
					}
				},
				"uploadedFileSize": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"docLogs": {
				"messageType": {
					"parameters": {
						"type": "string"
					}
				},
				"message": {
					"parameters": {
						"type": "string"
					}
				},
				"timestamp": {
					"parameters": {
						"type": "string"
					}
				},
				"docLogLevel": {
					"parameters": {
						"enum": ["verbose", "info", "warning", "error", "timing"],
						"type": "string"
					}
				},
				"durationMilliseconds": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"notification": {
				"getNotification": {
					"parameters": {
						"type": "boolean"
					}
				},
				"connectionId": {
					"parameters": {
						"type": "string"
					}
				}
			}
		},
		"imageAction": {
			"pageSelection": {
				"pageNrs": {
					"parameters": {
						"type": "array",
						"items": {
							"format": "int32",
							"type": "integer"
						}
					}
				},
				"pageIds": {
					"parameters": {
						"type": "array",
						"items": {
							"type": "string"
						}
					}
				},
				"pageSequence": {
					"parameters": {
						"enum": ["all", "first", "last", "odd", "even", "notFirst", "notLast"],
						"type": "string"
					}
				}
			},
			"center": {
				"parameters": {
					"type": "boolean"
				}
			},
			"fitPage": {
				"parameters": {
					"type": "boolean"
				}
			},
			"bitsPerPixel": {
				"parameters": {
					"type": "integer"
				}
			},
			"bilevelThreshold": {
				"parameters": {
					"type": "integer"
				}
			},
			"widthPixel": {
				"parameters": {
					"type": "integer"
				}
			},
			"heightPixel": {
				"parameters": {
					"type": "integer"
				}
			},
			"widthPoint": {
				"parameters": {
					"type": "integer"
				}
			},
			"heightPoint": {
				"parameters": {
					"type": "integer"
				}
			},
			"renderOptions": {
				"parameters": {
					"type": "array",
					"items": {
						"enum": ["noAntialiasing", "noInterpolation", "noLowPassFilter", "noHinting", "printingMode", "noBPC", "fitPaths", "useBoxFilter"],
						"type": "string"
					}
				}
			},
			"rotateMode": {
				"parameters": {
					"enum": ["none", "attribute", "portrait", "landscape"],
					"type": "string"
				}
			},
			"preserveAspectRatio": {
				"parameters": {
					"type": "boolean"
				}
			},
			"imageQuality": {
				"parameters": {
					"type": "integer"
				}
			},
			"cmsEngine": {
				"parameters": {
					"enum": ["none", "neugebauer", "lcms", "customCMS"],
					"type": "string"
				}
			},
			"dithering": {
				"parameters": {
					"enum": ["none", "floydSteinberg", "halftone", "pattern", "g3Optimized", "g4Optimized", "atkinson"],
					"type": "string"
				}
			},
			"dpi": {
				"parameters": {
					"type": "integer"
				}
			},
			"fillOrder": {
				"parameters": {
					"enum": ["mSB", "lSB"],
					"type": "string"
				}
			},
			"filterRatio": {
				"parameters": {
					"type": "integer"
				}
			},
			"imageExtension": {
				"parameters": {
					"enum": ["unknown", "bmp", "gif", "jb2", "jpg", "jpeg", "jp2", "jpf", "jpx", "png", "tif", "tiff"],
					"type": "string"
				}
			},
			"colorSpace": {
				"parameters": {
					"enum": ["gray", "grayA", "rGB", "rGBA", "cMYK", "yCbCr", "yCbCrK", "palette", "lAB", "cMYK_Konly", "cMYKA", "other"],
					"type": "string"
				}
			},
			"compression": {
				"parameters": {
					"enum": ["raw", "jPEG", "flate", "lZW", "group3", "group3_2D", "group4", "jBIG2", "jPEG2000", "tIFFJPEG", "unknown", "default"],
					"type": "string"
				}
			}
		},
		"customCMSConfig": {
			"white": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"c": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"m": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"y": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"k": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"cm": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"cy": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"ck": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"my": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"mk": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"yk": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"cmy": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"cmk": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"cyk": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"myk": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"cmyk": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			}
		},
		"notification": {
			"getNotification": {
				"parameters": {
					"type": "boolean"
				}
			},
			"connectionId": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"Job\/CreateArchiveJobConfig": {
		"jobId": {
			"parameters": {
				"required": 1,
				"type": "string"
			}
		},
		"sourceFolder": {
			"required": 1,
			"storageType": {
				"parameters": {
					"enum": ["undef", "localSystem"],
					"type": "string"
				}
			},
			"folderName": {
				"parameters": {
					"type": "string"
				}
			},
			"host": {
				"parameters": {
					"type": "string"
				}
			}
		},
		"executionTrigger": {
			"required": 1,
			"startTime": {
				"parameters": {
					"type": "string"
				}
			},
			"cronTrigger": {
				"parameters": {
					"type": "string"
				}
			},
			"continues": {
				"parameters": {
					"type": "boolean"
				}
			}
		},
		"archiveConfig": {
			"required": 1,
			"archiveMetadata": {
				"parameters": {
					"required": 1
				},
				"key": {
					"parameters": {
						"type": "string"
					}
				},
				"value": {
					"parameters": {
						"type": "string"
					}
				}
			},
			"stampAction": {
				"name": {
					"parameters": {
						"type": "string"
					}
				},
				"pageSequence": {
					"parameters": {
						"type": "string"
					}
				},
				"relativePosX": {
					"parameters": {
						"type": "integer"
					}
				},
				"relativePosY": {
					"parameters": {
						"type": "integer"
					}
				},
				"sizeX": {
					"parameters": {
						"type": "integer"
					}
				},
				"sizeY": {
					"parameters": {
						"type": "integer"
					}
				},
				"rotate": {
					"parameters": {
						"type": "number"
					}
				},
				"autoorientation": {
					"parameters": {
						"type": "boolean"
					}
				},
				"alpha": {
					"parameters": {
						"type": "number"
					}
				},
				"scale": {
					"parameters": {
						"enum": ["relToA4"],
						"type": "string"
					}
				},
				"alignX": {
					"parameters": {
						"enum": ["left", "center", "right"],
						"type": "string"
					}
				},
				"alignY": {
					"parameters": {
						"enum": ["top", "middle", "bottom"],
						"type": "string"
					}
				},
				"stampType": {
					"parameters": {
						"enum": ["annotation", "foreground", "background"],
						"type": "string"
					}
				}
			},
			"useTSA": {
				"parameters": {
					"type": "boolean"
				}
			}
		},
		"stampAction": {
			"text": {
				"format": {
					"parameters": {
						"type": "boolean"
					}
				},
				"size": {
					"parameters": {
						"type": "integer"
					}
				},
				"font": {
					"parameters": {
						"type": "string"
					}
				},
				"fontEncoding": {
					"parameters": {
						"enum": ["unicode", "winAnsi"],
						"type": "string"
					}
				},
				"value": {
					"parameters": {
						"required": 1,
						"type": "string"
					}
				},
				"mode": {
					"parameters": {
						"enum": ["fill", "stroke"],
						"type": "string"
					}
				}
			},
			"image": {
				"imageData": {
					"parameters": {
						"type": "string"
					}
				},
				"imageType": {
					"parameters": {
						"type": "string"
					}
				},
				"fileName": {
					"parameters": {
						"type": "string"
					}
				},
				"compression": {
					"parameters": {
						"enum": ["cCITTFax", "flate", "dCT"],
						"type": "string"
					}
				}
			}
		},
		"text": {
			"color": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"rotate": {
				"angle": {
					"parameters": {
						"required": 1,
						"type": "number"
					}
				},
				"originX": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"originY": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"translate": {
				"offsetX": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"offsetY": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"transform": {
				"a": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"b": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"c": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"d": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"x": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"y": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"spanList": {
				"decoration": {
					"parameters": {
						"enum": ["underline"],
						"type": "string"
					}
				}
			}
		},
		"spanList": {
			"color": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			}
		},
		"image": {
			"rectangle": {
				"x": {
					"parameters": {
						"type": "integer"
					}
				},
				"y": {
					"parameters": {
						"type": "integer"
					}
				},
				"width": {
					"parameters": {
						"type": "integer"
					}
				},
				"height": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"rotate": {
				"angle": {
					"parameters": {
						"required": 1,
						"type": "number"
					}
				},
				"originX": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"originY": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"translate": {
				"offsetX": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"offsetY": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"transform": {
				"a": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"b": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"c": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"d": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"x": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"y": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			}
		},
		"targetFolder": {
			"required": 1,
			"storageType": {
				"parameters": {
					"enum": ["undef", "localSystem"],
					"type": "string"
				}
			},
			"folderName": {
				"parameters": {
					"type": "string"
				}
			},
			"host": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"Job\/RunJob": {
		"jobId": {
			"parameters": {
				"type": "string"
			}
		},
		"jobConfigId": {
			"parameters": {
				"required": 1,
				"type": "string"
			}
		},
		"documents": {
			"jobId": {
				"parameters": {
					"type": "string"
				}
			},
			"documentId": {
				"parameters": {
					"type": "string"
				}
			},
			"name": {
				"parameters": {
					"type": "string"
				}
			},
			"docStatus": {
				"parameters": {
					"type": "string"
				}
			},
			"pages": {
				"documentId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageNumber": {
					"parameters": {
						"type": "integer"
					}
				},
				"rotate": {
					"parameters": {
						"type": "number"
					}
				},
				"thumbnail": {
					"parameters": {
						"type": "string"
					}
				},
				"sourceDocumentId": {
					"parameters": {
						"type": "string"
					}
				},
				"sourcePageNumber": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"docData": {
				"parameters": {
					"type": "string"
				}
			},
			"docMetadata": {
				"title": {
					"parameters": {
						"type": "string"
					}
				},
				"subject": {
					"parameters": {
						"type": "string"
					}
				},
				"pageCount": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"size": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"isEncrypted": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"pdfCompliance": {
					"parameters": {
						"type": "string"
					}
				},
				"isSigned": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"uploadedMimeType": {
					"parameters": {
						"type": "string"
					}
				},
				"uploadedFileSize": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"docLogs": {
				"messageType": {
					"parameters": {
						"type": "string"
					}
				},
				"message": {
					"parameters": {
						"type": "string"
					}
				},
				"timestamp": {
					"parameters": {
						"type": "string"
					}
				},
				"docLogLevel": {
					"parameters": {
						"enum": ["verbose", "info", "warning", "error", "timing"],
						"type": "string"
					}
				},
				"durationMilliseconds": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"notification": {
				"getNotification": {
					"parameters": {
						"type": "boolean"
					}
				},
				"connectionId": {
					"parameters": {
						"type": "string"
					}
				}
			}
		}
	},
	"Job\/SaveJobConfig": {
		"jobConfigId": {
			"parameters": {
				"required": 1,
				"type": "string"
			}
		},
		"enabled": {
			"parameters": {
				"required": 1,
				"type": "boolean"
			}
		},
		"active": {
			"parameters": {
				"type": "boolean"
			}
		},
		"creationDate": {
			"parameters": {
				"type": "string"
			}
		},
		"modDate": {
			"parameters": {
				"type": "string"
			}
		},
		"name": {
			"parameters": {
				"required": 1,
				"type": "string"
			}
		},
		"userId": {
			"parameters": {
				"required": 1,
				"type": "string"
			}
		},
		"sourceFolder": {
			"storageType": {
				"parameters": {
					"enum": ["undef", "localSystem"],
					"type": "string"
				}
			},
			"folderName": {
				"parameters": {
					"type": "string"
				}
			},
			"host": {
				"parameters": {
					"type": "string"
				}
			}
		},
		"executionTrigger": {
			"startTime": {
				"parameters": {
					"type": "string"
				}
			},
			"cronTrigger": {
				"parameters": {
					"type": "string"
				}
			},
			"continues": {
				"parameters": {
					"type": "boolean"
				}
			}
		},
		"actionFlow": {
			"actions": {
				"actionId": {
					"parameters": {
						"type": "string"
					}
				},
				"actionType": {
					"parameters": {
						"enum": ["undef", "user", "optimize", "pdfA", "ocrDocument", "ocrBusCard", "convertToPdf", "stamp", "split", "merge", "scanMrc", "createThumbnail", "createImage", "extract"],
						"type": "string"
					}
				},
				"userAction": {
					"parameters": {
						"type": "string"
					}
				},
				"actionConfig": {
					"parameters": {
						"type": "string"
					}
				}
			}
		},
		"actions": {
			"actionProperties": {
				"key": {
					"parameters": {
						"type": "string"
					}
				},
				"value": {
					"parameters": {
						"type": "object"
					}
				}
			}
		},
		"targetFolder": {
			"storageType": {
				"parameters": {
					"enum": ["undef", "localSystem"],
					"type": "string"
				}
			},
			"folderName": {
				"parameters": {
					"type": "string"
				}
			},
			"host": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"Merge\/Merge2Pdfs": {
		"file1": {
			"parameters": {
				"required": false
			}
		},
		"file2": {
			"parameters": {
				"required": false
			}
		}
	},
	"Merge\/Merge": {
		"documents": {
			"jobId": {
				"parameters": {
					"type": "string"
				}
			},
			"documentId": {
				"parameters": {
					"type": "string"
				}
			},
			"name": {
				"parameters": {
					"type": "string"
				}
			},
			"docStatus": {
				"parameters": {
					"type": "string"
				}
			},
			"pages": {
				"documentId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageNumber": {
					"parameters": {
						"type": "integer"
					}
				},
				"rotate": {
					"parameters": {
						"type": "number"
					}
				},
				"thumbnail": {
					"parameters": {
						"type": "string"
					}
				},
				"sourceDocumentId": {
					"parameters": {
						"type": "string"
					}
				},
				"sourcePageNumber": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"docData": {
				"parameters": {
					"type": "string"
				}
			},
			"docMetadata": {
				"title": {
					"parameters": {
						"type": "string"
					}
				},
				"subject": {
					"parameters": {
						"type": "string"
					}
				},
				"pageCount": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"size": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"isEncrypted": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"pdfCompliance": {
					"parameters": {
						"type": "string"
					}
				},
				"isSigned": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"uploadedMimeType": {
					"parameters": {
						"type": "string"
					}
				},
				"uploadedFileSize": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"docLogs": {
				"messageType": {
					"parameters": {
						"type": "string"
					}
				},
				"message": {
					"parameters": {
						"type": "string"
					}
				},
				"timestamp": {
					"parameters": {
						"type": "string"
					}
				},
				"docLogLevel": {
					"parameters": {
						"enum": ["verbose", "info", "warning", "error", "timing"],
						"type": "string"
					}
				},
				"durationMilliseconds": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"notification": {
				"getNotification": {
					"parameters": {
						"type": "boolean"
					}
				},
				"connectionId": {
					"parameters": {
						"type": "string"
					}
				}
			}
		},
		"notification": {
			"getNotification": {
				"parameters": {
					"type": "boolean"
				}
			},
			"connectionId": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"Ocr\/RecognizeDocument": {
		"document": {
			"jobId": {
				"parameters": {
					"type": "string"
				}
			},
			"documentId": {
				"parameters": {
					"type": "string"
				}
			},
			"name": {
				"parameters": {
					"type": "string"
				}
			},
			"docStatus": {
				"parameters": {
					"type": "string"
				}
			},
			"pages": {
				"documentId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageNumber": {
					"parameters": {
						"type": "integer"
					}
				},
				"rotate": {
					"parameters": {
						"type": "number"
					}
				},
				"thumbnail": {
					"parameters": {
						"type": "string"
					}
				},
				"sourceDocumentId": {
					"parameters": {
						"type": "string"
					}
				},
				"sourcePageNumber": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"docData": {
				"parameters": {
					"type": "string"
				}
			},
			"docMetadata": {
				"title": {
					"parameters": {
						"type": "string"
					}
				},
				"subject": {
					"parameters": {
						"type": "string"
					}
				},
				"pageCount": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"size": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"isEncrypted": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"pdfCompliance": {
					"parameters": {
						"type": "string"
					}
				},
				"isSigned": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"uploadedMimeType": {
					"parameters": {
						"type": "string"
					}
				},
				"uploadedFileSize": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"docLogs": {
				"messageType": {
					"parameters": {
						"type": "string"
					}
				},
				"message": {
					"parameters": {
						"type": "string"
					}
				},
				"timestamp": {
					"parameters": {
						"type": "string"
					}
				},
				"docLogLevel": {
					"parameters": {
						"enum": ["verbose", "info", "warning", "error", "timing"],
						"type": "string"
					}
				},
				"durationMilliseconds": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"notification": {
				"getNotification": {
					"parameters": {
						"type": "boolean"
					}
				},
				"connectionId": {
					"parameters": {
						"type": "string"
					}
				}
			}
		},
		"ocrAction": {
			"stapel": {
				"parameters": {
					"type": "string"
				}
			},
			"businesssCardReco": {
				"parameters": {
					"type": "boolean"
				}
			},
			"fullTextSearch": {
				"parameters": {
					"type": "boolean"
				}
			},
			"outputType": {
				"parameters": {
					"enum": ["undef", "txt", "docx", "xlsx", "pptx", "pdfSearchable", "xml", "rtf", "rtt", "vcf", "json"],
					"type": "string"
				}
			}
		},
		"notification": {
			"getNotification": {
				"parameters": {
					"type": "boolean"
				}
			},
			"connectionId": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"Optimize\/OptimizeByProfile": {
		"profile": {
			"parameters": {
				"required": true,
				"type": "string",
				"enum": ["default", "web", "print", "max"]
			}
		},
		"file": {
			"parameters": {
				"type": "upload",
				"required": false
			}
		}
	},
	"Optimize\/Optimize": {
		"document": {
			"jobId": {
				"parameters": {
					"type": "string"
				}
			},
			"documentId": {
				"parameters": {
					"type": "string"
				}
			},
			"name": {
				"parameters": {
					"type": "string"
				}
			},
			"docStatus": {
				"parameters": {
					"type": "string"
				}
			},
			"pages": {
				"documentId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageNumber": {
					"parameters": {
						"type": "integer"
					}
				},
				"rotate": {
					"parameters": {
						"type": "number"
					}
				},
				"thumbnail": {
					"parameters": {
						"type": "string"
					}
				},
				"sourceDocumentId": {
					"parameters": {
						"type": "string"
					}
				},
				"sourcePageNumber": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"docData": {
				"parameters": {
					"type": "string"
				}
			},
			"docMetadata": {
				"title": {
					"parameters": {
						"type": "string"
					}
				},
				"subject": {
					"parameters": {
						"type": "string"
					}
				},
				"pageCount": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"size": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"isEncrypted": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"pdfCompliance": {
					"parameters": {
						"type": "string"
					}
				},
				"isSigned": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"uploadedMimeType": {
					"parameters": {
						"type": "string"
					}
				},
				"uploadedFileSize": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"docLogs": {
				"messageType": {
					"parameters": {
						"type": "string"
					}
				},
				"message": {
					"parameters": {
						"type": "string"
					}
				},
				"timestamp": {
					"parameters": {
						"type": "string"
					}
				},
				"docLogLevel": {
					"parameters": {
						"enum": ["verbose", "info", "warning", "error", "timing"],
						"type": "string"
					}
				},
				"durationMilliseconds": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"notification": {
				"getNotification": {
					"parameters": {
						"type": "boolean"
					}
				},
				"connectionId": {
					"parameters": {
						"type": "string"
					}
				}
			}
		},
		"optimizeAction": {
			"profile": {
				"parameters": {
					"enum": ["default", "web", "print", "max"],
					"type": "string"
				}
			},
			"useProfile": {
				"parameters": {
					"type": "boolean"
				}
			},
			"removeRedundantObjects": {
				"parameters": {
					"type": "boolean"
				}
			},
			"subsetFonts": {
				"parameters": {
					"type": "boolean"
				}
			},
			"optimizeResources": {
				"parameters": {
					"type": "boolean"
				}
			},
			"forceCompressionTypes": {
				"parameters": {
					"type": "boolean"
				}
			},
			"forceRecompression": {
				"parameters": {
					"type": "boolean"
				}
			},
			"reduceColorComplexity": {
				"parameters": {
					"type": "boolean"
				}
			},
			"mergeEmbeddedFonts": {
				"parameters": {
					"type": "boolean"
				}
			},
			"bitonalCompressions": {
				"parameters": {
					"type": "array",
					"items": {
						"enum": ["none", "raw", "jPEG", "flate", "lZW", "group3", "group3_2D", "group4", "jBIG2", "jPEG2000", "mRC", "source"],
						"type": "string"
					}
				}
			},
			"bitonalResolutionDPI": {
				"parameters": {
					"type": "number"
				}
			},
			"bitonalThresholdDPI": {
				"parameters": {
					"type": "number"
				}
			},
			"clipImages": {
				"parameters": {
					"type": "boolean"
				}
			},
			"continuousCompressions": {
				"parameters": {
					"type": "array",
					"items": {
						"enum": ["none", "raw", "jPEG", "flate", "lZW", "group3", "group3_2D", "group4", "jBIG2", "jPEG2000", "mRC", "source"],
						"type": "string"
					}
				}
			},
			"linearize": {
				"parameters": {
					"type": "boolean"
				}
			},
			"imageQuality": {
				"parameters": {
					"type": "integer"
				}
			},
			"indexedCompressions": {
				"parameters": {
					"type": "array",
					"items": {
						"enum": ["none", "raw", "jPEG", "flate", "lZW", "group3", "group3_2D", "group4", "jBIG2", "jPEG2000", "mRC", "source"],
						"type": "string"
					}
				}
			},
			"ditheringMode": {
				"parameters": {
					"enum": ["none", "floydSteinberg", "halftone", "pattern", "g3Optimized", "g4Optimized", "atkinson"],
					"type": "string"
				}
			},
			"colorResolutionDPI": {
				"parameters": {
					"type": "number"
				}
			},
			"colorThresholdDPI": {
				"parameters": {
					"type": "number"
				}
			},
			"monochromeResolutionDPI": {
				"parameters": {
					"type": "number"
				}
			},
			"monochromeThresholdDPI": {
				"parameters": {
					"type": "number"
				}
			},
			"resolutionDPI": {
				"parameters": {
					"type": "integer"
				}
			},
			"thresholdDPI": {
				"parameters": {
					"type": "integer"
				}
			},
			"strip": {
				"parameters": {
					"type": "array",
					"items": {
						"enum": ["threads", "metadata", "pieceInfo", "structTree", "thumb", "spider", "alternates", "forms", "links", "annots", "formsAnnots", "outputIntents", "all"],
						"type": "string"
					}
				}
			},
			"infoEntries": {
				"key": {
					"parameters": {
						"type": "string"
					}
				},
				"value": {
					"parameters": {
						"type": "string"
					}
				}
			},
			"flattenSignatureFields": {
				"parameters": {
					"type": "boolean"
				}
			}
		},
		"notification": {
			"getNotification": {
				"parameters": {
					"type": "boolean"
				}
			},
			"connectionId": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"PdfA\/PdfA": {
		"document": {
			"jobId": {
				"parameters": {
					"type": "string"
				}
			},
			"documentId": {
				"parameters": {
					"type": "string"
				}
			},
			"name": {
				"parameters": {
					"type": "string"
				}
			},
			"docStatus": {
				"parameters": {
					"type": "string"
				}
			},
			"pages": {
				"documentId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageNumber": {
					"parameters": {
						"type": "integer"
					}
				},
				"rotate": {
					"parameters": {
						"type": "number"
					}
				},
				"thumbnail": {
					"parameters": {
						"type": "string"
					}
				},
				"sourceDocumentId": {
					"parameters": {
						"type": "string"
					}
				},
				"sourcePageNumber": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"docData": {
				"parameters": {
					"type": "string"
				}
			},
			"docMetadata": {
				"title": {
					"parameters": {
						"type": "string"
					}
				},
				"subject": {
					"parameters": {
						"type": "string"
					}
				},
				"pageCount": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"size": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"isEncrypted": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"pdfCompliance": {
					"parameters": {
						"type": "string"
					}
				},
				"isSigned": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"uploadedMimeType": {
					"parameters": {
						"type": "string"
					}
				},
				"uploadedFileSize": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"docLogs": {
				"messageType": {
					"parameters": {
						"type": "string"
					}
				},
				"message": {
					"parameters": {
						"type": "string"
					}
				},
				"timestamp": {
					"parameters": {
						"type": "string"
					}
				},
				"docLogLevel": {
					"parameters": {
						"enum": ["verbose", "info", "warning", "error", "timing"],
						"type": "string"
					}
				},
				"durationMilliseconds": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"notification": {
				"getNotification": {
					"parameters": {
						"type": "boolean"
					}
				},
				"connectionId": {
					"parameters": {
						"type": "string"
					}
				}
			}
		},
		"pdfAAction": {
			"fontsToSubset": {
				"name": {
					"parameters": {
						"type": "string"
					}
				},
				"fontContent": {
					"parameters": {
						"type": "string"
					}
				}
			},
			"compliance": {
				"parameters": {
					"enum": ["pdfA1b", "pdfA1a", "pdfA2b", "pdfA2u", "pdfA2a", "pdfA3b", "pdfA3u", "pdfA3a"],
					"type": "string"
				}
			},
			"allowDowngrade": {
				"parameters": {
					"type": "boolean"
				}
			},
			"allowUpgrade": {
				"parameters": {
					"type": "boolean"
				}
			},
			"outputIntentProfile": {
				"parameters": {
					"enum": ["notSet", "sRGBColorSpace"],
					"type": "string"
				}
			},
			"linearize": {
				"parameters": {
					"type": "boolean"
				}
			}
		},
		"notification": {
			"getNotification": {
				"parameters": {
					"type": "boolean"
				}
			},
			"connectionId": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"PdfA\/CreatePdfA": {
		"pdfCompliance": {
			"parameters": {
				"required": false,
				"type": "string",
				"enum": ["pdfA1b", "pdfA1a", "pdfA2b", "pdfA2u", "pdfA2a", "pdfA3b", "pdfA3u", "pdfA3a"]
			}
		},
		"file": {
			"parameters": {
				"type": "upload",
				"required": false
			}
		}
	},
	"Split\/SplitByPageNr": {
		"pageNr": {
			"parameters": {
				"required": true,
				"type": "integer"
			}
		},
		"file": {
			"parameters": {
				"type": "upload",
				"required": false
			}
		}
	},
	"Split\/Split": {
		"document": {
			"jobId": {
				"parameters": {
					"type": "string"
				}
			},
			"documentId": {
				"parameters": {
					"type": "string"
				}
			},
			"name": {
				"parameters": {
					"type": "string"
				}
			},
			"docStatus": {
				"parameters": {
					"type": "string"
				}
			},
			"pages": {
				"documentId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageNumber": {
					"parameters": {
						"type": "integer"
					}
				},
				"rotate": {
					"parameters": {
						"type": "number"
					}
				},
				"thumbnail": {
					"parameters": {
						"type": "string"
					}
				},
				"sourceDocumentId": {
					"parameters": {
						"type": "string"
					}
				},
				"sourcePageNumber": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"docData": {
				"parameters": {
					"type": "string"
				}
			},
			"docMetadata": {
				"title": {
					"parameters": {
						"type": "string"
					}
				},
				"subject": {
					"parameters": {
						"type": "string"
					}
				},
				"pageCount": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"size": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"isEncrypted": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"pdfCompliance": {
					"parameters": {
						"type": "string"
					}
				},
				"isSigned": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"uploadedMimeType": {
					"parameters": {
						"type": "string"
					}
				},
				"uploadedFileSize": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"docLogs": {
				"messageType": {
					"parameters": {
						"type": "string"
					}
				},
				"message": {
					"parameters": {
						"type": "string"
					}
				},
				"timestamp": {
					"parameters": {
						"type": "string"
					}
				},
				"docLogLevel": {
					"parameters": {
						"enum": ["verbose", "info", "warning", "error", "timing"],
						"type": "string"
					}
				},
				"durationMilliseconds": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"notification": {
				"getNotification": {
					"parameters": {
						"type": "boolean"
					}
				},
				"connectionId": {
					"parameters": {
						"type": "string"
					}
				}
			}
		},
		"SplitAction": {
			"splitAfterPage": {
				"parameters": {
					"type": "integer"
				}
			},
			"splitSequence": {
				"parameters": {
					"type": "array",
					"items": {
						"format": "int32",
						"type": "integer"
					}
				}
			},
			"recurringSplitAfterPage": {
				"parameters": {
					"type": "integer"
				}
			}
		},
		"notification": {
			"getNotification": {
				"parameters": {
					"type": "boolean"
				}
			},
			"connectionId": {
				"parameters": {
					"type": "string"
				}
			}
		}
	},
	"Stamp\/TextStamp": {
		"text": {
			"parameters": {
				"required": false,
				"type": "string"
			}
		},
		"pages": {
			"parameters": {
				"required": false,
				"type": "string"
			}
		},
		"alignX": {
			"parameters": {
				"required": true,
				"type": "string",
				"enum": ["left", "center", "right"]
			}
		},
		"alignY": {
			"parameters": {
				"required": true,
				"type": "string",
				"enum": ["top", "middle", "bottom"]
			}
		},
		"file": {
			"parameters": {
				"type": "upload",
				"required": false
			}
		}
	},
	"Stamp\/Stamp": {
		"document": {
			"jobId": {
				"parameters": {
					"type": "string"
				}
			},
			"documentId": {
				"parameters": {
					"type": "string"
				}
			},
			"name": {
				"parameters": {
					"type": "string"
				}
			},
			"docStatus": {
				"parameters": {
					"type": "string"
				}
			},
			"pages": {
				"documentId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageId": {
					"parameters": {
						"type": "string"
					}
				},
				"pageNumber": {
					"parameters": {
						"type": "integer"
					}
				},
				"rotate": {
					"parameters": {
						"type": "number"
					}
				},
				"thumbnail": {
					"parameters": {
						"type": "string"
					}
				},
				"sourceDocumentId": {
					"parameters": {
						"type": "string"
					}
				},
				"sourcePageNumber": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"docData": {
				"parameters": {
					"type": "string"
				}
			},
			"docMetadata": {
				"title": {
					"parameters": {
						"type": "string"
					}
				},
				"subject": {
					"parameters": {
						"type": "string"
					}
				},
				"pageCount": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"size": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"isEncrypted": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"pdfCompliance": {
					"parameters": {
						"type": "string"
					}
				},
				"isSigned": {
					"parameters": {
						"required": 1,
						"type": "boolean"
					}
				},
				"uploadedMimeType": {
					"parameters": {
						"type": "string"
					}
				},
				"uploadedFileSize": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"docLogs": {
				"messageType": {
					"parameters": {
						"type": "string"
					}
				},
				"message": {
					"parameters": {
						"type": "string"
					}
				},
				"timestamp": {
					"parameters": {
						"type": "string"
					}
				},
				"docLogLevel": {
					"parameters": {
						"enum": ["verbose", "info", "warning", "error", "timing"],
						"type": "string"
					}
				},
				"durationMilliseconds": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"notification": {
				"getNotification": {
					"parameters": {
						"type": "boolean"
					}
				},
				"connectionId": {
					"parameters": {
						"type": "string"
					}
				}
			}
		},
		"stampAction": {
			"name": {
				"parameters": {
					"type": "string"
				}
			},
			"pageSequence": {
				"parameters": {
					"type": "string"
				}
			},
			"relativePosX": {
				"parameters": {
					"type": "integer"
				}
			},
			"relativePosY": {
				"parameters": {
					"type": "integer"
				}
			},
			"sizeX": {
				"parameters": {
					"type": "integer"
				}
			},
			"sizeY": {
				"parameters": {
					"type": "integer"
				}
			},
			"rotate": {
				"parameters": {
					"type": "number"
				}
			},
			"autoorientation": {
				"parameters": {
					"type": "boolean"
				}
			},
			"alpha": {
				"parameters": {
					"type": "number"
				}
			},
			"scale": {
				"parameters": {
					"enum": ["relToA4"],
					"type": "string"
				}
			},
			"alignX": {
				"parameters": {
					"enum": ["left", "center", "right"],
					"type": "string"
				}
			},
			"alignY": {
				"parameters": {
					"enum": ["top", "middle", "bottom"],
					"type": "string"
				}
			},
			"stampType": {
				"parameters": {
					"enum": ["annotation", "foreground", "background"],
					"type": "string"
				}
			},
			"text": {
				"format": {
					"parameters": {
						"type": "boolean"
					}
				},
				"size": {
					"parameters": {
						"type": "integer"
					}
				},
				"font": {
					"parameters": {
						"type": "string"
					}
				},
				"fontEncoding": {
					"parameters": {
						"enum": ["unicode", "winAnsi"],
						"type": "string"
					}
				},
				"value": {
					"parameters": {
						"required": 1,
						"type": "string"
					}
				},
				"mode": {
					"parameters": {
						"enum": ["fill", "stroke"],
						"type": "string"
					}
				}
			},
			"image": {
				"imageData": {
					"parameters": {
						"type": "string"
					}
				},
				"imageType": {
					"parameters": {
						"type": "string"
					}
				},
				"fileName": {
					"parameters": {
						"type": "string"
					}
				},
				"compression": {
					"parameters": {
						"enum": ["cCITTFax", "flate", "dCT"],
						"type": "string"
					}
				}
			}
		},
		"text": {
			"color": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"rotate": {
				"angle": {
					"parameters": {
						"required": 1,
						"type": "number"
					}
				},
				"originX": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"originY": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"translate": {
				"offsetX": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"offsetY": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"transform": {
				"a": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"b": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"c": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"d": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"x": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"y": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"spanList": {
				"decoration": {
					"parameters": {
						"enum": ["underline"],
						"type": "string"
					}
				}
			}
		},
		"spanList": {
			"color": {
				"red": {
					"parameters": {
						"type": "integer"
					}
				},
				"green": {
					"parameters": {
						"type": "integer"
					}
				},
				"blue": {
					"parameters": {
						"type": "integer"
					}
				}
			}
		},
		"image": {
			"rectangle": {
				"x": {
					"parameters": {
						"type": "integer"
					}
				},
				"y": {
					"parameters": {
						"type": "integer"
					}
				},
				"width": {
					"parameters": {
						"type": "integer"
					}
				},
				"height": {
					"parameters": {
						"type": "integer"
					}
				}
			},
			"rotate": {
				"angle": {
					"parameters": {
						"required": 1,
						"type": "number"
					}
				},
				"originX": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"originY": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"translate": {
				"offsetX": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"offsetY": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			},
			"transform": {
				"a": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"b": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"c": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"d": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"x": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				},
				"y": {
					"parameters": {
						"required": 1,
						"type": "integer"
					}
				}
			}
		},
		"notification": {
			"getNotification": {
				"parameters": {
					"type": "boolean"
				}
			},
			"connectionId": {
				"parameters": {
					"type": "string"
				}
			}
		}
	}
}
                 ');
    }

}
