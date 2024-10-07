<?php
abstract class Book {
    protected $title;
    protected $author;
    protected $publicationYear;
    protected $readCount;

    public function __construct($title, $author, $publicationYear) {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
        $this->readCount = 0;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPublicationYear() {
        return $this->publicationYear;
    }

    public function getReadCount() {
        return $this->readCount;
    }

    public function incrementReadCount() {
        $this->readCount++;
    }

    abstract public function getAccessMethod();
}

class DigitalBook extends Book {
    protected $downloadLink;

    public function __construct($title, $author, $publicationYear, $downloadLink) {
        parent::__construct($title, $author, $publicationYear);
        $this->downloadLink = $downloadLink;
    }

    public function getAccessMethod() {
        return "Ссылка для скачивания: {$this->downloadLink}";
    }
}

class PhysicalBook extends Book {
    protected $libraryLocation;

    public function __construct($title, $author, $publicationYear, $libraryLocation) {
        parent::__construct($title, $author, $publicationYear);
        $this->libraryLocation = $libraryLocation;
    }

    public function getAccessMethod() {
        return "Адрес библиотеки: {$this->libraryLocation}";
    }
}