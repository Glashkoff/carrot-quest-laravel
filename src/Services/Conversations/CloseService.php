<?php namespace professionalweb\CarrotQuest\Services\Conversations;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\CloseService as ICloseService;

/**
 * Service to close conversation
 * @package professionalweb\CarrotQuest\Services\Conversations
 */
class CloseService implements ICloseService
{
    use UseTransport;

    public const METHOD_CLOSE = '/conversations/{id}/close';

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
    private $botName;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * Set replier admin id
     *
     * @param int $adminId
     *
     * @return ICloseService
     */
    public function setAdminId(int $adminId): ICloseService
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
     * @return ICloseService
     */
    public function setBotName(string $botName): ICloseService
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
            $result['from_admin'] = $adminId;
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
     * @return ICloseService
     */
    public function setConversationId(int $id): ICloseService
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
        return str_replace('{id}', $this->getConversationId(), self::METHOD_CLOSE);
    }
}