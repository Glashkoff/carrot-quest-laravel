<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\ListService;

/**
 * Interface for service to get user's conversations
 * @package professionalweb\CarrotQuest\Interfaces\Services\Users
 */
interface ConversationsService extends ListService
{
    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return ConversationsService
     */
    public function setUserId(int $userId): self;
}