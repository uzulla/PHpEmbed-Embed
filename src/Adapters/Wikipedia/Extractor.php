<?php
declare(strict_types = 1);

namespace Embed\Adapters\Wikipedia;

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
            'title' => new Detectors\Title($this),
            'description' => new Detectors\Description($this),
        ];
    }
}
