<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Users\SetPropertiesService as ISetPropertiesService;

/**
 * Service to set user's properties
 * @package professionalweb\CarrotQuest\Services\Users
 */
class SetPropertiesService implements ISetPropertiesService
{
    use UseTransport;

    public const METHOD_SET_PROPERTIES = '/users/{id}/props';

    /**
     * @var int
     */
    private $userId;

    /**
     * @var array
     */
    private $properties;

    /**
     * @var bool
     */
    private $isByUserId;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * @return mixed
     */
    public function send()
    {
        return $this->getTransport()->post($this->getMethod(), $this->getParams())['data'] ?? [];
    }

    /**
     * Get params
     *
     * @return array
     */
    protected function getParams(): array
    {
        $result = ['operations' => array_map(function () {

        }, $this->getProperties())];
        if (($userId = $this->getUserId()) !== null) {
            $result['by_user_id'] = $userId;
        }

        return $result;
    }

    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return ISetPropertiesService
     */
    public function setUserId(int $userId): ISetPropertiesService
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get user id
     *
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * Set properties
     *
     * @param array $properties
     *
     * @return ISetPropertiesService
     */
    public function setProperties(array $properties): ISetPropertiesService
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * Get properties
     *
     * @return array|null
     */
    public function getProperties(): ?array
    {
        return $this->properties;
    }

    /**
     * Set user id is not carrot's id
     *
     * @param bool $flag
     *
     * @return ISetPropertiesService
     */
    public function byUserId(bool $flag = true): ISetPropertiesService
    {
        $this->isByUserId = $flag;

        return $this;
    }

    /**
     * Check user is system
     *
     * @return bool|null
     */
    public function isByUserId(): ?bool
    {
        return $this->isByUserId;
    }

    /**
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getUserId(), self::METHOD_SET_PROPERTIES);
    }
}