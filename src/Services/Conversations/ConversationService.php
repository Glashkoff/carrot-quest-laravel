<?php namespace professionalweb\CarrotQuest\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\Models\Conversation;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\TagService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\ReplyService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\CloseService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\AssignService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\TypingService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\MessagesService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\MarkReadService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\ConversationService as IConversationService;

/**
 * Service to work with conversations
 * @package professionalweb\CarrotQuest\Services\Conversations
 */
class ConversationService implements IConversationService
{
    /**
     * @var int
     */
    private $conversationId;

    /**
     * Set conversation id
     *
     * @param int $id
     *
     * @return IConversationService
     */
    public function setConversationId(int $id): IConversationService
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
     * Get service to work with messages in conversation
     *
     * @return MessagesService
     */
    public function messages(): MessagesService
    {
        /** @var MessagesService $service */
        $service = app(MessagesService::class);

        return $service->setConversationId($this->getConversationId());
    }

    /**
     * Get service to send messages to conversation
     *
     * @return ReplyService
     */
    public function reply(): ReplyService
    {
        /** @var ReplyService $service */
        $service = app(ReplyService::class);

        return $service->setConversationId($this->getConversationId());
    }

    /**
     * Mark conversation is read
     *
     * @return MarkReadService
     */
    public function markRead(): MarkReadService
    {
        /** @var MarkReadService $service */
        $service = app(MarkReadService::class);

        return $service->setConversationId($this->getConversationId());
    }

    /**
     * Set someone typing
     *
     * @return TypingService
     */
    public function setTyping(): TypingService
    {
        /** @var TypingService $service */
        $service = app(TypingService::class);

        return $service->setConversationId($this->getConversationId());
    }

    /**
     * Get assign service
     *
     * @return AssignService
     */
    public function assign(): AssignService
    {
        /** @var AssignService $service */
        $service = app(AssignService::class);

        return $service->setConversationId($this->getConversationId());
    }

    /**
     * Get tag service
     *
     * @return TagService
     */
    public function tag(): TagService
    {
        /** @var TagService $service */
        $service = app(TagService::class);

        return $service->setConversationId($this->getConversationId());
    }

    /**
     * Get service to close conversation
     *
     * @return CloseService
     */
    public function close(): CloseService
    {
        /** @var CloseService $service */
        $service = app(CloseService::class);

        return $service->setConversationId($this->getConversationId());
    }

    /**
     * Get conversation
     *
     * @return Conversation
     */
    public function get(): Conversation
    {
        /** @var ConversationDataService $service */
        $service = app(ConversationDataService::class);

        return $service->setConversationId($this->getConversationId())->get();
    }
}