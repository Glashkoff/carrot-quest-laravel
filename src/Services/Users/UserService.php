<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Interfaces\Models\Message;
use professionalweb\CarrotQuest\Interfaces\Models\Conversation;
use professionalweb\CarrotQuest\Interfaces\Services\Users\EventsService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\AddEventService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\ConversationsService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\SetPropertiesService;
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
     * @return array
     */
    public function get(): array
    {
        // TODO: Implement get() method.
    }

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
     * Get event service
     *
     * @return EventsService
     */
    public function events(): EventsService
    {
        // TODO: Implement events() method.
    }

    /**
     * Get service to get user's conversations
     *
     * @return ConversationsService
     */
    public function conversations(): ConversationsService
    {
        // TODO: Implement conversations() method.
    }

    /**
     * Get service to add events for user
     *
     * @return AddEventService
     */
    public function addEvent(): AddEventService
    {
        // TODO: Implement addEvent() method.
    }

    /**
     * Get service to set user's properties
     *
     * @return SetPropertiesService
     */
    public function setProperties(): SetPropertiesService
    {
        // TODO: Implement setProperties() method.
    }

    /**
     * Set user's status
     *
     * @param string $status
     * @param string $sessionId
     *
     * @return bool
     */
    public function setStatus(string $status, string $sessionId): bool
    {
        // TODO: Implement setStatus() method.
    }

    /**
     * Send message
     *
     * @param string $body
     * @param string $type
     *
     * @return Message
     */
    public function sendMessage(string $body, string $type = Conversation::TYPE_POPUP_CHAT): Message
    {
        // TODO: Implement sendMessage() method.
    }

    /**
     * Start conversation
     *
     * @param string $body
     *
     * @return Conversation
     */
    public function startConversation(string $body): Conversation
    {
        // TODO: Implement startConversation() method.
    }

    /**
     * Unsubscribe user
     *
     * @param bool $byUserId
     *
     * @return bool
     */
    public function unsubscribe(bool $byUserId = false): bool
    {
        // TODO: Implement unsubscribe() method.
    }
}