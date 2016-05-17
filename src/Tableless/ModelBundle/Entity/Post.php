<?php

namespace Tableless\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Post
 * 
 * @ORM\Table(name="post")
 * @ORM\Entity (repositoryClass="Tableless\ModelBundle\Repository\PostRepository")
 *
 */
class Post extends Timestampable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=150)
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank
     */
    private $content;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /** 
     * @var Author 
     * 
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="posts") 
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable=false) 
     * @Assert\NotBlank 
     */ 
    private $author;

    /**
     * Set author
     *
     * @param \Tableless\ModelBundle\Entity\Author $author
     *
     * @return Post
     */
    public function setAuthor(\Tableless\ModelBundle\Entity\Author $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Tableless\ModelBundle\Entity\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
