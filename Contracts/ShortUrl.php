<?php
namespace Hell0x\Shorten\Contracts;

interface ShortUrl{

    /**
     * Batch short links
     * @param array $urls
     * @return mixed
     */
    public function BatchShortChains(array $urls);
}