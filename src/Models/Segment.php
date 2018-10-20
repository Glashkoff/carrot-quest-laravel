<?php namespace professionalweb\CarrotQuest\Models;

use professionalweb\CarrotQuest\Interfaces\Models\Segment as ISegment;

/**
 * Segment model
 * @package professionalweb\CarrotQuest\Models
 */
class Segment implements ISegment
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
     * @var array
     */
    private $filters;

    public function __construct(array $data = [])
    {
        $this->fill($data);
    }

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
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get filters
     *
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
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
     * @param array $filters
     *
     * @return $this
     */
    public function setFilters(array $filters): self
    {
        $this->filters = $filters;

        return $this;
    }

    /**
     * Fill model
     *
     * @param array $data
     *
     * @return Segment
     */
    public function fill(array $data): self
    {
        $filters = $data['filters'] ?? null;
        if (!empty($filters) && \is_string($filters)) {
            $filters = json_decode($filters, true) ?? '';
        }

        return $this
            ->setId($data['id'] ?? 0)
            ->setName($data['name'] ?? '')
            ->setFilters($filters);
    }
}