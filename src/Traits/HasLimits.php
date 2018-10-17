<?php namespace professionalweb\CarrotQuest\Traits;

use professionalweb\CarrotQuest\Interfaces\ListService;

trait HasLimits
{
    /**
     * @var int
     */
    private $offset;

    /**
     * @var int
     */
    private $limit;

    /**
     * Set offset
     *
     * @param int $offset
     *
     * @return ListService
     */
    public function offset(int $offset): ListService
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Get offset
     *
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * Set limit
     *
     * @param int $limit
     *
     * @return ListService
     */
    public function limit(int $limit): ListService
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Get limit
     *
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }
}