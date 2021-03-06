<?php

namespace Bitmovin\api\resource\encodings\streams\muxings;

use Bitmovin\api\model\encodings\Encoding;
use Bitmovin\api\model\encodings\muxing\TSMuxing;
use Bitmovin\api\resource\encodings\streams\muxings\drm\TsDrmContainer;

class TsMuxingResource extends MuxingResource
{

    /** @var Encoding */
    private $encoding;

    /**
     * TsMuxingResource constructor.
     *
     * @param Encoding $encoding
     * @param string   $baseUri
     * @param string   $modelClassName
     * @param string   $apiKey
     */
    public function __construct(Encoding $encoding, $baseUri, $modelClassName, $apiKey)
    {
        parent::__construct($baseUri, $modelClassName, $apiKey);
        $this->encoding = $encoding;
    }

    /**
     * @param TSMuxing $muxing
     * @return TsDrmContainer
     */
    public function drm(TSMuxing $muxing)
    {
        return new TsDrmContainer($this->encoding, $muxing, $this->getApiKey());
    }

    /**
     * @param TSMuxing $tsMuxing
     *
     * @return TSMuxing
     * @throws \Bitmovin\api\exceptions\BitmovinException
     */
    public function create(TSMuxing $tsMuxing)
    {
        return parent::createMuxing($tsMuxing);
    }

    /**
     * @param TSMuxing $tsMuxing
     *
     * @return TSMuxing
     * @throws \Bitmovin\api\exceptions\BitmovinException
     */
    public function delete(TSMuxing $tsMuxing)
    {
        return parent::deleteMuxing($tsMuxing);
    }

    /**
     * @param TSMuxing $tsMuxing
     *
     * @return TSMuxing
     * @throws \Bitmovin\api\exceptions\BitmovinException
     */
    public function get(TSMuxing $tsMuxing)
    {
        return parent::getMuxing($tsMuxing);
    }

    /**
     * @param integer $offset
     * @param integer $limit
     *
     * @return TSMuxing[]
     * @throws \Bitmovin\api\exceptions\BitmovinException
     */
    public function listPage($offset = 0, $limit = 25)
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->listResourcePage($offset, $limit);
    }

    /**
     * @param $tsMuxingId
     *
     * @return TSMuxing
     * @throws \Bitmovin\api\exceptions\BitmovinException
     */
    public function getById($tsMuxingId)
    {
        return parent::getMuxingById($tsMuxingId);
    }

    /**
     * @param $tsMuxingId
     *
     * @return TSMuxing
     * @throws \Bitmovin\api\exceptions\BitmovinException
     */
    public function deleteById($tsMuxingId)
    {
        return parent::deleteMuxingById($tsMuxingId);
    }
}