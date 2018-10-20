<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service to send message to user
 * @package professionalweb\CarrotQuest\Interfaces\Services\Users
 */
interface SendMessageService extends Sendable
{
    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return SendMessageService
     */
    public function setUserId(int $userId): self;

    /**
     * Set message body
     *
     * @param string $body
     *
     * @return SendMessageService
     */
    public function setBody(string $body): self;

    /**
     * Set type
     *
     * @param string $type
     *
     * @return SendMessageService
     */
    public function setType(string $type): self;
}