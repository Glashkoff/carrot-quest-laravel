<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service to set start conversation
 * @package professionalweb\CarrotQuest\Interfaces\Services\Users
 */
interface StartConversationService extends Sendable
{
    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return StartConversationService
     */
    public function setUserId(int $userId): self;

    /**
     * Set message body
     *
     * @param string $body
     *
     * @return StartConversationService
     */
    public function setBody(string $body): self;
}