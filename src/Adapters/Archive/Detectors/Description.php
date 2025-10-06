<?php
declare(strict_types = 1);

namespace Embed\Adapters\Archive\Detectors;

use Embed\Adapters\Archive\Extractor;
use Embed\Detectors\Description as Detector;

class Description extends Detector
{
    public function detect(): ?string
    {
        /** @var Extractor $extractor */
        $extractor = $this->extractor;
        $api = $extractor->getApi();

        $result = $api->str('metadata', 'extract');
        return $result !== null ? $result : parent::detect();
    }
}
