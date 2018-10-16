<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for User
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface User
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get user id
     *
     * @return string
     */
    public function getUserId(): string;

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus(): string;

    /**
     * Get status details
     *
     * @return array
     */
    public function getStatusDetails(): array;

    /**
     * Get properties
     *
     * @return array
     */
    public function getProperties(): array;

    /**
     * Get custom properties
     *
     * @return array
     */
    public function getCustomProperties(): array;

    /**
     * Get events properties
     *
     * @return array
     */
    public function getEventProperties(): array;

    /**
     * Get events
     *
     * @return array|Event[]
     */
    public function getEvents(): array;

    /**
     * Get segments
     *
     * @return array|Segment[]
     */
    public function getSegments(): array;

    /**
     * Get notes
     *
     * @return array|Note[]
     */
    public function getNotes(): array;
}