<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\Models\User;

/**
 * Interface for service to work with users
 * @package professionalweb\CarrotQuest\Interfaces\Services\Users
 */
interface UserService
{
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
     * @return SetStatusService
     */
    public function setStatus(): SetStatusService;

    /**
     * Send message
     *
     * @return SendMessageService
     */
    public function sendMessage(): SendMessageService;

    /**
     * Start conversation
     *
     * @return StartConversationService
     */
    public function startConversation(): StartConversationService;

    /**
     * Unsubscribe user
     *
     * @return UnsubscribeService
     */
    public function unsubscribe(): UnsubscribeService;

    /**
     * Get user
     *
     * @return User
     */
    public function get(): User;
}