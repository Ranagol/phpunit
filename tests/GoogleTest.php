<?php
use PHPUnit\Framework\TestCase;

/**
 * Unit test should not call external services. External service examples: Google, Amazon api… We 
 * want to mock external services. This is what is happening here. 
 * this code demonstrates how to write a unit test for a class that interacts with an external 
 * web service.
 */
class GoogleTest extends TestCase
{
    /**
     * Does the testing.
     */
    public function testSearch()
    {   
        /**
         * 1 - CREATE A WEB SERVICE MOCK OBJECT
         * 
         * To create stubs and mocks of web services, the getMockFromWsdl() can be used.
         */
        $googleSearchMock = $this->getMockFromWsdl(
          'http://soapclient.com/xml/googleSearch.wsdl', 'GoogleSearch'
        );


        /**
         * 2 - CREATING A RESPONSE THAT THE MOCK SERVICE WILL RETURN
         * 
         * This is part of the result that will be returned by our mock google web service.
         * 
         * This $element will be part of the result that will be returned by our mock google web service.
         * Here we are mimicking  the structure of the data that the Google Search web service might 
         * return.
         * 
         * A result object is also created, which holds the search results. This object is populated 
         * with the data created in previous steps. This is the result that will our mock web service
         * return.
         */
        $directoryCategory = new stdClass;
        $directoryCategory->fullViewableName = '';
        $directoryCategory->specialEncoding = '';
        
        $element = new stdClass;
        $element->summary = '';
        $element->URL = 'https://phpunit.de/';
        $element->snippet = '...';
        $element->title = '<b>PHPUnit</b>';
        $element->cachedSize = '11k';
        $element->relatedInformationPresent = true;
        $element->hostName = 'phpunit.de';
        $element->directoryCategory = $directoryCategory;
        $element->directoryTitle = '';
        
        $result = new stdClass;
        $result->documentFiltering = false;
        $result->searchComments = '';
        $result->estimatedTotalResultsCount = 3.9000;
        $result->estimateIsExact = false;
        $result->resultElements = [$element];
        $result->searchQuery = 'PHPUnit';
        $result->startIndex = 1;
        $result->endIndex = 1;
        $result->searchTips = '';
        $result->directoryCategories = [];
        $result->searchTime = 0.248822;

        /**
         * 3 - SET THE BEHAVIOUR OF THE $googleSearchMock mock web service
         * 
         * The expects method is used on the $googleSearchMock mock object to specify that the 
         * doGoogleSearch method can be called any number of times and that it should return the 
         * $result object created in the previous step.
         */
        $googleSearchMock->expects($this->any())
                     ->method('doGoogleSearch')
                     ->will($this->returnValue($result));

        /**
         * 4 - IT SEEMS TO ME THAT THIS PART IS USELESS BULLSHIT
         * 
         * $googleSearchMock->doGoogleSearch() will now return a stubbed result and
         * the web service's doGoogleSearch() method will not be invoked.
         * 
         * The test then proceeds to call the $googleSearchMock->doGoogleSearch method with various 
         * parameters, including a search query. Since the web service method is mocked, it returns 
         * the predefined $result object without making a real network request. The test uses 
         * assertEquals to compare the actual result with the expected result.
         */
        $this->assertEquals(
            $result,
            $googleSearchMock->doGoogleSearch(
                '00000000000000000000000000000000',
                'PHPUnit',
                0,
                1,
                false,
                '',
                false,
                '',
                '',
                ''
            )
        );

        /**
         * 5 - INSTANTIATE OUR CLASS THAT USES THE WEB SERVICE, DO THE ASSERTION
         * 
         * A CustomSearchEngine object is instantiated. But. We do not pass the real web service 
         * object as an argument. We pass the mock web service as an argument.
         */
        $customSearchEngine = new CustomSearchEngine($googleSearchMock);

        $this->assertEquals('something ...', $customSearchEngine->triggerWebService());

    }
}

