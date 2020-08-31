<?php

namespace App\Entity;

use Exception;
use function PHPUnit\Framework\isEmpty;

class Article
{
    private $author;
    private $content;
    private $note;
    private $img;

    /**
     * @param String $author
     * @param String $content
     * @param int $note
     * @param String $img
     * @throws Exception In case of GUESS WHAT ! EXCEPTION MY DUDE
     */

    public function __construct(String $author, String $content, int $note, String $img = "empty")
    {
        $this->verifyIsNotEmpty($author);
        $this->author = $author;

        $this->verifyIsNotEmpty($content);
        $this->content = $content;

        $this->verifyNote($note);
        $this->note = $note;

        $this->img = $img;
    }

    /**
     * @param String $author
     * @param String $content
     * @param int $note
     * @param string $img
     * @return static
     * @throws Exception
     */

    public static function fromString(String $author, String $content, int $note, String $img = "empty"):self
    {
        return new self($author, $content, $note, $img);
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
