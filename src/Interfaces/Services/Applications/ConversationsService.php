<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Applications;

use professionalweb\CarrotQuest\Interfaces\Sortable;
use professionalweb\CarrotQuest\Interfaces\ListService;
use professionalweb\CarrotQuest\Interfaces\HasConditions;

/**
 * Interface for service to get application's conversations
 * @package professionalweb\CarrotQuest\Interfaces\Services\Applications
 */
interface ConversationsService extends ListService, Sortable, HasConditions
{
    /**
     * Set application ID
     *
     * @param int $id
     *
     * @return ConversationsService
     */
    public function setApplicationId(int $id): self;

    /**
     * Include not assigned conversations
     *
     * @param bool $flag
     *
     * @return ConversationsService
     */
    public function includeNotAssigned(bool $flag = true): self;

    /**
     * Include closed conversations
     *
     * @param bool $flag
     *
     * @return ConversationsService
     */
    public function includeClosed(bool $flag = true): self;

    /**
     * Filter by assigner
     *
     * @param int $id
     *
     * @return ConversationsService
     */
    public function assignedTo(int $id): self;

    /**
     * Filter by tags
     *
     * @param array $tags
     *
     * @return ConversationsService
     */
    public function whereTags(array $tags): self;

    /**
     * Filter by channel
     *
     * @param int $channelId
     *
     * @return ConversationsService
     */
    public function whereChannel(int $channelId): self;
}