<?php namespace professionalweb\CarrotQuest\Services\Conversations;

use professionalweb\CarrotQuest\Traits\HasLimits;
use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\MarkReadService as IMarkReadService;

/**
 * Service to mark conversation read
 * @package professionalweb\CarrotQuest\Services\Conversations
 */
class MarkReadService implements IMarkReadService
{
    use UseTransport, HasLimits;

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
    public function get(): array
    {
        return $this->getTransport()->get($this->getMethod(), $this->getParams())['data'] ?? [];
    }

    /**
     * Prepare params for request
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