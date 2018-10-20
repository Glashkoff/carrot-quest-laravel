<?php namespace professionalweb\CarrotQuest\Interfaces;

/**
 * Interface for services work with lists
 * @package professionalweb\CarrotQuest\Interfaces
 */
interface ListService extends GetData
{
    public const DEFAULT_LIMIT = 10;

    public const MAX_LIMIT = 50;

    /**
     * Set offset
     *
     * @param int $offset
     *
     * @return ListService
     */
    public function offset(int $offset): self;

    /**
     * Set limit
     *
     * @param int $limit
     *
     * @return ListService
     */
    public function limit(int $limit): self;
}