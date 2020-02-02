<?php
namespace RuleFilter\Filters;

use RuleFilter\Common\Filterable;
use RuleFilter\Common\Reason;
use RuleFilter\Common\Request;
use RuleFilter\Common\Response;

class GenderFilter extends Filter
{
    private $filter;

    public function __construct(Filterable $filter)
    {
        $this->filter = $filter;
    }

    public function execute(Request $request, Response $response)
    {
        echo "GenderFilter start...\n";

        $aUser = $request->getPayload();
        $sGender = $this->getFilterParam();
        if($aUser['gender'] != $sGender) {
            $oReason = new Reason();
            $oReason->setFilter('gender');
            $oReason->setReason("gender should equal {$sGender}");
            $response->addReason($oReason);
        }

        echo "GenderFilter end...\n";
        $this->filter->execute($request, $response);
    }
}
