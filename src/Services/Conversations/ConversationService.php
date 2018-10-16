<?php namespace professionalweb\CarrotQuest\Services\Conversations;

use professionalweb\CarrotQuest\Interfaces\Services\Conversations\TagService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\ReplyService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\CloseService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\AssignService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\TypingService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\MessagesService;
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
     * Get service to work with messages in conversation
     *
     * @return MessagesService
     */
    public function messages(): MessagesService
    {
        // TODO: Implement messages() method.
    }

    /**
     * Get service to send messages to conversation
     *
     * @return ReplyService
     */
    public function reply(): ReplyService
    {
        // TODO: Implement reply() method.
    }

    /**
     * Mark conversation is read
     *
     * @return bool
     */
    public function markRead(): bool
    {
        // TODO: Implement markRead() method.
    }

    /**
     * Set someone typing
     *
     * @return TypingService
     */
    public function setTyping(): TypingService
    {
        // TODO: Implement setTyping() method.
    }

    /**
     * Get assign service
     *
     * @return AssignService
     */
    public function assign(): AssignService
    {
        // TODO: Implement assign() method.
    }

    /**
     * Get tag service
     *
     * @return TagService
     */
    public function tag(): TagService
    {
        // TODO: Implement tag() method.
    }

    /**
     * Get service to close conversation
     *
     * @return CloseService
     */
    public function close(): CloseService
    {
        // TODO: Implement close() method.
    }

    /**
     * @return array
     */
    public function get(): array
    {
        // TODO: Implement get() method.
    }
}