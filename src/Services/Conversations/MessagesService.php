<?php namespace professionalweb\CarrotQuest\Services\Conversations;

use professionalweb\CarrotQuest\Models\Message;
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

    public const METHOD_ASSIGN = '/conversations/{id}/parts';

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
        return array_map(function (array $data) {
            return new Message($data);
        }, $this->getTransport()->post($this->getMethod(), $this->getParams())['data'] ?? []);
    }

    /**
     * Get params
     *
     * @return array
     */
    protected function getParams(): array
    {
        $result = [];

        if (($limit = $this->getLimit()) !== null) {
            $result['count'] = $limit;
        }
        if (($offset = $this->getOffset()) !== null) {
            $result['after'] = $offset;
        }

        return $result;
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

    /**
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getConversationId(), self::METHOD_ASSIGN);
    }
}