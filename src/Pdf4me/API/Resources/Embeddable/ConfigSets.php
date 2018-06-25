<?php

namespace Pdf4me\API\Resources\Embeddable;

use Pdf4me\API\Traits\Resource\Create;
use Pdf4me\API\Traits\Resource\Update;

/**
 * Class ConfigSets
 * Requires web_widget:write scoped oauth token
 */
class ConfigSets extends ResourceAbstract
{
    use Create;
    use Update;

    /**
     * {@inheritdoc}
     */
    protected $objectName = 'config_set';

    /**
     * {@inheritdoc}
     */
    protected $objectNamePlural = 'config_sets';
}
