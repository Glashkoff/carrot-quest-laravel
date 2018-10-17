<?php namespace professionalweb\CarrotQuest\Services;

use professionalweb\CarrotQuest\Interfaces\Services\Users\UserService;
use professionalweb\CarrotQuest\Interfaces\Services\CarrotQuestService;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ApplicationService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\ConversationService;

/**
 * Main CarrotQuest service
 * @package professionalweb\CarrotQuest\Services
 */
class CarrotQuest implements CarrotQuestService
{

    /**
     * Get application service
     *
     * @return ApplicationService
     */
    public function apps(): ApplicationService
    {
        return app(ApplicationService::class);
    }

    /**
     * Get conversation service
     *
     * @return ConversationService
     */
    public function conversations(): ConversationService
    {
        return app(ConversationService::class);
    }

    /**
     * Get users service
     *
     * @return UserService
     */
    public function users(): UserService
    {
        return app(UserService::class);
    }

    /**
     * Send event
     *
     * @param string $eventname
     * @param array  $eventParams
     *
     * @return mixed
     */
    public function event(string $eventname, array $eventParams = [])
    {
        // TODO: Implement event() method.
    }
}