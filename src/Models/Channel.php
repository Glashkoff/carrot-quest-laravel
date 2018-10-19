<?php namespace professionalweb\CarrotQuest\Models;

use professionalweb\CarrotQuest\Interfaces\Models\Admin;
use professionalweb\CarrotQuest\Models\Admin as AdminModel;
use professionalweb\CarrotQuest\Interfaces\Models\Channel as IChannel;

/**
 * Channel model
 * @package professionalweb\CarrotQuest\Models
 */
class Channel implements IChannel
{

    //<editor-fold desc="Fields">
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $avatar;

    /**
     * @var bool
     */
    private $isDropable;

    /**
     * @var array
     */
    private $operators;

    /**
     * @var int
     */
    private $notAssignedCount;

    /**
     * @var int
     */
    private $notReadCount;

    /**
     * @var bool
     */
    private $hasReadPermission;

    /**
     * @var string
     */
    private $type;

    //</editor-fold>

    public function __construct(array $data = [])
    {
        $this->fill($data);
    }

    /**
     * Get channel id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get channel name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get channel avatar
     *
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * Check channel is droppable
     *
     * @return bool
     */
    public function isDroppable(): bool
    {
        return $this->isDropable;
    }

    /**
     * Get channel type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get admins
     *
     * @return array|Admin[]
     */
    public function getOperators(): array
    {
        return $this->operators;
    }

    /**
     * Count not assigned dialogs
     *
     * @return int
     */
    public function getNotAssignedCount(): int
    {
        return $this->notAssignedCount;
    }

    /**
     * Count not read dialogs
     *
     * @return int
     */
    public function getNotReadCount(): int
    {
        return $this->notReadCount;
    }

    /**
     * Check read permission exists
     *
     * @return bool
     */
    public function hasReadPermission(): bool
    {
        return $this->hasReadPermission;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $avatar
     *
     * @return $this
     */
    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @param bool $isDropable
     *
     * @return $this
     */
    public function setIsDropable(bool $isDropable): self
    {
        $this->isDropable = $isDropable;

        return $this;
    }

    /**
     * @param array $operators
     *
     * @return $this
     */
    public function setOperators(array $operators): self
    {
        $this->operators = $operators;

        return $this;
    }

    /**
     * @param int $notAssignedCount
     *
     * @return $this
     */
    public function setNotAssignedCount(int $notAssignedCount): self
    {
        $this->notAssignedCount = $notAssignedCount;

        return $this;
    }

    /**
     * @param int $notReadCount
     *
     * @return $this
     */
    public function setNotReadCount(int $notReadCount): self
    {
        $this->notReadCount = $notReadCount;

        return $this;
    }

    /**
     * @param bool $hasReadPermission
     *
     * @return $this
     */
    public function setHasReadPermission(bool $hasReadPermission): self
    {
        $this->hasReadPermission = $hasReadPermission;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Fill
     *
     * @param array $data
     *
     * @return Channel
     */
    public function fill(array $data): self
    {
        $this
            ->setId($data['id'] ?? 0)
            ->setName($data['name'] ?? '')
            ->setAvatar($data['avatar'] ?? '')
            ->setIsDropable(isset($data['droppable']) && $data['droppable'])
            ->setType($data['type'] ?? '')
            ->setNotAssignedCount($data['not_assigned_count'] ?? 0)
            ->setNotReadCount($data['not_read_count'] ?? 0)
            ->setHasReadPermission(isset($data['read_permission']) && $data['read_permission']);
        if (isset($data['operators'])) {
            $operators = [];
            foreach ($data['operators'] as $operator) {
                $operators[] = new AdminModel($operator);
            }
            $this->setOperators($operators);
        }

        return $this;
    }
}