<?php

namespace Dropsolid\UnomiSdkPhp\Serializer;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * Class ParseDataDenormalizer
 *
 * @package Dropsolid\UnomiSdkPhp\Serializer
 */
class ParseDataDenormalizer implements
    DenormalizerInterface,
    DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    /**
     * @inheritdoc
     */
    public function denormalize(
        $data,
        string $class,
        string $format = null,
        array $context = []
    ) {
    
        return $this->denormalizer->denormalize(
            $data['data'],
            $class,
            $format,
            $context
        );
    }

    /**
     * @inheritdoc
     */
    public function supportsDenormalization($data, string $type, string $format = null)
    {
        return isset($data['data']) && count($data) === 1;
    }
}
