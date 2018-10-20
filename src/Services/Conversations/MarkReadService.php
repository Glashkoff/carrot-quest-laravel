<?php namespace professionalweb\CarrotQuest\Services\Conversations;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\MarkReadService as IMarkReadService;

/**
 * Service to mark conversation read
 * @package professionalweb\CarrotQuest\Services\Conversations
 */
class MarkReadService implements IMarkReadService
{
    use UseTransport;

    public const METHOD_MARK_READ = '/conversations/{id}/markread';

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
    public function send(): array
    {
        return $this->getTransport()->post($this->getMethod())['data'] ?? [];
    }

    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return IMarkReadService
     */
    public function setConversationId(int $id): IMarkReadService
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
        return str_replace('{id}', $this->getConversationId(), self::METHOD_MARK_READ);
    }
}