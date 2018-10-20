<?php namespace professionalweb\CarrotQuest\Models;

use professionalweb\CarrotQuest\Interfaces\Models\Note as INote;

/**
 * Note model
 * @package professionalweb\CarrotQuest\Models
 */
class Note implements INote
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Admin
     */
    private $author;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $createdAt;

    public function __construct(array $data)
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
     * Get author
     *
     * @return Admin
     */
    public function getAuthor(): Admin
    {
        return $this->author;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Get date note created at
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
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
     * @param Admin $author
     *
     * @return $this
     */
    public function setAuthor(Admin $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @param string $body
     *
     * @return $this
     */
    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param string $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Fill model
     *
     * @param array $data
     *
     * @return Note
     */
    public function fill(array $data): self
    {
        return $this
            ->setId($data['id'] ?? 0)
            ->setCreatedAt(isset($data['created']) ? date('Y-m-d H:i:s', $data['created']) : '')
            ->setBody($data['body'] ?? '')
            ->setAuthor(new Admin($data['author'] ?? []));
    }
}