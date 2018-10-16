<?php namespace professionalweb\CarrotQuest\Models;

use professionalweb\CarrotQuest\Interfaces\Models\Note;
use professionalweb\CarrotQuest\Interfaces\Models\Event;
use professionalweb\CarrotQuest\Interfaces\Models\Segment;
use professionalweb\CarrotQuest\Interfaces\Models\User as IUser;

/**
 * User model
 * @package professionalweb\CarrotQuest\Models
 */
class User implements IUser
{
    //<editor-fold desc="Fields">
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $status;

    /**
     * @var array
     */
    private $statusDetails;

    /**
     * @var array
     */
    private $properties;

    /**
     * @var array
     */
    private $customProperties;

    /**
     * @var array
     */
    private $eventProperties;

    /**
     * @var array|Event[]
     */
    private $events;

    /**
     * @var array|Segment[]
     */
    private $segments;

    /**
     * @var array|Note[]
     */
    private $notes;
    //</editor-fold>

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
     * Get user id
     *
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Get status details
     *
     * @return array
     */
    public function getStatusDetails(): array
    {
        return $this->statusDetails;
    }

    /**
     * Get properties
     *
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * Get custom properties
     *
     * @return array
     */
    public function getCustomProperties(): array
    {
        return $this->customProperties;
    }

    /**
     * Get events properties
     *
     * @return array
     */
    public function getEventProperties(): array
    {
        return $this->eventProperties;
    }

    /**
     * Get events
     *
     * @return array|Event[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * Get segments
     *
     * @return array|Segment[]
     */
    public function getSegments(): array
    {
        return $this->segments;
    }

    /**
     * Get notes
     *
     * @return array|Note[]
     */
    public function getNotes(): array
    {
        return $this->notes;
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
     * @param string $userId
     *
     * @return $this
     */
    public function setUserId(string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param array $statusDetails
     *
     * @return $this
     */
    public function setStatusDetails(array $statusDetails): self
    {
        $this->statusDetails = $statusDetails;

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

    /**
     * @param array $customProperties
     *
     * @return $this
     */
    public function setCustomProperties(array $customProperties): self
    {
        $this->customProperties = $customProperties;

        return $this;
    }

    /**
     * @param array $eventProperties
     *
     * @return $this
     */
    public function setEventProperties(array $eventProperties): self
    {
        $this->eventProperties = $eventProperties;

        return $this;
    }

    /**
     * @param array|Event[] $events
     *
     * @return $this
     */
    public function setEvents($events): self
    {
        $this->events = $events;

        return $this;
    }

    /**
     * @param array|Segment[] $segments
     *
     * @return $this
     */
    public function setSegments($segments): self
    {
        $this->segments = $segments;

        return $this;
    }

    /**
     * @param array|Note[] $notes
     *
     * @return $this
     */
    public function setNotes($notes): self
    {
        $this->notes = $notes;

        return $this;
    }
}