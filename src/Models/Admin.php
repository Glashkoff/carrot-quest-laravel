<?php namespace professionalweb\CarrotQuest\Models;

use professionalweb\CarrotQuest\Interfaces\Models\Admin as IAdmin;

/**
 * Admin model
 * @package professionalweb\CarrotQuest\Models
 */
class Admin implements IAdmin
{
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
     * @var string
     */
    private $type;

    /**
     * Get admin id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get admin name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get admin avatar
     *
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * Get admin type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param int $id
     *
     * @return Admin
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return Admin
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $avatar
     *
     * @return Admin
     */
    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return Admin
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}