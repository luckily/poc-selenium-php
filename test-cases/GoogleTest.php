<?php

require_once 'phar://' . dirname(__FILE__) . '/../phpunit_facebook_webdriver.phar/autoload.php';

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverKeys;

class GoogleTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected $webDriver;
    protected $url = 'https://www.google.com.tw/';

    protected function setUp()
    {
        $host = 'http://localhost:4444/wd/hub';
        $browser = DesiredCapabilities::chrome();
        $this->webDriver = RemoteWebDriver::create($host, $browser);
    }

    protected function tearDown()
    {
        $this->webDriver->close();
    }

    public function testSearch()
    {
        $this->webDriver->get($this->url);

        $input = $this->webDriver->findElement(WebDriverBy::cssSelector('#lst-ib'));
        $input->sendKeys('yiiframework');
        $this->webDriver->getKeyboard()->pressKey(WebDriverKeys::ENTER);

        // waiting for google load ajax complete.
        sleep(2);

        $response = $this->webDriver->findElement(WebDriverBy::cssSelector('#ires div.srg div.g div.rc h3.r a'))->getText();

        sleep(3);

        $this->assertContains('Yii PHP Framework', $response);
    }

    /**
     * @param $driver
     * @param string $framework
     * @throws Exception
     * @see https://github.com/facebook/php-webdriver/wiki/How-to-work-with-jQuery,-Prototype,-Dojo-AJAX
     */
    public function waitForAjax($driver, $framework = 'jquery')
    {
        // javascript framework
        switch($framework){
            case 'jquery':
                $code = "return jQuery.active;"; break;
            case 'prototype':
                $code = "return Ajax.activeRequestCount;"; break;
            case 'dojo':
                $code = "return dojo.io.XMLHTTPTransport.inFlight.length;"; break;
            default:
                throw new Exception('Not supported framework');
        }

        do {
            sleep(2);
        } while ($driver->executeScript($code));
    }
}

