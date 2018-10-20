<?php namespace professionalweb\CarrotQuest\Models;

use professionalweb\CarrotQuest\Interfaces\Models\User;
use professionalweb\CarrotQuest\Interfaces\Models\Admin;
use professionalweb\CarrotQuest\Models\User as UserModel;
use professionalweb\CarrotQuest\Models\Admin as AdminModel;
use professionalweb\CarrotQuest\Interfaces\Models\Attachment;
use professionalweb\CarrotQuest\Models\Attachment as AttachmentModel;
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
     * @var Admin
     */
    private $admin;

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

    public function __construct(array $data = [])
    {
        $this->fill($data);
    }

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
     * Check is admin
     *
     * @return bool
     */
    public function isFromAdmin(): bool
    {
        return $this->admin !== null;
    }

    /**
     * Set admin
     *
     * @param Admin $admin
     *
     * @return Message
     */
    public function setAdmin(Admin $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return Admin
     */
    public function getAdmin(): Admin
    {
        return $this->admin;
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

    /**
     * Fill model
     *
     * @param array $data
     *
     * @return Message
     */
    public function fill(array $data): self
    {
        $this
            ->setId($data['id'] ?? 0)
            ->setCreatedAt(isset($data['created']) ? date('Y-m-d H:i:s', $data['created']) : '')
            ->setIsFirst(isset($data['first']) && $data['first'])
            ->setConversationId($data['conversation'] ?? 0)
            ->setBody($data['body'] ?? '')
            ->setIsRead(isset($data['read']) && $data['read'])
            ->setType($data['type'] ?? '')
            ->setSentVia($data['sent_via'] ?? '')
            ->setEmailId($data['inbound_email'] ?? 0);
        if (isset($data['from']) && \is_array($data['from'])) {
            $this->setAdmin(new AdminModel($data['from']));
        } else {
            $this->setUser(new UserModel(['id' => $data['from']]));
        }
        if (isset($data['attachments'])) {
            $attachments = [];
            foreach ($data['attachments'] as $attachment) {
                $attachments[] = new AttachmentModel($attachment);
            }
            $this->setAttachments($attachments);
        }

        return $this;
    }
}