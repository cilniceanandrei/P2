<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $post_title;

    /**
     * @ORM\Column(type="text")
     */
    private $post_content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $post_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $post_last_modified;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $post_author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostTitle(): ?string
    {
        return $this->post_title;
    }

    public function setPostTitle(string $post_title): self
    {
        $this->post_title = $post_title;

        return $this;
    }

    public function getPostContent(): ?string
    {
        return $this->post_content;
    }

    public function setPostContent(string $post_content): self
    {
        $this->post_content = $post_content;

        return $this;
    }

    public function getPostDate(): ?\DateTimeInterface
    {
        return $this->post_date;
    }

    public function setPostDate(\DateTimeInterface $post_date): self
    {
        $this->post_date = $post_date;

        return $this;
    }

    public function getPostLastModified(): ?\DateTimeInterface
    {
        return $this->post_last_modified;
    }

    public function setPostLastModified(\DateTimeInterface $post_last_modified): self
    {
        $this->post_last_modified = $post_last_modified;

        return $this;
    }

    public function getPostAuthor(): ?string
    {
        return $this->post_author;
    }

    public function setPostAuthor(string $post_author): self
    {
        $this->post_author = $post_author;

        return $this;
    }
}
