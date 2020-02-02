<?php
namespace RuleFilter\Rules;

use RuleFilter\Common\Request;
use RuleFilter\Common\Response;
use RuleFilter\Filters\AgeFilter;

/**
 * rules for Children's Day holidays
 */
class ChildrensDayRule extends Rule
{
    public function getFilters()
    {
        // everyone age less then 18 can enjoy children's day
        return [
            AgeFilter::class => ['<=', 18],
        ];
    }

    public function execute(Request $request, Response $response)
    {
        if(empty($response->getReasons())) {
            $response->setEnable(true);
        }
    }
}
