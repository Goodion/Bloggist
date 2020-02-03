<?php

use \src\Model\Book as Book;

$books = Book::all();
foreach ($books as $book) {
    echo $book->author . PHP_EOL;
    echo ' - ';
    echo $book->title . PHP_EOL;
    echo '<br />';
}