<?php namespace professionalweb\CarrotQuest\Services\Applications;

use professionalweb\CarrotQuest\Traits\HasLimits;
use professionalweb\CarrotQuest\Traits\IsSortable;
use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Traits\HasConditions;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\UsersService as IUsersService;

/**
 * Service to work with users
 * @package professionalweb\CarrotQuest\Services\Applications
 */
class UsersService implements IUsersService
{
    use UseTransport, IsSortable, HasConditions, HasLimits;

    /**
     * @var int
     */
    private $applicationId;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * @return array
     */
    public function get(): array
    {
        // TODO: Implement get() method.
    }

    /**
     * Set application ID
     *
     * @param int $id
     *
     * @return IUsersService
     */
    public function setApplicationId(int $id): IUsersService
    {
        $this->applicationId = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getApplicationId(): int
    {
        return $this->applicationId;
    }
}