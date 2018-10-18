<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Users\StartConversationService as IStartConversationService;

/**
 * Service to start conversation
 * @package professionalweb\CarrotQuest\Services\Users
 */
class StartConversationService implements IStartConversationService
{
    use UseTransport;

    public const METHOD_START_CONVERSATION = '/users/{id}/startconversation';

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $body;

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
                'body' => $this->getBody(),
            ])['data'] ?? [];
    }

    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return IStartConversationService
     */
    public function setUserId(int $userId): IStartConversationService
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
     * @return IStartConversationService
     */
    public function setBody(string $body): IStartConversationService
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get message body
     *
     * @return null|string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getUserId(), self::METHOD_START_CONVERSATION);
    }
}