<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service to send notification some one is typing
 * @package professionalweb\CarrotQuest\Interfaces\Services\Conversations
 */
interface TypingService extends Sendable
{
    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return TypingService
     */
    public function setConversationId(int $id): self;

    /**
     * Set message body
     *
     * @param string $body
     *
     * @return TypingService
     */
    public function setBody(string $body): self;

    /**
     * Set reply is from user
     *
     * @param bool $flag
     *
     * @return TypingService
     */
    public function fromUser(bool $flag = true): self;

    /**
     * Set replier admin id
     *
     * @param int $adminId
     *
     * @return TypingService
     */
    public function setAdminId(int $adminId): self;

    /**
     * Set bot name
     *
     * @param string $botName
     *
     * @return TypingService
     */
    public function setBotName(string $botName): self;
}