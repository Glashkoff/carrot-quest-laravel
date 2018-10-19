<?php namespace professionalweb\CarrotQuest\Services\Conversations;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\ConversationData;

/**
 * Service to get conversation info
 * @package professionalweb\CarrotQuest\Services\Conversations
 */
class ConversationDataService implements ConversationData
{
    use UseTransport;

    public const METHOD_GET_INFO = '/conversations/{id}';

    /**
     * @var int
     */
    private $conversationId;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return ConversationData
     */
    public function setConversationId(int $id): ConversationData
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

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->getTransport()->get($this->getMethod())['data'] ?? [];
    }

    /**
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getConversationId(), self::METHOD_GET_INFO);
    }
}