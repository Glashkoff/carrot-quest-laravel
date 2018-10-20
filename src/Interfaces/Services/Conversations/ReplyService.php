<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service to reply on messages
 * @package professionalweb\CarrotQuest\Interfaces\Services\Conversations
 */
interface ReplyService extends Sendable
{
    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return ReplyService
     */
    public function setConversationId(int $id): self;

    /**
     * Set message body
     *
     * @param string $body
     *
     * @return ReplyService
     */
    public function setBody(string $body): self;

    /**
     * Set reply is from user
     *
     * @param bool $flag
     *
     * @return ReplyService
     */
    public function fromUser(bool $flag = true): self;

    /**
     * Set replier admin id
     *
     * @param int $adminId
     *
     * @return ReplyService
     */
    public function setAdminId(int $adminId): self;

    /**
     * Set bot name
     *
     * @param string $botName
     *
     * @return ReplyService
     */
    public function setBotName(string $botName): self;

    /**
     * Mark message as note; Set type to 'note'
     *
     * @param bool $flag
     *
     * @return ReplyService
     */
    public function isNote(bool $flag = true): self;

    /**
     * @param int $id
     *
     * @return ReplyService
     */
    public function setAutoAssignId(int $id): self;
}