<?php
declare(strict_types = 1);

namespace Embed\Adapters\Twitter\Detectors;

use Embed\Adapters\Twitter\Extractor;
use Embed\Detectors\AuthorUrl as Detector;
use Psr\Http\Message\UriInterface;

class AuthorUrl extends Detector
{
    public function detect(): ?UriInterface
    {
        /** @var Extractor $extractor */
        $extractor = $this->extractor;
        $api = $extractor->getApi();
        $username = $api->str('includes', 'users', '0', 'username');

        if (is_string($username) && $username !== '') {
            return $extractor->getCrawler()->createUri("https://twitter.com/{$username}");
        }

        return parent::detect();
    }
}
