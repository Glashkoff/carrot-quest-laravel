<?php namespace professionalweb\CarrotQuest\Interfaces;

/**
 * Interface for services work with lists
 * @package professionalweb\CarrotQuest\Interfaces
 */
interface ListService extends GetData
{
    public const DEFAULT_LIMIT = 10;

    public const MAX_LIMIT = 50;

    public function offset(int $offset): self;

    public function limit(int $limit): self;
}