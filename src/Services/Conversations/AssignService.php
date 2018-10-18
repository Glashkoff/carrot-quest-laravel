<?php namespace professionalweb\CarrotQuest\Services\Conversations;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\AssignService as IAssignService;

/**
 * Service to assign conversation
 * @package professionalweb\CarrotQuest\Services\Conversations
 */
class AssignService implements IAssignService
{
    use UseTransport;

    public const METHOD_ASSIGN = '/conversations/{id}/assign';

    /**
     * @var int
     */
    private $conversationId;

    /**
     * @var string
     */
    private $fromAdmin;

    /**
     * @var int
     */
    private $adminId;

    /**
     * @var string
     */
    private $botName;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * Set assigned by admin
     *
     * @param string $id
     *
     * @return IAssignService
     */
    public function fromAdmin(string $id): IAssignService
    {
        $this->fromAdmin = $id;

        return $this;
    }

    /**
     * Get from admin
     *
     * @return null|string
     */
    public function getFromAdmin(): ?string
    {
        return $this->fromAdmin;
    }

    /**
     * Set replier admin id
     *
     * @param int $adminId
     *
     * @return IAssignService
     */
    public function setAdminId(int $adminId): IAssignService
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
     * @return IAssignService
     */
    public function setBotName(string $botName): IAssignService
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
     * @return mixed
     */
    public function send()
    {
        return $this->getTransport()->post($this->getMethod(), $this->getParams())['data'] ?? [];
    }

    /**
     * Get params
     *
     * @return array
     */
    protected function getParams(): array
    {
        $result = [];

        if (($adminId = $this->getAdminId()) !== null) {
            $result['admin'] = $adminId;
        }
        if (($fromAdmin = $this->getFromAdmin()) !== null) {
            $result['from_admin'] = $fromAdmin;
        }
        if (($botName = $this->getBotName()) !== null) {
            $result['bot_name'] = $botName;
        }

        return $result;
    }

    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return IAssignService
     */
    public function setConversationId(int $id): IAssignService
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