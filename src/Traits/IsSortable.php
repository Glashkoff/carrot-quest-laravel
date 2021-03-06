<?php namespace professionalweb\CarrotQuest\Traits;

use  professionalweb\CarrotQuest\Interfaces\Sortable;

/**
 * Trait for classes can sort data
 * @package professionalweb\CarrotQuest\Traits
 */
trait IsSortable
{
    /**
     * Sort by param
     *
     * @var string
     */
    private $orderBy;

    /**
     * Desc or asc
     *
     * @var int
     */
    private $sortBy;

    /**
     * Set order
     *
     * @param string $param
     * @param int    $order
     *
     * @return Sortable
     */
    public function orderBy(string $param, int $order = SORT_DESC): Sortable
    {
        $this->orderBy = $param;
        $this->sortBy = $order;

        return $this;
    }

    /**
     * Get field sort by
     *
     * @return null|string
     */
    public function getOrderBy(): ?string
    {
        return $this->orderBy;
    }

    /**
     * SORT_DESC or SORT_ASC
     *
     * @return int|null
     */
    public function getSorting(): ?int
    {
        return $this->sortBy;
    }
}