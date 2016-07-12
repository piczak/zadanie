<?php

require 'autoload.php';

$db = new DataBase('localhost', 'root', 'root', 'zad');

$bookRepository = new \Repository\BookRepository($db);

$statsListing = new MyStatsListing($bookRepository);

$bookQueryStr = 'ZieLoNa MiLa|age>30';

$statsListing->showStatistics($bookQueryStr);
