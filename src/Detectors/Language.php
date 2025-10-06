<?php
declare(strict_types = 1);

namespace Embed\Detectors;

class Language extends Detector
{
    public function detect(): ?string
    {
        $document = $this->extractor->getDocument();
        $metas = $this->extractor->getMetas();
        $ld = $this->extractor->getLinkedData();

        $result = $document->select('/html')->str('lang');
        if ($result !== null) {
            return $result;
        }

        $result = $document->select('/html')->str('xml:lang');
        if ($result !== null) {
            return $result;
        }

        $result = $metas->str('language', 'lang', 'og:locale', 'dc:language');
        if ($result !== null) {
            return $result;
        }

        $result = $document->select('.//meta', ['http-equiv' => 'content-language'])->str('content');
        if ($result !== null) {
            return $result;
        }

        return $ld->str('inLanguage');
    }
}
