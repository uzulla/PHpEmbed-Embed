<?php
declare(strict_types = 1);

namespace Embed\Adapters\Gist\Detectors;

use Embed\Adapters\Gist\Extractor;
use Embed\Detectors\AuthorUrl as Detector;
use Psr\Http\Message\UriInterface;

class AuthorUrl extends Detector
{
    public function detect(): ?UriInterface
    {
        /** @var Extractor $extractor */
        $extractor = $this->extractor;
        $api = $extractor->getApi();
        $owner = $api->str('owner');

        if ($owner !== null) {
            return $this->extractor->getCrawler()->createUri("https://github.com/{$owner}");
        }

        return parent::detect();
    }
}
