<?php namespace professionalweb\CarrotQuest\Services;

use professionalweb\CarrotQuest\Interfaces\Services\Users\UserService;
use professionalweb\CarrotQuest\Interfaces\Services\CarrotQuestService;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ApplicationService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\ConversationService;

/**
 * Main CarrotQuestService
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
        // TODO: Implement apps() method.
    }

    /**
     * Get conversation service
     *
     * @return ConversationService
     */
    public function conversations(): ConversationService
    {
        // TODO: Implement conversations() method.
    }

    /**
     * Get users service
     *
     * @return UserService
     */
    public function users(): UserService
    {
        // TODO: Implement users() method.
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