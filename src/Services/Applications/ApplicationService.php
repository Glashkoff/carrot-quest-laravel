<?php namespace professionalweb\CarrotQuest\Services\Applications;

use professionalweb\CarrotQuest\Interfaces\Services\Applications\UsersService;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ChannelsService;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ActiveUsersService;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ConversationsService;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ApplicationService as IApplicationService;

/**
 * Service to work with applications
 * @package professionalweb\CarrotQuest\Services\Applications
 */
class ApplicationService implements IApplicationService
{
    /**
     * @var int
     */
    private $applicationId;

    /**
     * Set application ID
     *
     * @param int $id
     *
     * @return IApplicationService
     */
    public function setApplicationId(int $id): IApplicationService
    {
        $this->applicationId = $id;

        return $this;
    }

    /**
     * Get service to work with active users
     *
     * @return ActiveUsersService
     */
    public function activeUsers(): ActiveUsersService
    {
        // TODO: Implement activeUsers() method.
    }

    /**
     * Get service to work with users
     *
     * @return UsersService
     */
    public function users(): UsersService
    {
        // TODO: Implement users() method.
    }

    /**
     * Get service to work with conversations
     *
     * @return ConversationsService
     */
    public function getConversations(): ConversationsService
    {
        // TODO: Implement getConversations() method.
    }

    /**
     * Get service to work with channels
     *
     * @return ChannelsService
     */
    public function getChannels(): ChannelsService
    {
        // TODO: Implement getChannels() method.
    }
}