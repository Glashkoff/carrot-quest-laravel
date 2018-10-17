<?php namespace professionalweb\CarrotQuest\Services\Conversations;

use professionalweb\CarrotQuest\Traits\HasLimits;
use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\MessagesService as IMessagesService;

/**
 * Service to get messages in conversation
 * @package professionalweb\CarrotQuest\Services\Conversations
 */
class MessagesService implements IMessagesService
{
    use HasLimits, UseTransport;

    /**
     * @var int
     */
    private $conversationId;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * @return array
     */
    public function get(): array
    {
        // TODO: Implement get() method.
    }

    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return IMessagesService
     */
    public function setConversationId(int $id): IMessagesService
    {
        $this->conversationId = $id;

        return $this;
    }

    /**
     * Get conversation id
     *
     * @return int
     */
    public function getConversationId(): int
    {
        return $this->conversationId;
    }
}