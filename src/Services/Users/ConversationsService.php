<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Traits\HasLimits;
use professionalweb\CarrotQuest\Models\Conversation;
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

    public const METHOD_CONVERSATIONS = '/users/{id}/conversations';

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
        return array_map(function (array $data) {
            return new Conversation($data);
        }, $this->getTransport()->get($this->getMethod(), $this->getParams())['data'] ?? []);
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
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getUserId(), self::METHOD_CONVERSATIONS);
    }
}