<?php

namespace Pages;

/**
 * Class HomePage
 * @package Pages
 */
class HomePage extends Page
{
    /**
     * @var string id
     */
    public static $make = "BrandId";

    /**
     * @var string id
     */
    public static $modelSelect = 'modelId';

    /**
     * @var string xpath
     */
    public static $modelCheckbox = "//input[@data-label='%s']";

    /**
     * @var string xpath
     */
    public static $modelCloseBtn = "//a[@onclick='CloseModelPanel();']";

    /**
     * @var string id
     */
    public static $year = "YearFrom";

    /**
     * @var string id
     */
    public static $fuel = "fuelId";

    /**
     * @var string xpath
     */
    public static $newCarLogo = "//img/parent::a[contains(., '%s')]";

    /**
     * @var string xpath
     */
    public static $search = "//div[@id='Container']/descendant::a[@class='buttonPressedLink']";
}
