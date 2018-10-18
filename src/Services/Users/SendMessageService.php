<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Users\SendMessageService as ISendMessageService;

/**
 * Service to send message
 * @package professionalweb\CarrotQuest\Services\Users
 */
class SendMessageService implements ISendMessageService
{
    use UseTransport;

    public const METHOD_SEND_MESSAGE = '/users/{id}/sendmessage';

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $type;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return ISendMessageService
     */
    public function setUserId(int $userId): ISendMessageService
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get user id
     *
     * @return int
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * Set message body
     *
     * @param string $body
     *
     * @return ISendMessageService
     */
    public function setBody(string $body): ISendMessageService
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return ISendMessageService
     */
    public function setType(string $type): ISendMessageService
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
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
        $result = ['body' => $this->getBody()];

        if (($type = $this->getType()) !== null) {
            $result['type'] = $type;
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
        return str_replace('{id}', $this->getUserId(), self::METHOD_SEND_MESSAGE);
    }
}