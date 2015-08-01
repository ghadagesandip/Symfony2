<?php
namespace Sandip\AppBundle\Twig;

use Symfony\Component\Validator\Constraints\DateTime;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('price', array($this, 'priceFilter')),
            new \Twig_SimpleFilter('readable_datetime', array($this, 'readableDateTimeFilter')),
        );
    }

    public function priceFilter($number, $decimals = 0, $decPoint = '.', $thousandsSep = ',')
    {
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
        $price = '$'.$price;

        return $price;
    }

    public function readableDateTimeFilter($datetimeObj){

    }

    public function getName()
    {
        return 'app_extension';
    }
}