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
        /** @var ActiveUsersService $service */
        $service = app(ActiveUsersService::class);

        return $service->setApplicationId($this->getApplicationId());
    }

    /**
     * Get service to work with users
     *
     * @return UsersService
     */
    public function users(): UsersService
    {
        /** @var UsersService $service */
        $service = app(UsersService::class);

        return $service->setApplicationId($this->getApplicationId());
    }

    /**
     * Get service to work with conversations
     *
     * @return ConversationsService
     */
    public function getConversations(): ConversationsService
    {
        /** @var ConversationsService $service */
        $service = app(ConversationsService::class);

        return $service->setApplicationId($this->getApplicationId());
    }

    /**
     * Get service to work with channels
     *
     * @return ChannelsService
     */
    public function getChannels(): ChannelsService
    {
        /** @var ChannelsService $service */
        $service = app(ChannelsService::class);

        return $service->setApplicationId($this->getApplicationId());
    }

    /**
     * @return int
     */
    public function getApplicationId(): int
    {
        return $this->applicationId;
    }
}