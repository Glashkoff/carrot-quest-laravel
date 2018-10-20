<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Applications;

use professionalweb\CarrotQuest\Interfaces\Sortable;
use professionalweb\CarrotQuest\Interfaces\ListService;
use professionalweb\CarrotQuest\Interfaces\HasConditions;

/**
 * Interface for service to get users in application
 * @package professionalweb\CarrotQuest\Interfaces\Services\Applications
 */
interface UsersService extends ListService, Sortable, HasConditions
{
    /**
     * Set application ID
     *
     * @param int $id
     *
     * @return UsersService
     */
    public function setApplicationId(int $id): self;
}