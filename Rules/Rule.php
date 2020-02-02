<?php
namespace RuleFilter\Rules;

use RuleFilter\Common\Filterable;

abstract class Rule implements Filterable
{
    public function getFilters()
    {
        return [];
    }
}
