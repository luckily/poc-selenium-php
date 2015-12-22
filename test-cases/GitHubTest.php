<?php

require_once 'phar://' . dirname(__FILE__) . '/../phpunit_facebook_webdriver.phar/autoload.php';

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class GitHubTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected $webDriver;
    protected $url = 'https://github.com/';

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
        $form = $this->webDriver->findElement(WebDriverBy::cssSelector('form.js-site-search-form'));
        $input = $form->findElement(WebDriverBy::cssSelector('input[type=text].js-site-search-focus'));
        $input->sendKeys('yii 1.1');
        $form->submit();

        $link = $this->webDriver->findElement(WebDriverBy::cssSelector('ul.repo-list li.repo-list-item h3.repo-list-name a'));
        $link->click();

        $repositoryMeta = $this->webDriver->findElement(WebDriverBy::cssSelector('span.repository-meta-content'))->getText();

        sleep(3);

        $this->assertContains('Yii PHP Framework 1.1', $repositoryMeta);
    }
}

