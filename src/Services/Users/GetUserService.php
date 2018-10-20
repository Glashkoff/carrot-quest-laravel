<?php namespace professionalweb\CarrotQuest\Services\Users;

use professionalweb\CarrotQuest\Models\User;
use professionalweb\CarrotQuest\Traits\UseTransport;
use professionalweb\CarrotQuest\Interfaces\Transport;
use professionalweb\CarrotQuest\Interfaces\Models\User as IUser;
use professionalweb\CarrotQuest\Interfaces\Services\Users\GetUserService as IGetUserService;

/**
 * Service to set user's properties
 * @package professionalweb\CarrotQuest\Services\Users
 */
class GetUserService implements IGetUserService
{
    use UseTransport;

    public const METHOD_SET_USER = '/users/{id}';

    //<editor-fold desc="Fields">

    /**
     * @var int
     */
    private $userId;

    /**
     * @var bool
     */
    private $byUserId;

    /**
     * @var bool
     */
    private $showProperties;

    /**
     * @var bool
     */
    private $showEventProperties;

    /**
     * @var bool
     */
    private $showCustomProperties;

    /**
     * @var bool
     */
    private $showStatusDetails;

    /**
     * @var bool
     */
    private $showSegments;

    /**
     * @var bool
     */
    private $showNotes;

    //</editor-fold>

    public function __construct(Transport $transport)
    {
        $this->setTransport($transport);
    }

    /**
     * @return array
     */
    public function get(): IUser
    {
        return new User($this->getTransport()->get($this->getMethod(), $this->getParams())['data'] ?? []);
    }

    /**
     * Prepare params for request
     *
     * @return array
     */
    protected function getParams(): array
    {
        $result = [];

        if ($this->isByUserId()) {
            $result['by_user_id'] = true;
        }
        if ($this->needShowProperties()) {
            $result['props'] = true;
        }
        if ($this->needShowEventProperties()) {
            $result['props_events'] = true;
        }
        if ($this->needShowCustomProperties()) {
            $result['props_custom'] = true;
        }
        if ($this->needShowStatusDetails()) {
            $result['presence_details'] = true;
        }
        if ($this->needShowEventProperties()) {
            $result['events'] = true;
        }
        if ($this->needShowSegments()) {
            $result['segments'] = true;
        }
        if ($this->needShowNotes()) {
            $result['notes'] = true;
        }

        return $result;
    }

    /**
     * Do not use system id
     *
     * @param bool $flag
     *
     * @return IGetUserService
     */
    public function byUserId(bool $flag = true): IGetUserService
    {
        $this->byUserId = $flag;

        return $this;
    }

    /**
     * Check "by user" param
     *
     * @return bool|null
     */
    public function isByUserId(): ?bool
    {
        return $this->byUserId;
    }

    /**
     * Show properties
     *
     * @param bool $flag
     *
     * @return IGetUserService
     */
    public function showProperties(bool $flag = true): IGetUserService
    {
        $this->showProperties = $flag;

        return $this;
    }

    /**
     * Check need show properties
     *
     * @return bool|null
     */
    public function needShowProperties(): ?bool
    {
        return $this->showProperties;
    }

    /**
     * Show properties belong to events
     *
     * @param bool $flag
     *
     * @return IGetUserService
     */
    public function showEventProperties(bool $flag = true): IGetUserService
    {
        $this->showEventProperties = $flag;

        return $this;
    }

    /**
     * Check need show event properties
     *
     * @return bool|null
     */
    public function needShowEventProperties(): ?bool
    {
        return $this->showEventProperties;
    }

    /**
     * Show custom properties
     *
     * @param bool $flag
     *
     * @return IGetUserService
     */
    public function showCustomProperties(bool $flag = true): IGetUserService
    {
        $this->showCustomProperties = $flag;

        return $this;
    }

    /**
     * Check need to show custom properties
     *
     * @return bool|null
     */
    public function needShowCustomProperties(): ?bool
    {
        return $this->showCustomProperties;
    }

    /**
     * Show status details
     *
     * @param bool $flag
     *
     * @return IGetUserService
     */
    public function showStatusDetails(bool $flag = true): IGetUserService
    {
        $this->showStatusDetails = $flag;

        return $this;
    }

    /**
     * Check need show status details
     *
     * @return bool|null
     */
    public function needShowStatusDetails(): ?bool
    {
        return $this->showStatusDetails;
    }

    /**
     * Show segments
     *
     * @param bool $flag
     *
     * @return IGetUserService
     */
    public function showSegments(bool $flag = true): IGetUserService
    {
        $this->showSegments = $flag;

        return $this;
    }

    /**
     * Check need show segments
     *
     * @return bool|null
     */
    public function needShowSegments(): ?bool
    {
        return $this->showSegments;
    }

    /**
     * Show notes
     *
     * @param bool $flag
     *
     * @return IGetUserService
     */
    public function showNotes(bool $flag = true): IGetUserService
    {
        $this->showNotes = $flag;

        return $this;
    }

    /**
     * Check need to show notes
     *
     * @return bool|null
     */
    public function needShowNotes(): ?bool
    {
        return $this->showNotes;
    }

    /**
     * Get API method
     *
     * @return string
     */
    protected function getMethod(): string
    {
        return str_replace('{id}', $this->getUserId(), self::METHOD_SET_USER);
    }

    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return IGetUserService
     */
    public function setUserId(int $userId): IGetUserService
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get user id
     *
     * @return int
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }
}