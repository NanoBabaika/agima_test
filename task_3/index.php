<?php

class Book {
    // поля класса
    public $title;
    public $author; 
    public $year;
    public $price;

    // вызов конструктора
    public function __construct($title, $author, $year, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->price = $price;
    }

    // метод возращающий строку
    public function getInfo() {
        return "Название: {$this->title}, Автор: {$this->author}, Год выпуска: {$this->year}, Цена: {$this->price}";
    }
}   


// Создаем несколько объектов и выводим информацию о них на страничку
$howNameThisBook = new Book("Как называется эта книга?", "Рэймонд М. Смаллиан", 2021, 500);

echo $howNameThisBook->getInfo() . "<br>";

$grokaemAlgoritms = new Book("Грокаем алгоритмы", "Адитья Бхаргава", 2022, 550);

echo $grokaemAlgoritms->getInfo() . "<br>";

$toHaveOrToBe = new Book("Иметь или быть?", "Эрих Фромм", 2017, 650);

echo $toHaveOrToBe->getInfo() . "<br>";