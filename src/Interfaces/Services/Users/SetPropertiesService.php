<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service to set user's properties
 * @package professionalweb\CarrotQuest\Interfaces\Services\Users
 */
interface SetPropertiesService extends Sendable
{
    /**
     * Filter by event name
     *
     * @param array $properties
     *
     * @return SetPropertiesService
     */
    public function setProperties(array $properties): self;

    /**
     * Set user id is not carrot's id
     *
     * @param bool $flag
     *
     * @return SetPropertiesService
     */
    public function byUserId(bool $flag = true): self;
}