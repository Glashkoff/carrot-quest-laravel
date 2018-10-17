<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Traits\HasLimits;
use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Users\EventsService as IEventsService;

/**
 * Service to get user's events
 * @package professionalweb\CarrotQuest\Services\Users\
 */
class EventsService implements IEventsService
{
    use UseTransport, HasLimits;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $eventName;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return IEventsService
     */
    public function setUserId(int $userId): IEventsService
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get user id
     *
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * Filter by event name
     *
     * @param string $eventName
     *
     * @return IEventsService
     */
    public function whereEventName(string $eventName): IEventsService
    {
        $this->eventName = $eventName;

        return $this;
    }

    /**
     * Get event name
     *
     * @return null|string
     */
    public function getEventName(): ?string
    {
        return $this->eventName;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        // TODO: Implement get() method.
    }
}