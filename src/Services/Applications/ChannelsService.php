<?php namespace professionalweb\CarrotQuest\Services\Applications;

use professionalweb\CarrotQuest\Interfaces\Services\Applications\ChannelsService as IChannelsService;

/**
 * Service to get channels
 * @package professionalweb\CarrotQuest\Services\Applications
 */
class ChannelsService implements IChannelsService
{
    /**
     * @var int
     */
    private $applicationId;

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
     * @return IChannelsService
     */
    public function setApplicationId(int $id): IChannelsService
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