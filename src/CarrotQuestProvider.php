<?php namespace professionalweb\CarrotQuest;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use professionalweb\CarrotQuest\Services\Creator;
use professionalweb\CarrotQuest\Services\Transport;
use professionalweb\CarrotQuest\Services\CarrotQuest;
use professionalweb\CarrotQuest\Interfaces\ObjectCreator;
use professionalweb\CarrotQuest\Services\Users\UserService;
use professionalweb\CarrotQuest\Services\Users\EventsService;
use professionalweb\CarrotQuest\Services\Users\GetUserService;
use professionalweb\CarrotQuest\Services\Users\AddEventService;
use professionalweb\CarrotQuest\Services\Users\SetStatusService;
use professionalweb\CarrotQuest\Services\Users\SendMessageService;
use professionalweb\CarrotQuest\Services\Users\UnsubscribeService;
use professionalweb\CarrotQuest\Services\Conversations\TagService;
use professionalweb\CarrotQuest\Interfaces\Transport as ITransport;
use professionalweb\CarrotQuest\Services\Applications\UsersService;
use professionalweb\CarrotQuest\Services\Conversations\ReplyService;
use professionalweb\CarrotQuest\Services\Conversations\CloseService;
use professionalweb\CarrotQuest\Services\Users\SetPropertiesService;
use professionalweb\CarrotQuest\Services\Conversations\AssignService;
use professionalweb\CarrotQuest\Services\Conversations\TypingService;
use professionalweb\CarrotQuest\Services\Applications\ChannelsService;
use professionalweb\CarrotQuest\Interfaces\Services\CarrotQuestService;
use professionalweb\CarrotQuest\Services\Conversations\MessagesService;
use professionalweb\CarrotQuest\Services\Users\StartConversationService;
use professionalweb\CarrotQuest\Services\Applications\ActiveUsersService;
use professionalweb\CarrotQuest\Services\Applications\ApplicationService;
use professionalweb\CarrotQuest\Facades\CarrotQuest as CarrotQuestFacade;
use professionalweb\CarrotQuest\Services\Applications\ConversationsService;
use professionalweb\CarrotQuest\Services\Conversations\ConversationService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\UserService as IUserService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\EventsService as IEventsService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\TagService as ITagService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\AddEventService as IAddEventService;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\UsersService as IUsersService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\SetStatusService as ISetStatusService;
use professionalweb\CarrotQuest\Services\Users\ConversationsService as UserConversationsService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\ReplyService as IReplyService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\CloseService as ICloseService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\TypingService as ITypingService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\AssignService as IAssignService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\SendMessageService as ISendMessageService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\UnsubscribeService as IUnsubscribeService;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ChannelsService as IChannelsService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\MessagesService as IMessagesService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\SetPropertiesService as ISetPropertiesService;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ActiveUsersService as IActiveUsersService;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ApplicationService as IApplicationService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\ConversationsService as IUserConversationsService;
use professionalweb\CarrotQuest\Interfaces\Services\Conversations\ConversationService as IConversationService;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ConversationsService as IConversationsService;
use professionalweb\CarrotQuest\Interfaces\Services\Users\StartConversationService as IStartConversationService;

class CarrotQuestProvider extends ServiceProvider
{
    public function boot(): void
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('CarrotQuest', CarrotQuestFacade::class);
    }

    public function register(): void
    {
        $this->app->bind(ITransport::class, function () {
            return new Transport(
                config('carrot-quest.url', 'https://api.carrotquest.io/v1'),
                config('carrot-quest.auth-token', '')
            );
        });

        $this->app->bind(ObjectCreator::class, Creator::class);

        // Application services
        $this->app->bind(IUsersService::class, UsersService::class);
        $this->app->bind(CarrotQuestService::class, CarrotQuest::class);
        $this->app->bind(IChannelsService::class, ChannelsService::class);
        $this->app->bind(IActiveUsersService::class, ActiveUsersService::class);
        $this->app->bind(IApplicationService::class, ApplicationService::class);
        $this->app->bind(IConversationsService::class, ConversationsService::class);

        // Conversation services
        $this->app->bind(ITagService::class, TagService::class);
        $this->app->bind(IReplyService::class, ReplyService::class);
        $this->app->bind(ICloseService::class, CloseService::class);
        $this->app->bind(ITypingService::class, TypingService::class);
        $this->app->bind(IAssignService::class, AssignService::class);
        $this->app->bind(IMessagesService::class, MessagesService::class);
        $this->app->bind(IConversationService::class, ConversationService::class);

        // Users services
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IEventsService::class, EventsService::class);
        $this->app->bind(GetUserService::class, GetUserService::class);
        $this->app->bind(IAddEventService::class, AddEventService::class);
        $this->app->bind(ISetStatusService::class, SetStatusService::class);
        $this->app->bind(ISendMessageService::class, SendMessageService::class);
        $this->app->bind(IUnsubscribeService::class, UnsubscribeService::class);
        $this->app->bind(ISetPropertiesService::class, SetPropertiesService::class);
        $this->app->bind(IUserConversationsService::class, UserConversationsService::class);
        $this->app->bind(IStartConversationService::class, StartConversationService::class);
    }
}