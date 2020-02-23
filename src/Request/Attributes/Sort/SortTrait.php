<?php

namespace Dropsolid\UnomiSdkPhp\Request\Attributes\Sort;

/**
 * Trait SortTrait
 *
 * @package Dropsolid\UnomiSdkPhp\Request\Attributes\Sort
 */
trait SortTrait
{
    /**
     * @var array
     */
    protected $sort;

    /**
     * @param array $sort
     */
    public function setSort(array $sort = [])
    {
        $this->sort = $sort;
    }

    /**
     * @return array
     */
    public function getSort()
    {
        return $this->sort;
    }
}
