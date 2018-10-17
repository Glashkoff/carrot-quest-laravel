<?php namespace professionalweb\CarrotQuest\Services\Applications;

use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Services\Applications\ChannelsService as IChannelsService;

/**
 * Service to get channels
 * @package professionalweb\CarrotQuest\Services\Applications
 */
class ChannelsService implements IChannelsService
{
    use UseTransport;

    public const METHOD_CHANNELS = '/apps/{id}/channels';

    /**
     * @var int
     */
    private $applicationId;

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->getTransport()->get($this->getMethod())['data'] ?? [];
    }

    /**
     * Set application ID
     *
     * @param int $id
     *
     * @return IChannelsService
     */
    public function setApplicationId(int $id): IChannelsService
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
        return str_replace('{id}', $this->getApplicationId(), self::METHOD_CHANNELS);
    }
}