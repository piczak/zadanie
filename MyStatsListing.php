<?php

use Interfaces\StatsListingInterface;
use Model\BookQuery;

class MyStatsListing implements StatsListingInterface
{
    /**
     * @var \Repository\BookRepository
     */
    private $bookRepository;

    public function __construct(\Repository\BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }
    
    function showStatistics($queryStr)
    {
        $query = new BookQuery($queryStr);

        $books = $this->bookRepository->findByBookQuery($query);

        if(count($books) == 0){
            $query->title = null;
            $books = $this->bookRepository->findByBookQuery($query);
        }

        $this->showTable($books);
    }

    /** @param $books Book[] */
    function showTable($books)
    {
        var_dump($books); //TMP
    }

}