<?php namespace professionalweb\CarrotQuest\Services\Conversations;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\ReplyService as IReplyService;

/**
 * Service to reply on messages
 * @package professionalweb\CarrotQuest\Services\Conversations
 */
class ReplyService implements IReplyService
{
    use UseTransport;

    public const METHOD_REPLY = '/conversations/{id}/reply';

    //<editor-fold desc="Fields">
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

    /**
     * @var bool
     */
    private $isNote;

    /**
     * @var int
     */
    private $autoAssignId;

    //</editor-fold>

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * Set message body
     *
     * @param string $body
     *
     * @return IReplyService
     */
    public function setBody(string $body): IReplyService
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
     * @return IReplyService
     */
    public function fromUser(bool $flag = true): IReplyService
    {
        $this->fromUser = $flag;

        return $this;
    }

    /**
     * @return bool
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
     * @return IReplyService
     */
    public function setAdminId(int $adminId): IReplyService
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
     * @return IReplyService
     */
    public function setBotName(string $botName): IReplyService
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
     * Mark message as note; Set type to 'note'
     *
     * @param bool $flag
     *
     * @return IReplyService
     */
    public function isNote(bool $flag = true): IReplyService
    {
        $this->isNote = $flag;

        return $this;
    }

    /**
     * Check message is note
     *
     * @return bool|null
     */
    public function getIsNote(): ?bool
    {
        return $this->isNote;
    }

    /**
     * @param int $id
     *
     * @return IReplyService
     */
    public function setAutoAssignId(int $id): IReplyService
    {
        $this->autoAssignId = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return int|null
     */
    public function getAutoAssignId(): ?int
    {
        return $this->autoAssignId;
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

        $result['body'] = $this->getBody();
        if (($fromUser = $this->isFromUser()) !== null) {
            $result['from_user'] = $fromUser;
        }
        if (($adminId = $this->getAdminId()) !== null) {
            $result['from_admin'] = $adminId;
        }
        if ($this->isNote()) {
            $result['type'] = 'note';
        }
        if (($autoAssign = $this->getAutoAssignId()) !== null) {
            $result['auto_assign'] = $autoAssign;
        }

        return $result;
    }

    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return IReplyService
     */
    public function setConversationId(int $id): IReplyService
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
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getConversationId(), self::METHOD_REPLY);
    }
}