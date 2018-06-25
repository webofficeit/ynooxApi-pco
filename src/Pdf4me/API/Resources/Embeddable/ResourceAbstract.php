<?php

namespace Pdf4me\API\Resources\Embeddable;

use Pdf4me\API\Traits\Resource\ResourceName;

/**
 * Abstract class for Embeddable resources
 */
abstract class ResourceAbstract extends \Pdf4me\API\Resources\ResourceAbstract
{
    use ResourceName;

    /**
     * @var string
     **/
    protected $prefix = 'embeddable/api/';

    /**
     * @var string
     */
    protected $apiBasePath = '';
}
