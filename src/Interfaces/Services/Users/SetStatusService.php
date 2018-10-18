<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service to set status to user
 * @package professionalweb\CarrotQuest\Interfaces\Services\Users
 */
interface SetStatusService extends Sendable
{
    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return SetStatusService
     */
    public function setUserId(int $userId): self;

    /**
     * Set status
     *
     * @param string $status
     *
     * @return SetStatusService
     */
    public function setStatus(string $status): self;

    /**
     * Set session id
     *
     * @param string $sessionId
     *
     * @return SetStatusService
     */
    public function setSessionId(string $sessionId): self;
}