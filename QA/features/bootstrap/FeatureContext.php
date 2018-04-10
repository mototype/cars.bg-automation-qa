<?php

use Behat\MinkExtension\Context\MinkContext;
use Pages\HomePage;
use Pages\ResultsPage;
use Webmozart\Assert\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext
{
    /**
     * @var array
     */
    protected $searchCriteria = [];

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct() {}

    /**
     * @Given I am on :url home page
     *
     * @param $url
     */
    public function iAmOnPage($url)
    {
        $this->visit($url);
    }

    /**
     * @When I search for :make make and :model model and :year year
     *
     * @param $make
     * @param $model
     * @param $year
     */
    public function iSearchForMakeAndModelAndYear($make, $model, $year)
    {
        $this->search($make, $model, [HomePage::$year => $year]);
    }

    /**
     * @When I click on Search button
     */
    public function iClickOnSearchButton()
    {
        $this->getSession()->getPage()->find('xpath', HomePage::$search)->click();
    }

    /**
     * @Then I should see correct results list
     */
    public function iShouldSeeCorrectResultsList()
    {
        $url = $this->getSession()->getCurrentUrl();

        if (strpos($url, 'catalogue') !== false) {
            $this->assertSession()->elementExists('xpath', sprintf(ResultsPage::$catalogueBrand, $this->searchCriteria[0]));
            return;
        }

        $elements = $this->getSession()->getPage()->findAll('xpath', ResultsPage::$result);

        foreach ($elements as $element) {
            $text = $element->getText();
            foreach ($this->searchCriteria as $criterion) {
                Assert::contains($text, $criterion);
            }
        }
    }

    /**
     * @When I search for :make make and :model model and :fuel fuel
     * @param $make
     * @param $model
     * @param $fuel
     */
    public function iSearchForMakeAndModelAndFuel($make, $model, $fuel)
    {
        $this->search($make, $model, [HomePage::$fuel => $fuel]);
    }

    /**
     * @When I click on :make make logo in New cars catalogue section
     * @param $make
     */
    public function iClickOnMakeLogoInNewCarsCatalogueSection($make)
    {
        $this->searchCriteria[] = $make;
        $this->getSession()->getPage()->find('xpath', sprintf(HomePage::$newCarLogo, $make))->click();
    }

    /**
     * @param $make
     * @param $model
     * @param array $details
     */
    protected function search($make, $model, array $details = [])
    {
        $this->searchCriteria[] = $make;
        $this->searchCriteria[] = $model;
        $this->selectOption(HomePage::$make, $make);
        $this->getSession()->getPage()->findById(HomePage::$modelSelect)->click();
        $this->getSession()->getPage()->find('xpath', sprintf(HomePage::$modelCheckbox, $model))->check();
        $this->getSession()->getPage()->find('xpath', HomePage::$modelCloseBtn)->click();

        if (isset($details)) {
            foreach ($details as $selector => $option) {
                $this->selectOption($selector, $option);
            }
        }
    }
}
