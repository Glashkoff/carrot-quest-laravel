<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Traits\HasLimits;
use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Users\ConversationsService as IConversationsService;

/**
 * Service to get users conversations
 * @package professionalweb\CarrotQuest\Services\Users
 */
class ConversationsService implements IConversationsService
{
    use UseTransport, HasLimits;

    /**
     * @var int
     */
    private $userId;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return IConversationsService
     */
    public function setUserId(int $userId): IConversationsService
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get user id
     *
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        // TODO: Implement get() method.
    }
}