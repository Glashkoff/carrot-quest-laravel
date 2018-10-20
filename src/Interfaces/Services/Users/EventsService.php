<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\ListService;

interface EventsService extends ListService
{
    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return EventsService
     */
    public function setUserId(int $userId): self;

    /**
     * Filter by event name
     *
     * @param string $eventName
     *
     * @return EventsService
     */
    public function whereEventName(string $eventName): self;
}