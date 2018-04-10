_Note that the project was completed on a *unix environment, hence some of the steps will differ on Windows._

Libraries used for the project are in the [composer.json file](composer.json)  

To initialize the project install [composer](https://getcomposer.org/) and run `composer update`  

Additionally, in order to run the tests one will need to download Selenium server standalone (preferably [v3.5](http://selenium-release.storage.googleapis.com/index.html?path=3.5/) or previous to avoid Chrome/Gecko driver problems) and latest [Chromedriver](https://sites.google.com/a/chromium.org/chromedriver/downloads)  

To have the Chromedriver usable by the Selenium server we will need to make it executable and move it to the local binaries:  
```
chmod +x chromedriver
cp chromedriver /usr/local/bin
```
At this point we can start the Selenium server  
```java -jar ~/Downloads/selenium-server-standalone-3.5.0.jar```

And execute the tests with `vendor/bin/behat` to see them passing.
