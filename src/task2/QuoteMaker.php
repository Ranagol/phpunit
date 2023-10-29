<?php

namespace src\task2;

use src\task2\QuoteStorage;

/**
 * This is the class that you should refactor so that the entire internal logic is fully covered by 
 * unit test. You must not change the class functionality. It must work 100% the same.
 */
class QuoteMaker {

    private $person;
    private $body = 'Today we have a quote from ';
    private $dataSource;

    public function __construct()
    {
        $this->dataSource = new QuoteStorage();//TODO HERE IS THE ERROR
        $random = mt_rand(0,2);

        if($random == 0) {
            $this->body .= 'one the famous physicist ';
            $this->person='Albert Einstein';
        } elseif ($random == 1) {
            $this->body .= 'head of the Catholic Church and sovereign of the Vatican City.';
            $this->person='Pope John Paul II';
        } elseif ($random == 2) {
            $this->body .= 'the co-founder of Microsoft Corporation ';
            $this->person='Bill Gates';
        }
    }

    /**
     * Get the value of person
     */ 
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Get the value of body
     */ 
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Get the value of dataSource
     */ 
    public function getDataSource()
    {
        return $this->dataSource;
    }

    public function getRandomQoute()
    {
        $quote = $this->getDataSource()->fetchQuote($this->getPerson());

        return $this->getBody() . ' ' . $this->getPerson() . ': ' . $quote;
    }
}

// example usage:
$quoteMaker = new QuoteMaker();
echo $quoteMaker->getRandomQoute();