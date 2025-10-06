<?php
declare(strict_types = 1);

namespace Embed\Adapters\ImageShack\Detectors;

use Embed\Adapters\ImageShack\Extractor;
use Embed\Detectors\AuthorUrl as Detector;
use Psr\Http\Message\UriInterface;

class AuthorUrl extends Detector
{
    public function detect(): ?UriInterface
    {
        /** @var Extractor $extractor */
        $extractor = $this->extractor;
        $api = $extractor->getApi();
        $owner = $api->str('owner', 'username');

        if (is_string($owner) && $owner !== '') {
            return $extractor->getCrawler()->createUri("https://imageshack.com/{$owner}");
        }

        return parent::detect();
    }
}
