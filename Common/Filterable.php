<?php
namespace RuleFilter\Common;

interface Filterable
{
    public function execute(Request $request, Response $response);
}
