<?php

namespace Pages;

/**
 * Class ResultsPage
 * @package Pages
 */
class ResultsPage
{
    /**
     * @var string xpath
     */
    public static $result = "//table[@class='tableListResults']/tbody/tr[contains(@class, 'odd') or contains(@class, 'even')]";

    /**
     * @var string
     */
    public static $catalogueBrand = "//b[contains(., '%s')]";
}
