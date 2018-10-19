<?php namespace professionalweb\CarrotQuest\Services\Applications;

use professionalweb\CarrotQuest\Models\User;
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

    public const METHOD_ACTIVE_USERS = '/apps/{id}/activeusers';

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
        return array_map(function (array $data) {
            return new User($data);
        }, $this->getTransport()->get($this->getMethod())['data'] ?? []);
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
    public function setApplicationId(int $applicationId): IActiveUsersService
    {
        $this->applicationId = $applicationId;

        return $this;
    }

    /**
     * Get method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getApplicationId(), self::METHOD_ACTIVE_USERS);
    }
}