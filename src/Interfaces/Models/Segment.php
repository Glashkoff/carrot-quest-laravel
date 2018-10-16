<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for Segment model
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface Segment
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get filters
     *
     * @return array
     */
    public function getFilters(): array;
}