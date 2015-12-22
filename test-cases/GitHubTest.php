<?php

require './vendor/autoload.php';

class GitHubTest extends PHPUnit_Extensions_Selenium2TestCase
{

    public static function browsers()
    {
        return array(
            // array(
            //      'host' => '127.0.0.1',
            //      'port' => 4444,
            //      'browser' => 'firefox test browser',
            //      'browserName' => 'firefox',
            // ),
            array(
                 'host' => '127.0.0.1',
                 'port' => 4444,
                 'browser' => 'chrome test browser',
                 'browserName' => 'chrome',
            ),
        );
    }

    protected function setUp()
    {
        $this->setBrowserUrl('http://www.104.com.tw/');
    }


    public function setUpPage()
    {
        $this->url('/');
    }

    public function testTitle()
    {
        $element = $this->byCssSelector('.logo');
        var_dump($element->attribute('title'));
        $this->assertEquals($element->attribute('title'), '104人力銀行 - 不只找工作為你找方向');
        sleep(10);
    }
}

