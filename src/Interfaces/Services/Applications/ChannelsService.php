<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Applications;

use professionalweb\CarrotQuest\Interfaces\GetData;

/**
 * Interface for service to get application channel list
 * @package professionalweb\CarrotQuest\Interfaces\Services\Applications
 */
interface ChannelsService extends GetData
{
    /**
     * Set application ID
     *
     * @param int $id
     *
     * @return ChannelsService
     */
    public function setApplicationId(int $id): self;
}