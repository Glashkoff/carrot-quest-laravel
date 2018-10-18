<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Users\UnsubscribeService as IUnsubscribeService;

/**
 * Service to unsubscribe user
 * @package professionalweb\CarrotQuest\Services\Users
 */
class UnsubscribeService implements IUnsubscribeService
{
    use UseTransport;

    public const METHOD_UNSUBSCRIBE = '/users/{id}/startconversation';

    /**
     * @var int
     */
    private $userId;

    /**
     * @var bool
     */
    private $byUserId;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * @return mixed
     */
    public function send()
    {
        return $this->getTransport()->post($this->getMethod(), $this->getParams())['data'] ?? [];
    }

    /**
     * Prepare params for request
     *
     * @return array
     */
    protected function getParams(): array
    {
        $result = [];

        if ($this->isByUserId()) {
            $result['by_user_id'] = true;
        }

        return $result;
    }

    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return IUnsubscribeService
     */
    public function setUserId(int $userId): IUnsubscribeService
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
     * User our user id
     *
     * @param bool $flag
     *
     * @return IUnsubscribeService
     */
    public function byUserId(bool $flag = true): IUnsubscribeService
    {
        $this->byUserId = $flag;

        return $this;
    }

    /**
     * Check byUserId flag
     *
     * @return bool|null
     */
    public function isByUserId(): ?bool
    {
        return $this->byUserId;
    }

    /**
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getUserId(), self::METHOD_UNSUBSCRIBE);
    }
}