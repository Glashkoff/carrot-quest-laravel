<?php namespace professionalweb\CarrotQuest\Services\Conversations;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\TypingService as ITypingService;

/**
 * Service to set someone typing
 * @package professionalweb\CarrotQuest\Services\Conversations
 */
class TypingService implements ITypingService
{
    use UseTransport;

    public const METHOD_TYPING = '/conversations/{id}/settyping';

    /**
     * @var int
     */
    private $conversationId;

    /**
     * @var string
     */
    private $body;

    /**
     * @var bool
     */
    private $fromUser;

    /**
     * @var int
     */
    private $adminId;

    /**
     * @var string
     */
    private $botName;

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
     * Prepare params
     *
     * @return array
     */
    protected function getParams(): array
    {
        $result = [];

        if (($body = $this->getBody()) !== null) {
            $result['body'] = $body;
        }
        if ($this->isFromUser()) {
            $result['from_user'] = true;
        }
        if (($adminId = $this->getAdminId()) !== null) {
            $result['from_admin'] = $adminId;
        }
        if (($botName = $this->getBotName()) !== null) {
            $result['bot_name'] = $botName;
        }

        return $result;
    }

    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return ITypingService
     */
    public function setConversationId(int $id): ITypingService
    {
        $this->conversationId = $id;

        return $this;
    }

    /**
     * Get conversation id
     *
     * @return int
     */
    public function getConversationId(): int
    {
        return $this->conversationId;
    }

    /**
     * Set message body
     *
     * @param string $body
     *
     * @return ITypingService
     */
    public function setBody(string $body): ITypingService
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return null|string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * Set reply is from user
     *
     * @param bool $flag
     *
     * @return ITypingService
     */
    public function fromUser(bool $flag = true): ITypingService
    {
        $this->fromUser = $flag;

        return $this;
    }

    /**
     * Is from user
     *
     * @return bool|null
     */
    public function isFromUser(): ?bool
    {
        return $this->fromUser;
    }

    /**
     * Set replier admin id
     *
     * @param int $adminId
     *
     * @return ITypingService
     */
    public function setAdminId(int $adminId): ITypingService
    {
        $this->adminId = $adminId;

        return $this;
    }

    /**
     * Get admin id
     *
     * @return int|null
     */
    public function getAdminId(): ?int
    {
        return $this->adminId;
    }

    /**
     * Set bot name
     *
     * @param string $botName
     *
     * @return ITypingService
     */
    public function setBotName(string $botName): ITypingService
    {
        $this->botName = $botName;

        return $this;
    }

    /**
     * Get bot name
     *
     * @return null|string
     */
    public function getBotName(): ?string
    {
        return $this->botName;
    }

    /**
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getConversationId(), self::METHOD_TYPING);
    }
}