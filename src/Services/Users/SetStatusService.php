<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Users\SetStatusService as ISetStatusService;

/**
 * Service to set status
 * @package professionalweb\CarrotQuest\Services\Users
 */
class SetStatusService implements ISetStatusService
{
    use UseTransport;

    public const METHOD_SET_STATUS = '/users/{id}/setpresence';

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $sessionId;

    /**
     * @var string
     */
    private $status;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * @return mixed
     */
    public function send()
    {
        return $this->getTransport()->post($this->getMethod(), [
                'presence' => $this->getStatus(),
                'session'  => $this->getSessionId(),
            ])['data'] ?? [];
    }

    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return ISetStatusService
     */
    public function setUserId(int $userId): ISetStatusService
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return ISetStatusService
     */
    public function setStatus(string $status): ISetStatusService
    {
        $this->status = $status;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Set session id
     *
     * @param string $sessionId
     *
     * @return ISetStatusService
     */
    public function setSessionId(string $sessionId): ISetStatusService
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get session id
     *
     * @return null|string
     */
    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    /**
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getUserId(), self::METHOD_SET_STATUS);
    }
}