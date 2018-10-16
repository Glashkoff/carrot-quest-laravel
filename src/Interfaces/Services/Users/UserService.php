<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\GetData;
use professionalweb\CarrotQuest\Interfaces\Models\Message;
use professionalweb\CarrotQuest\Interfaces\Models\Conversation;

/**
 * Interface for service to work with users
 * @package professionalweb\CarrotQuest\Interfaces\Services\Users
 */
interface UserService extends GetData
{
    public const STATUS_ONLINE = 'online';

    public const STATUS_IDLE = 'idle';

    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return UserService
     */
    public function setUserId(int $userId): self;

    /**
     * Get event service
     *
     * @return EventsService
     */
    public function events(): EventsService;

    /**
     * Get service to get user's conversations
     *
     * @return ConversationsService
     */
    public function conversations(): ConversationsService;

    /**
     * Get service to add events for user
     *
     * @return AddEventService
     */
    public function addEvent(): AddEventService;

    /**
     * Get service to set user's properties
     *
     * @return SetPropertiesService
     */
    public function setProperties(): SetPropertiesService;

    /**
     * Set user's status
     *
     * @param string $status
     * @param string $sessionId
     *
     * @return bool
     */
    public function setStatus(string $status, string $sessionId): bool;

    /**
     * Send message
     *
     * @param string $body
     * @param string $type
     *
     * @return Message
     */
    public function sendMessage(string $body, string $type = Conversation::TYPE_POPUP_CHAT): Message;

    /**
     * Start conversation
     *
     * @param string $body
     *
     * @return Conversation
     */
    public function startConversation(string $body): Conversation;

    /**
     * Unsubscribe user
     *
     * @param bool $byUserId
     *
     * @return bool
     */
    public function unsubscribe(bool $byUserId = false): bool;
}