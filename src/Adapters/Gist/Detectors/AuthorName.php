<?php
declare(strict_types = 1);

namespace Embed\Adapters\Gist\Detectors;

use Embed\Detectors\AuthorName as Detector;

/**
 * @extends Detector<\Embed\Adapters\Gist\Extractor>
 */
class AuthorName extends Detector
{
    public function detect(): ?string
    {
        $extractor = $this->extractor;
        $api = $extractor->getApi();

        $result = $api->str('owner');
        return (is_string($result) && trim($result) !== '') ? $result : parent::detect();
    }
}
