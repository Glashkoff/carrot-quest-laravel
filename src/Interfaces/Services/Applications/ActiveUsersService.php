<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Applications;

use professionalweb\CarrotQuest\Interfaces\GetData;
use professionalweb\CarrotQuest\Interfaces\Models\User;

/**
 * Interface for service to get active users
 * @package professionalweb\CarrotQuest\Interfaces\Services\Applications
 *
 * @method get() : array|User[]
 */
interface ActiveUsersService extends GetData
{

}