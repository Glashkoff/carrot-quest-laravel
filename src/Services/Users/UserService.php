<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Interfaces\Services\Users\EventsService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\GetUserService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\AddEventService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\SetStatusService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\UnsubscribeService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\SendMessageService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\ConversationsService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\SetPropertiesService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\StartConversationService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\UserService as IUserService;

/**
 * Service to work with users
 * @package professionalweb\CarrotQuest\Services\Users
 */
class UserService implements IUserService
{

    /**
     * @var int
     */
    private $userId;

    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return IUserService
     */
    public function setUserId(int $userId): IUserService
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get user id
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Get event service
     *
     * @return EventsService
     */
    public function events(): EventsService
    {
        /** @var EventsService $service */
        $service = app(EventsService::class);

        return $service->setUserId($this->getUserId());
    }

    /**
     * Get service to get user's conversations
     *
     * @return ConversationsService
     */
    public function conversations(): ConversationsService
    {
        /** @var ConversationsService $service */
        $service = app(ConversationsService::class);

        return $service->setUserId($this->getUserId());
    }

    /**
     * Get service to add events for user
     *
     * @return AddEventService
     */
    public function addEvent(): AddEventService
    {
        /** @var AddEventService $service */
        $service = app(AddEventService::class);

        return $service->setUserId($this->getUserId());
    }

    /**
     * Get service to set user's properties
     *
     * @return SetPropertiesService
     */
    public function setProperties(): SetPropertiesService
    {
        /** @var SetPropertiesService $service */
        $service = app(SetPropertiesService::class);

        return $service->setUserId($this->getUserId());
    }

    /**
     * Set user's status
     *
     * @return SetStatusService
     */
    public function setStatus(): SetStatusService
    {
        /** @var SetStatusService $service */
        $service = app(SetStatusService::class);

        return $service->setUserId($this->getUserId());
    }

    /**
     * Send message
     *
     * @return SendMessageService
     */
    public function sendMessage(): SendMessageService
    {
        /** @var SendMessageService $service */
        $service = app(SendMessageService::class);

        return $service->setUserId($this->getUserId());
    }

    /**
     * Start conversation
     *
     * @return StartConversationService
     */
    public function startConversation(): StartConversationService
    {
        /** @var StartConversationService $service */
        $service = app(StartConversationService::class);

        return $service->setUserId($this->getUserId());
    }

    /**
     * Unsubscribe user
     *
     * @return UnsubscribeService
     */
    public function unsubscribe(): UnsubscribeService
    {
        /** @var UnsubscribeService $service */
        $service = app(UnsubscribeService::class);

        return $service->setUserId($this->getUserId());
    }

    /**
     * @return array
     */
    public function get(): array
    {
        /** @var GetUserService $service */
        $service = app(GetUserService::class);

        return $service->setUserId($this->getUserId())->get();
    }
}