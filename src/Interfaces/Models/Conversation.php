<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for Conversation model
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface Conversation
{
    public const TYPE_EMAIL = 'email';

    public const TYPE_POPUP_SMALL = 'popup_small';

    public const TYPE_POPUP_BIG = 'popup_big';

    public const TYPE_POPUP_CHAT = 'popup_chat';

    public const REPLY_TYPE_TEXT = 'text';

    public const REPLY_TYPE_EMAIL = 'email';

    public const REPLY_TYPE_PHONE = 'phone';

    public const REPLY_TYPE_NO = 'no';

    /**
     * Get conversation ID
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get date conversation created at
     *
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * Get user
     *
     * @return User
     */
    public function getUser(): User;

    /**
     * Check first message is read
     *
     * @return bool
     */
    public function isRead(): bool;

    /**
     * Check did user reply
     *
     * @return bool
     */
    public function isReplied(): bool;

    /**
     * Check user clicked any link in first message
     *
     * @return bool
     */
    public function isClicked(): bool;

    /**
     * Check dialog is closed
     *
     * @return bool
     */
    public function isClosed(): bool;

    /**
     * Get first message id
     *
     * @return int
     */
    public function getStartMessageId(): int;

    /**
     * Get dialog type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Get reply type
     *
     * @return string
     */
    public function getReplyType(): string;

    /**
     * Get last message
     *
     * @return Message
     */
    public function getLastMessage(): Message;

    /**
     * Count messages
     *
     * @return int
     */
    public function getMessagesQty(): int;

    /**
     * Get admin
     *
     * @return null|Admin
     */
    public function getAdmin(): ?Admin;

    /**
     * Count unread messages
     *
     * @return int
     */
    public function getUnreadMessagesQty(): int;

    /**
     * Get last admin
     *
     * @return Admin
     */
    public function getLasAdmin(): Admin;

    /**
     * Get last message date
     *
     * @return string
     */
    public function getUpdatedAt(): string;

    /**
     * Get tags
     *
     * @return array
     */
    public function getTags(): array;
}