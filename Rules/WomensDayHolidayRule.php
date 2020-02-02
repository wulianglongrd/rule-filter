<?php
namespace RuleFilter\Rules;

use RuleFilter\Common\Request;
use RuleFilter\Common\Response;
use RuleFilter\Filters\AgeFilter;
use RuleFilter\Filters\GenderFilter;

/**
 * rules for women's Day holidays
 */
class WomensDayHolidayRule extends Rule
{
    public function getFilters()
    {
        // women older than 18 can enjoy women's Day
        return [
            AgeFilter::class => ['>', 18],
            GenderFilter::class => 'female'
        ];
    }

    public function execute(Request $request, Response $response)
    {
        if(empty($response->getReasons())) {
            $response->setEnable(true);
        }
    }
}
