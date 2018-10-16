<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service add event for user
 * @package professionalweb\CarrotQuest\Interfaces\Services\Users
 */
interface AddEventService extends Sendable
{
    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return AddEventService
     */
    public function setUserId(int $userId): self;

    /**
     * Set event name
     *
     * @param string $name
     *
     * @return AddEventService
     */
    public function setEventName(string $name): self;

    /**
     * Set event params
     *
     * @param array $params
     *
     * @return AddEventService
     */
    public function setParams(array $params): self;

    /**
     * Set event date
     *
     * @param int $timestamp
     *
     * @return AddEventService
     */
    public function setCreatedAt(int $timestamp): self;

    /**
     * Set user id is not carrot's id
     *
     * @param bool $flag
     *
     * @return AddEventService
     */
    public function byUserId(bool $flag = true): self;
}