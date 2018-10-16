<?php namespace professionalweb\CarrotQuest\Models;

use professionalweb\CarrotQuest\Interfaces\Models\EventType;
use professionalweb\CarrotQuest\Interfaces\Models\Event as IEvent;

/**
 * Event model
 * @package professionalweb\CarrotQuest\Models
 */
class Event implements IEvent
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var EventType
     */
    private $type;

    /**
     * @var array
     */
    private $properties;

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get date event created at
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Get event type
     *
     * @return EventType
     */
    public function getType(): EventType
    {
        return $this->type;
    }

    /**
     * Get event properties
     *
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @param EventType $type
     *
     * @return $this
     */
    public function setType(EventType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param array $properties
     *
     * @return $this
     */
    public function setProperties(array $properties): self
    {
        $this->properties = $properties;

        return $this;
    }
}