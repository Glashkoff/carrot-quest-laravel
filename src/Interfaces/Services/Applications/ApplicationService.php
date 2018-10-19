<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Applications;

/**
 * Interface for meta service to work with application data
 * @package professionalweb\CarrotQuest\Interfaces\Services\Applications
 */
interface ApplicationService
{
    /**
     * Set application ID
     *
     * @param int $id
     *
     * @return ApplicationService
     */
    public function setApplicationId(int $id): self;

    /**
     * Get service to work with active users
     *
     * @return ActiveUsersService
     */
    public function activeUsers(): ActiveUsersService;

    /**
     * Get service to work with users
     *
     * @return UsersService
     */
    public function users(): UsersService;

    /**
     * Get service to work with conversations
     *
     * @return ConversationsService
     */
    public function conversations(): ConversationsService;

    /**
     * Get service to work with channels
     *
     * @return ChannelsService
     */
    public function channels(): ChannelsService;
}