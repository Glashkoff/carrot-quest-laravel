<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Models\Event;
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

    public const METHOD_GET_EVENTS = '/users/{id}/events';

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
        return array_map(function (array $data) {
            return new Event($data);
        }, $this->getTransport()->get($this->getMethod(), $this->getParams())['data'] ?? []);
    }

    /**
     * Prepare params
     *
     * @return array
     */
    protected function getParams(): array
    {
        $result = [];

        if (($filter = $this->getEventName()) !== null) {
            $result['filter_name'] = $filter;
        }
        if (($limit = $this->getLimit()) !== null) {
            $result['count'] = $limit;
        }
        if (($offset = $this->getOffset()) !== null) {
            $result['after'] = $offset;
        }

        return $result;
    }

    /**
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getUserId(), self::METHOD_GET_EVENTS);
    }
}