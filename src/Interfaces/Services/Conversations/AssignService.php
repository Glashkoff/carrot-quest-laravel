<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service to send notification
 * @package professionalweb\CarrotQuest\Interfaces\Services\Conversations
 */
interface AssignService extends Sendable
{
    /**
     * Set assigned by admin
     *
     * @param string $id
     *
     * @return ReplyService
     */
    public function fromAdmin(string $id): self;

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
}