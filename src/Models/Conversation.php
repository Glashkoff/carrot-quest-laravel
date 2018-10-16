<?php namespace professionalweb\CarrotQuest\Models;

use professionalweb\CarrotQuest\Interfaces\Models\User;
use professionalweb\CarrotQuest\Interfaces\Models\Admin;
use professionalweb\CarrotQuest\Interfaces\Models\Message;
use professionalweb\CarrotQuest\Interfaces\Models\Conversation as IConversation;

/**
 * Conversation model
 * @package professionalweb\CarrotQuest\Models
 */
class Conversation implements IConversation
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
     * @var User
     */
    private $user;

    /**
     * @var bool
     */
    private $isRead;

    /**
     * @var bool
     */
    private $isReplied;

    /**
     * @var bool
     */
    private $isClicked;

    /**
     * @var bool
     */
    private $isClosed;

    /**
     * @var int
     */
    private $startMessageId;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $replyType;

    /**
     * @var Message
     */
    private $lastMessage;

    /**
     * @var int
     */
    private $messageQuantity;

    /**
     * @var Admin
     */
    private $admin;

    /**
     * @var int
     */
    private $unreadMessagesQuantity;

    /**
     * @var Admin
     */
    private $lastAdmin;

    /**
     * @var string
     */
    private $updatedAt;

    /**
     * @var array
     */
    private $tags;
    //</editor-fold>

    /**
     * Get conversation ID
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get date conversation created at
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
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
     * Check first message is read
     *
     * @return bool
     */
    public function isRead(): bool
    {
        return $this->isRead;
    }

    /**
     * Check did user reply
     *
     * @return bool
     */
    public function isReplied(): bool
    {
        return $this->isReplied;
    }

    /**
     * Check user clicked any link in first message
     *
     * @return bool
     */
    public function isClicked(): bool
    {
        return $this->isClicked;
    }

    /**
     * Check dialog is closed
     *
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->isClosed;
    }

    /**
     * Get first message id
     *
     * @return int
     */
    public function getStartMessageId(): int
    {
        return $this->startMessageId;
    }

    /**
     * Get dialog type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get reply type
     *
     * @return string
     */
    public function getReplyType(): string
    {
        return $this->replyType;
    }

    /**
     * Get last message
     *
     * @return Message
     */
    public function getLastMessage(): Message
    {
        return $this->lastMessage;
    }

    /**
     * Count messages
     *
     * @return int
     */
    public function getMessagesQty(): int
    {
        return $this->messageQuantity;
    }

    /**
     * Get admin
     *
     * @return null|Admin
     */
    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    /**
     * Count unread messages
     *
     * @return int
     */
    public function getUnreadMessagesQty(): int
    {
        return $this->unreadMessagesQuantity;
    }

    /**
     * Get last admin
     *
     * @return Admin
     */
    public function getLasAdmin(): Admin
    {
        return $this->lastAdmin;
    }

    /**
     * Get last message date
     *
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * Get tags
     *
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
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
     * @param bool $isReplied
     *
     * @return $this
     */
    public function setIsReplied(bool $isReplied): self
    {
        $this->isReplied = $isReplied;

        return $this;
    }

    /**
     * @param bool $isClicked
     *
     * @return $this
     */
    public function setIsClicked(bool $isClicked): self
    {
        $this->isClicked = $isClicked;

        return $this;
    }

    /**
     * @param bool $isClosed
     *
     * @return $this
     */
    public function setIsClosed(bool $isClosed): self
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    /**
     * @param int $startMessageId
     *
     * @return $this
     */
    public function setStartMessageId(int $startMessageId): self
    {
        $this->startMessageId = $startMessageId;

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
     * @param string $replyType
     *
     * @return $this
     */
    public function setReplyType(string $replyType): self
    {
        $this->replyType = $replyType;

        return $this;
    }

    /**
     * @param Message $lastMessage
     *
     * @return $this
     */
    public function setLastMessage(Message $lastMessage): self
    {
        $this->lastMessage = $lastMessage;

        return $this;
    }

    /**
     * @param int $messageQuantity
     *
     * @return $this
     */
    public function setMessageQuantity(int $messageQuantity): self
    {
        $this->messageQuantity = $messageQuantity;

        return $this;
    }

    /**
     * @param Admin $admin
     *
     * @return $this
     */
    public function setAdmin(Admin $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * @param int $unreadMessagesQuantity
     *
     * @return $this
     */
    public function setUnreadMessagesQuantity(int $unreadMessagesQuantity): self
    {
        $this->unreadMessagesQuantity = $unreadMessagesQuantity;

        return $this;
    }

    /**
     * @param Admin $lastAdmin
     *
     * @return $this
     */
    public function setLastAdmin(Admin $lastAdmin): self
    {
        $this->lastAdmin = $lastAdmin;

        return $this;
    }

    /**
     * @param string $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt(string $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @param array $tags
     *
     * @return $this
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }
}