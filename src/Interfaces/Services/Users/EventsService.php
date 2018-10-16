<?php namespace professionalweb\CarrotQuest\Interfaces\Services\Users;

use professionalweb\CarrotQuest\Interfaces\ListService;

interface EventsService extends ListService
{
    /**
     * Filter by event name
     *
     * @param string $eventName
     *
     * @return EventsService
     */
    public function whereEventName(string $eventName): self;
}