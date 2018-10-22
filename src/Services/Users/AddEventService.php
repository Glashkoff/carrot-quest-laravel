<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Users\AddEventService as IAddEventService;

/**
 * Service to add events for user
 * @package professionalweb\CarrotQuest\Services\Users
 */
class AddEventService implements IAddEventService
{
    use UseTransport;

    public const METHOD_ADD_EVENT = '/users/{id}/events';

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $eventName;

    /**
     * @var array
     */
    private $params;

    /**
     * @var int
     */
    private $createdAt;

    /**
     * @var bool
     */
    private $isByUserId;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return IAddEventService
     */
    public function setUserId(int $userId): IAddEventService
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
     * Set event name
     *
     * @param string $name
     *
     * @return IAddEventService
     */
    public function setEventName(string $name): IAddEventService
    {
        $this->eventName = $name;

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
     * Set event params
     *
     * @param array $params
     *
     * @return IAddEventService
     */
    public function setParams(array $params): IAddEventService
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Get params
     *
     * @return array|null
     */
    public function getParams(): ?array
    {
        return $this->params;
    }

    /**
     * Set event date
     *
     * @param int $timestamp
     *
     * @return IAddEventService
     */
    public function setCreatedAt(int $timestamp): IAddEventService
    {
        $this->createdAt = $timestamp;

        return $this;
    }

    /**
     * Get created at timestamp
     *
     * @return int|null
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * Set user id is not carrot's id
     *
     * @param bool $flag
     *
     * @return IAddEventService
     */
    public function byUserId(bool $flag = true): IAddEventService
    {
        $this->isByUserId = $flag;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isByUserId(): ?bool
    {
        return $this->isByUserId;
    }

    /**
     * @return mixed
     */
    public function send()
    {
        return $this->getTransport()->post($this->getMethod(), $this->prepareParams())['data'] ?? [];
    }

    /**
     * Prepare params
     *
     * @return array
     */
    protected function prepareParams(): array
    {
        $result = ['event' => $this->getEventName()];

        if (!empty($params = $this->getParams())) {
            $result['params'] = json_encode($params);
        }
        if (($createdAt = $this->getCreatedAt()) !== null) {
            $result['created'] = $createdAt;
        }
        if ($this->isByUserId()) {
            $result['by_user_id'] = true;
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
        return str_replace('{id}', $this->getUserId(), self::METHOD_ADD_EVENT);
    }
}