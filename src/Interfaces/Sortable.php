<?php namespace professionalweb\CarrotQuest\Interfaces;

/**
 * Interface for services can sort data
 * @package professionalweb\CarrotQuest\Interfaces
 */
interface Sortable
{
    /**
     * Sort data by param
     *
     * @param string $param
     * @param int    $order
     *
     * @return Sortable
     */
    public function orderBy(string $param, int $order = SORT_DESC): self;
}