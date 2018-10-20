<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service to send notification
 * @package professionalweb\CarrotQuest\Interfaces\Services\Conversations
 */
interface AssignService extends Sendable
{
    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return AssignService
     */
    public function setConversationId(int $id): self;

    /**
     * Set assigned by admin
     *
     * @param string $id
     *
     * @return AssignService
     */
    public function fromAdmin(string $id): self;

    /**
     * Set replier admin id
     *
     * @param int $adminId
     *
     * @return AssignService
     */
    public function setAdminId(int $adminId): self;

    /**
     * Set bot name
     *
     * @param string $botName
     *
     * @return AssignService
     */
    public function setBotName(string $botName): self;
}