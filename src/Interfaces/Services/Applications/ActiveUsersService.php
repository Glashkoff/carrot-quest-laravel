<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Applications;

use professionalweb\CarrotQuest\Interfaces\GetData;

/**
 * Interface for service to get active users
 * @package professionalweb\CarrotQuest\Interfaces\Services\Applications
 */
interface ActiveUsersService extends GetData
{
    /**
     * Set application ID
     *
     * @param int $id
     *
     * @return ActiveUsersService
     */
    public function setApplicationId(int $id): self;
}