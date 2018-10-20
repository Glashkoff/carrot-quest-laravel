<?php namespace professionalweb\CarrotQuest\Services\Applications;

use professionalweb\CarrotQuest\Traits\HasLimits;
use professionalweb\CarrotQuest\Traits\IsSortable;
use professionalweb\CarrotQuest\Models\Conversation;
use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Traits\HasConditions;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ConversationsService as IConversationService;

/**
 * Service to get application conversations
 * @package professionalweb\CarrotQuest\Services\Applications
 */
class ConversationsService implements IConversationService
{
    use HasLimits, HasConditions, IsSortable, UseTransport;

    public const METHOD_CONVERSATIONS = '/apps/{id}/conversations';

    //<editor-fold desc="Fields">
    /**
     * @var int
     */
    private $applicationId;

    /**
     * @var bool
     */
    private $includeNotAssigned;

    /**
     * @var bool
     */
    private $includeClosed;

    /**
     * @var int
     */
    private $assignedTo;

    /**
     * @var array
     */
    private $tags;

    /**
     * @var int
     */
    private $channel;

    //</editor-fold>

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * Include not assigned conversations
     *
     * @param bool $flag
     *
     * @return IConversationService
     */
    public function includeNotAssigned(bool $flag = true): IConversationService
    {
        $this->includeNotAssigned = $flag;

        return $this;
    }

    /**
     * Check need include not assigned
     *
     * @return bool|null
     */
    public function doIncludeNotAssigned(): ?bool
    {
        return $this->includeNotAssigned;
    }

    /**
     * Include closed conversations
     *
     * @param bool $flag
     *
     * @return IConversationService
     */
    public function includeClosed(bool $flag = true): IConversationService
    {
        $this->includeClosed = $flag;

        return $this;
    }

    /**
     * Check need include closed
     *
     * @return bool|null
     */
    public function doIncludeClosed(): ?bool
    {
        return $this->includeClosed;
    }

    /**
     * Filter by assigner
     *
     * @param int $id
     *
     * @return IConversationService
     */
    public function assignedTo(int $id): IConversationService
    {
        $this->assignedTo = $id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAssignedTo(): ?int
    {
        return $this->assignedTo;
    }

    /**
     * Filter by tags
     *
     * @param array $tags
     *
     * @return IConversationService
     */
    public function whereTags(array $tags): IConversationService
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * Filter by channel
     *
     * @param int $channelId
     *
     * @return IConversationService
     */
    public function whereChannel(int $channelId): IConversationService
    {
        $this->channel = $channelId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getChannel(): ?int
    {
        return $this->channel;
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

        if (($includeNotAssigned = $this->doIncludeNotAssigned()) !== null) {
            $result['include_not_assigned'] = $includeNotAssigned;
        }
        if (($closed = $this->doIncludeClosed()) !== null) {
            $result['closed'] = $closed;
        }
        if (!empty($tags = $this->getTags())) {
            $result['tags'] = implode(',', $tags);
        }
        if (($assigned = $this->getAssignedTo()) !== null) {
            $result['assigned'] = $assigned;
        }
        if (($channel = $this->getChannel()) !== null) {
            $result['channel'] = $channel;
        }
        if (($limit = $this->getLimit()) !== null) {
            $result['count'] = $limit;
        }
        if (($offset = $this->getOffset()) !== null) {
            $result['after'] = $offset;
        }

        return $result;
    }

    /**
     * Set application ID
     *
     * @param int $id
     *
     * @return IConversationService
     */
    public function setApplicationId(int $id): IConversationService
    {
        $this->applicationId = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getApplicationId(): int
    {
        return $this->applicationId;
    }

    /**
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getApplicationId(), self::METHOD_CONVERSATIONS);
    }
}