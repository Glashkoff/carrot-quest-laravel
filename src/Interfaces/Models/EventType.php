<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for EventType model
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface EventType
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get type name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get score
     *
     * @return int
     */
    public function getScore(): int;
}