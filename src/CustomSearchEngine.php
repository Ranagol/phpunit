<?php

/**
 * Here we make a custom Google search. We use SOAP.
 * 
 */
class CustomSearchEngine {

    /**
     * This is a SOAP client.
     */
    public $googleSearch;

    public function __construct($googleSearch)
    {
        $this->googleSearch = $googleSearch;
    }

    public function triggerWebService()
    {
        /**
         * doGoogleSearch is actually an existing SOAP method in Google.
         * It really needs these parameters.
         */
        $this->googleSearch->doGoogleSearch(
            '00000000000000000000000000000000',
            'PHPUnit',//we search for this keyword
            0,
            1,
            false,
            '',
            false,
            '',
            '',
            ''
        );
        
        return 'something ...';//we return just a hardcoded sentence as a result
    }
}

