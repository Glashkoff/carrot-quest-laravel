<?php namespace professionalweb\CarrotQuest\Interfaces\Models;

/**
 * Interface for Message model
 * @package professionalweb\CarrotQuest\Interfaces\Models
 */
interface Message
{
    //<editor-fold desc="Constants">
    public const TYPE_REPLY_USER = 'reply_user';

    public const TYPE_REPLY_DJANGO_USER = 'reply_django_user';

    public const TYPE_NOTE = 'note';

    public const TYPE_TAG_ADDED = 'tag_added';

    public const TYPE_TAG_DELETED = 'tag_deleted';

    public const TYPE_ASSIGNED = 'assigned';

    public const TYPE_CLOSED = 'closed';

    public const TYPE_OPENED = 'opened';

    public const TYPE_SERVICE = 'service';

    public const SENT_VIA_WEB_USER = 'web_user';

    public const SENT_VIA_WEB_PANEL = 'web_panel';

    public const SENT_VIA_EMAIL_USER = 'email_user';

    public const SENT_VIA_EMAIL_ADMIN = 'email_admin';

    public const SENT_VIA_APP_ANDROID = 'app_android';

    public const SENT_VIA_APP_CHROME = 'app_chrome';

    public const SENT_VIA_APP_DESKTOP = 'app_desktop';

    public const SENT_VIA_MESSAGE_AUTO = 'message_auto';

    public const SENT_VIA_MESSAGE_MANUAL = 'message_manual';

    //</editor-fold>

    /**
     * Get message id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get date message created at
     *
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * Check message is first
     *
     * @return bool
     */
    public function isFirst(): bool;

    /**
     * Get conversation id
     *
     * @return int
     */
    public function getConversationId(): int;

    /**
     * Get message body
     *
     * @return string
     */
    public function getBody(): string;

    /**
     * Get user
     *
     * @return User
     */
    public function getUser(): User;

    /**
     * Check message is read
     *
     * @return bool
     */
    public function isRead(): bool;

    /**
     * Get message type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Get message sent via
     *
     * @return string
     */
    public function getSentVia(): string;

    /**
     * Get e-mail id
     *
     * @return int|null
     */
    public function getInboundEmailId(): ?int;

    /**
     * Get attachments
     *
     * @return array|Attachment[]
     */
    public function getAttachments(): array;
}