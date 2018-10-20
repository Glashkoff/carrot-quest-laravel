<?php namespace professionalweb\CarrotQuest\Interfaces\Services;

use professionalweb\CarrotQuest\Interfaces\Services\Users\UserService;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ApplicationService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\ConversationService;

/**
 * Interface for main
 * @package professionalweb\CarrotQuest\Interfaces\Services
 */
interface CarrotQuestService
{
    /**
     * Get application service
     *
     * @return ApplicationService
     */
    public function apps(): ApplicationService;

    /**
     * Get conversation service
     *
     * @return ConversationService
     */
    public function conversations(): ConversationService;

    /**
     * Get users service
     *
     * @return UserService
     */
    public function users(): UserService;
}