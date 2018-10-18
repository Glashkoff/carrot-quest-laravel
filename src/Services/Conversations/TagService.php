<?php namespace professionalweb\CarrotQuest\Services\Conversations;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\TagService as ITagService;

/**
 * Service to work with tags
 * @package professionalweb\CarrotQuest\Services\Conversations
 */
class TagService implements ITagService
{
    use UseTransport;

    public const METHOD_TAG = '/conversations/{id}/tag';

    /**
     * @var int
     */
    private $conversationId;

    /**
     * @var int
     */
    private $adminId;

    /**
     * @var string
     */
    private $tag;

    /**
     * @var string
     */
    private $botName;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * @return mixed
     */
    public function send()
    {
        $params = $this->getParams();
        $params['action'] = 'add';

        return $this->getTransport()->post($this->getMethod(), $params)['data'] ?? [];
    }

    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return ITagService
     */
    public function setConversationId(int $id): ITagService
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
     * Set tag
     *
     * @param string $tag
     *
     * @return ITagService
     */
    public function tag(string $tag): ITagService
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return null|string
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * Delete tag
     *
     * @return bool
     */
    public function delete(): bool
    {
        $params = $this->getParams();
        $params['action'] = 'delete';
        $result = $this->getTransport()->post($this->getMethod(), $params);

        return isset($result['meta']) && $result['meta']['status'] < 300;
    }

    /**
     * Prepare params
     *
     * @return array
     */
    protected function getParams(): array
    {
        $result = ['tag' => $this->getTag()];

        if (($fromAdmin = $this->getAdminId()) !== null) {
            $result['from_admin'] = $fromAdmin;
        }
        if (($botName = $this->getBotName()) !== null) {
            $result['bot_name'] = $botName;
        }

        return $result;
    }

    /**
     * Set replier admin id
     *
     * @param int $adminId
     *
     * @return ITagService
     */
    public function setAdminId(int $adminId): ITagService
    {
        $this->adminId = $adminId;

        return $this;
    }

    /**
     * Get admin id
     *
     * @return int|null
     */
    public function getAdminId(): ?int
    {
        return $this->adminId;
    }

    /**
     * Set bot name
     *
     * @param string $botName
     *
     * @return ITagService
     */
    public function setBotName(string $botName): ITagService
    {
        $this->botName = $botName;

        return $this;
    }

    /**
     * Get bot name
     *
     * @return null|string
     */
    public function getBotName(): ?string
    {
        return $this->botName;
    }

    /**
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getConversationId(), self::METHOD_TAG);
    }
}