<?php namespace professionalweb\CarrotQuest\Models;

use professionalweb\CarrotQuest\Interfaces\Models\EventType as IEventType;

/**
 * EventType model
 * @package professionalweb\CarrotQuest\Models
 */
class EventType implements IEventType
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
     * @var int
     */
    private $score;

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get type name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get score
     *
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
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
     * @param int $score
     *
     * @return $this
     */
    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Fill model
     *
     * @param array $data
     *
     * @return EventType
     */
    public function fill(array $data): self
    {
        return $this
            ->setId($data['id'] ?? 0)
            ->setName($data['name'])
            ->setScore($data['score'] ?? 0);
    }
}