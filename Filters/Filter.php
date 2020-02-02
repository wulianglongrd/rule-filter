<?php
namespace RuleFilter\Filters;

use RuleFilter\Common\Filterable;

abstract class Filter implements Filterable
{
    private $filterParam = [];

    public function getFilterParam()
    {
        return $this->filterParam;
    }

    public function setFilterParam($filterParam)
    {
        $this->filterParam = $filterParam;
    }
}
