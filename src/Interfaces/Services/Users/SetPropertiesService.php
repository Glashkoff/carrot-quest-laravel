<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\Sendable;

/**
 * Interface for service to set user's properties
 * @package professionalweb\CarrotQuest\Interfaces\Services\Users
 */
interface SetPropertiesService extends Sendable
{
    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return SetPropertiesService
     */
    public function setUserId(int $userId): self;

    /**
     * Set properties
     *
     * @param array $properties
     *
     * @return SetPropertiesService
     */
    public function setProperties(array $properties): self;

    /**
     * Add property
     *
     * @param string $operation
     * @param string $property
     * @param        $value
     *
     * @return SetPropertiesService
     */
    public function addProperty(string $operation, string $property, $value): self;

    /**
     * Set user id is not carrot's id
     *
     * @param bool $flag
     *
     * @return SetPropertiesService
     */
    public function byUserId(bool $flag = true): self;
}