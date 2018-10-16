<?php namespace professionalweb\CarrotQuest\Services\Applications;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ActiveUsersService as IActiveUsersService;

/**
 * Service to get active users
 * @package professionalweb\CarrotQuest\Services\Applications
 */
class ActiveUsersService implements IActiveUsersService
{
    use UseTransport;

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
     * @return int
     */
    public function getApplicationId(): int
    {
        return $this->applicationId;
    }

    /**
     * @param int $applicationId
     *
     * @return $this
     */
    public function setApplicationId(int $applicationId): self
    {
        $this->applicationId = $applicationId;

        return $this;
    }
}