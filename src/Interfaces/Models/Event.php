<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for Event model
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface Event
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get date event created at
     *
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * Get event type
     *
     * @return EventType
     */
    public function getType(): EventType;

    /**
     * Get event properties
     *
     * @return array
     */
    public function getProperties(): array;
}