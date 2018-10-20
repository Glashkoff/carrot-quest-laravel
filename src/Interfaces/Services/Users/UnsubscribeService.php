<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service to unsubscribe user
 * @package professionalweb\CarrotQuest\Interfaces\Services\Users
 */
interface UnsubscribeService extends Sendable
{
    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return UnsubscribeService
     */
    public function setUserId(int $userId): self;

    /**
     * User our user id
     *
     * @param bool $flag
     *
     * @return UnsubscribeService
     */
    public function byUserId(bool $flag = true): self;
}