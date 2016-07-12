<?php

namespace Repository;

use Model\BookQuery;
use Model\Entity\Book;

class BookRepository
{
    /** @var  \DataBase */
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /** @return Book[] */
    public function findByBookQuery(BookQuery $query)
    {
        $where = '';
        $join = '';
        $sql = '';

        if($query->title){
            $where .= "LOWER(name) = '".strtolower($this->db->realEscapeString($query->title))."'";
        }

        if($query->operator && $query->age){
            if(!empty($where)){
                $where .= ' AND ';
            }
            $where .= " age ".$query->operator."= '".(int)$query->age."'";
            $sql = 'select DISTINCT b.* from reviews r, books b  WHERE '.$where.' AND b.id=r.book_id';
        }
        else{
            $sql = 'select * from books'.(!empty($where) ? ' WHERE '.$where : '');
        }

        $result = $this->db->select($sql);
        if($result === false){
            throw new \Exception('Error in query: '.$sql);
        }
        $books = [];
        while ($row = $this->db->fetchRow($result)){
            $book = new Book($row['id'], $row['name'], $row['book_date']);
            array_push($books, $book);
        }
        return $books;
    }
}