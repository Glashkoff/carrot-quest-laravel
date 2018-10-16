<?php namespace professionalweb\CarrotQuest\Interfaces\Services;

interface CarrotQuestService
{
    public function apps(): ApplicationService;

    public function conversations(): ConversationService;

    public function users(): UserService;

    public function event(string $eventname, array $eventParams = []);
}