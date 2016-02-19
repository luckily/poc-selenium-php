/**
 * 有解決問題的連結
 * @see http://stackoverflow.com/questions/10792403/how-do-i-get-chrome-working-with-selenium-using-php-webdriver
 * @see http://facebook.github.io/php-webdriver/classes/WebDriverSelect.html
 * @see http://stackoverflow.com/questions/10382929/how-to-fix-unsupported-major-minor-version-51-0-error
 * @see http://www.sitepoint.com/using-the-selenium-web-driver-api-with-phpunit/
 * 
 * 未來跑在linux上，那要把driver放到上面，selenium才能run
 * @see http://chromedriver.storage.googleapis.com/index.html
 * 
 * ricky的selenium demo
 * @see https://github.com/RickySu/selenium-demo
 * @see https://docs.google.com/presentation/d/1L5tqUkieWTFV755krwPsGq-HXRLd4Bry2aYSmx_dtew/pub?start=false&loop=false&delayms=3000&slide=id.g8d47f2016_071
 * @see https://www.youtube.com/watch?v=CtsH1n5-Xcc
 * 
 * 鐵哥的範例
 * @see http://jaceju.net/2015/06/03/selenium-on-mac/
 * 
 * 
 * 其它資料:
 * @see https://github.com/fbi8101084/selenium-with-phpunit
 * @see https://github.com/Element-34/php-webdriver
 * @see https://github.com/facebook/php-webdriver
 * @see http://docs.seleniumhq.org/download/
 * @see http://www.puritys.me/docs-blog/article-252-PHP-Selenium-%E8%87%AA%E5%8B%95%E5%8C%96%E6%B8%AC%E8%A9%A6---%E8%B5%B7%E5%A7%8B%E8%A8%AD%E5%AE%9A.html
 * 
 * 透過pear安裝phpunit
 * @see http://stackoverflow.com/questions/12655136/install-phpunit-on-windows
 * phpunit --configuration phpunit.xml tests/EventTest
 * http://localhost:8080/selenium/test.php
 */

啟動selenium
``` for mac
java -Dwebdriver.chrome.driver=./bwoser-drive/chromedriver -jar selenium-server-standalone-2.39.0.jar
```
``` for windows
java -Dwebdriver.chrome.driver=C:\xampp\htdocs\selenium\chromedriver.exe -jar selenium-server-standalone-2.39.0.jar
```
 
