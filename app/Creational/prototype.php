<?php


class Page
{
    private $title;

    private $body;

    private $author;

    private $comments = [];

    public function __construct(string $title, string $body, Author $author)
    {
        $this->title = $title;
        $this->body = $body;
        $this->author = $author;
        $this->author->addToPage($this);
        $this->date = new DateTime();
    }

    public function addComment(string $comment): void
    {
        $this->comments[] = $comment;
    }

    public function __clone()
    {
        $this->title = "Copy of " . $this->title;
        $this->author->addToPage($this);
        $this->comments = [];
        $this->date = new DateTime();
    }
}

class Author
{
    private $name;


    private $pages = [];


    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addToPage(Page $page): void
    {
        $this->pages[] = $page;
    }
}


function clientCode()
{
    $author = new Author("Hadi Heydarzade");
    $page = new Page("Tip of the day", "Keep calm and carry on.", $author);
    $page->addComment("Nice tip, Thanks!");

    $draft = clone $page;
    echo "Dump of the clone. Note that the author is now referencing two objects.\n\n";
    print_r($draft);
}

clientCode();