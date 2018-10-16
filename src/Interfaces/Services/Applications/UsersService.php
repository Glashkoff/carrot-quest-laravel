<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Applications;

use professionalweb\CarrotQuest\Interfaces\Sortable;
use professionalweb\CarrotQuest\Interfaces\ListService;
use professionalweb\CarrotQuest\Interfaces\Models\User;
use professionalweb\CarrotQuest\Interfaces\HasConditions;

/**
 * Interface for service to get users in application
 * @package professionalweb\CarrotQuest\Interfaces\Services\Applications
 *
 * @method get() : array|User[]
 */
interface UsersService extends ListService, Sortable, HasConditions
{

}