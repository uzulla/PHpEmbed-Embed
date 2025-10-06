<?php
declare(strict_types = 1);

namespace Embed\Adapters\Gist;

use Embed\Extractor as Base;

class Extractor extends Base
{
    private ?Api $api = null;

    public function getApi(): Api
    {
        if ($this->api === null) {
            $this->api = new Api($this);
        }
        return $this->api;
    }

    /**
     * @return array<string, \Embed\Detectors\Detector>
     */
    public function createCustomDetectors(): array
    {
        return [
            'authorName' => new Detectors\AuthorName($this),
            'authorUrl' => new Detectors\AuthorUrl($this),
            'publishedTime' => new Detectors\PublishedTime($this),
            'code' => new Detectors\Code($this),
        ];
    }
}
