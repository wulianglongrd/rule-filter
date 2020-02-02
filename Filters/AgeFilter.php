<?php
namespace RuleFilter\Filters;

use RuleFilter\Common\Filterable;
use RuleFilter\Common\Reason;
use RuleFilter\Common\Request;
use RuleFilter\Common\Response;

class AgeFilter extends Filter
{
    private $filter;

    public function __construct(Filterable $filter)
    {
        $this->filter = $filter;
    }

    public function execute(Request $request, Response $response)
    {
        echo "AgeFilter start...\n";

        $aUser = $request->getPayload();
        list($operator, $number) = $this->getFilterParam();
        if(! eval("return {$aUser['age']} {$operator} {$number}; ")) {
            $oReason = new Reason();
            $oReason->setFilter('age');
            $oReason->setReason("age should {$operator} {$number}");
            $response->addReason($oReason);
        }

        echo "AgeFilter end...\n";
        $this->filter->execute($request, $response);
    }
}
