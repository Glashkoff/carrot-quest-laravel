<?php namespace professionalweb\CarrotQuest\Services\Applications;

use professionalweb\CarrotQuest\Models\User;
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

    public const METHOD_USERS = '/apps/{id}/users';

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
        $result = $this->getTransport()->get($this->getMethod())['data'] ?? [];

        return isset($result['users']) ? array_map(function (array $data) {
            return new User($data);
        }, $result['users']) : [];
    }

    protected function getParams(): array
    {
        $params = [];

        if (($sortProp = $this->getOrderBy()) !== null) {
            $params['sort_prop'] = $sortProp;
        }
        if (($sorting = $this->getSorting()) !== null) {
            $params['sort_order'] = $sorting;
        }
        if (($limit = $this->getLimit()) !== null) {
            $result['limit'] = $limit;
        }
        if (($offset = $this->getOffset()) !== null) {
            $result['offset'] = $offset;
        }

        return $params;
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

    /**
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getApplicationId(), self::METHOD_USERS);
    }
}