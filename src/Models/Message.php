<?php namespace professionalweb\CarrotQuest\Models;

use professionalweb\CarrotQuest\Interfaces\Models\User;
use professionalweb\CarrotQuest\Interfaces\Models\Attachment;
use professionalweb\CarrotQuest\Interfaces\Models\Message as IMessage;

/**
 * Message model
 * @package professionalweb\CarrotQuest\Models
 */
class Message implements IMessage
{
    //<editor-fold desc="Fields">
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var bool
     */
    private $isFirst;

    /**
     * @var int
     */
    private $conversationId;

    /**
     * @var string
     */
    private $body;

    /**
     * @var User
     */
    private $user;

    /**
     * @var bool
     */
    private $isRead;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $sentVia;

    /**
     * @var int
     */
    private $emailId;

    /**
     * @var array|Attachment
     */
    private $attachments;
    //</editor-fold>

    /**
     * Get message id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get date message created at
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Check message is first
     *
     * @return bool
     */
    public function isFirst(): bool
    {
        return $this->isFirst;
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
     * Get message body
     *
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Check message is read
     *
     * @return bool
     */
    public function isRead(): bool
    {
        return $this->isRead;
    }

    /**
     * Get message type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get message sent via
     *
     * @return string
     */
    public function getSentVia(): string
    {
        return $this->sentVia;
    }

    /**
     * Get e-mail id
     *
     * @return int|null
     */
    public function getInboundEmailId(): ?int
    {
        return $this->emailId;
    }

    /**
     * Get attachments
     *
     * @return array|Attachment[]
     */
    public function getAttachments(): array
    {
        return $this->attachments;
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
     * @param string $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @param bool $isFirst
     *
     * @return $this
     */
    public function setIsFirst(bool $isFirst): self
    {
        $this->isFirst = $isFirst;

        return $this;
    }

    /**
     * @param int $conversationId
     *
     * @return $this
     */
    public function setConversationId(int $conversationId): self
    {
        $this->conversationId = $conversationId;

        return $this;
    }

    /**
     * @param string $body
     *
     * @return $this
     */
    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param User $user
     *
     * @return $this
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @param bool $isRead
     *
     * @return $this
     */
    public function setIsRead(bool $isRead): self
    {
        $this->isRead = $isRead;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string $sentVia
     *
     * @return $this
     */
    public function setSentVia(string $sentVia): self
    {
        $this->sentVia = $sentVia;

        return $this;
    }

    /**
     * @param int $emailId
     *
     * @return $this
     */
    public function setEmailId(int $emailId): self
    {
        $this->emailId = $emailId;

        return $this;
    }

    /**
     * @param array|Attachment $attachments
     *
     * @return $this
     */
    public function setAttachments($attachments): self
    {
        $this->attachments = $attachments;

        return $this;
    }


}