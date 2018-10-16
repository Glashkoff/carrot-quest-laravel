<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service to close conversation
 * @package professionalweb\CarrotQuest\Interfaces\Services\Conversations
 */
interface CloseService extends Sendable
{
    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return CloseService
     */
    public function setConversationId(int $id): self;

    /**
     * Set replier admin id
     *
     * @param int $adminId
     *
     * @return CloseService
     */
    public function setAdminId(int $adminId): self;

    /**
     * Set bot name
     *
     * @param string $botName
     *
     * @return CloseService
     */
    public function setBotName(string $botName): self;
}