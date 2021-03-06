<?php

namespace App\Entity;

use Exception;
use function PHPUnit\Framework\isEmpty;

class Article
{
    private $author;
    private $content;
    private $title;
    private $note;
    private $category;
    private $img;

    /**
     * @param String $author
     * @param String $title
     * @param String $content
     * @param String $category
     * @param int $note
     * @param String $img
     * @throws Exception In case of GUESS WHAT ! EXCEPTION MY DUDE
     */

    public function __construct(
        String $author,
        String $title,
        String $content,
        String $category,
        int $note,
        String $img = "empty"
    )
    {
        $this->verifyIsNotEmpty($author);
        $this->author = $author;

        $this->verifyIsNotEmpty($content);
        $this->content = $content;

        $this->verifyNote($note);
        $this->note = $note;

        $this->verifyIsNotEmpty($title);
        $this->title = $title;

        $this->verifyIsNotEmpty($category);
        $this->category = $category;

        $this->img = $img;
    }


    /**
     * @return String
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return String
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return String
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getNote(): int
    {
        return $this->note;
    }

    /**
     * @return String
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }


    /**
     * @param String $author
     * @param String $title
     * @param String $content
     * @param String $category
     * @param int $note
     * @param string $img
     * @return static
     * @throws Exception
     */

    public static function fromString(
        String $author,
        String $title,
        String $content,
        String $category,
        int $note,
        String $img = "empty"
    ):self {
        return new self($author, $title, $content, $category, $note, $img);
    }

    /**
     * @param int $note
     * @throws Exception In case of invalid note
     */

    public function verifyNote(int $note)
    {
        if ($note < 0 || $note > 10) {
            throw new Exception('The note is invalid');
        }
    }

    /**
     * @param String $param
     * @throws Exception In case of an empty string
     */

    public function verifyIsNotEmpty(String $param)
    {
        if (strlen($param) == 0) {
            throw new Exception('Cannot be empty');
        }
    }
}
