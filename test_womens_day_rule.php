<?php
namespace RuleFilter;

use RuleFilter\Common\Request;
use RuleFilter\Common\Response;
use RuleFilter\Filters\Filter;
use RuleFilter\Rules\WomensDayHolidayRule;

require_once './autoload.php';

/**
 * @var $oFilter Filter
 */

$oWomensDayHolidayRule = new WomensDayHolidayRule();
$aFilters = $oWomensDayHolidayRule->getFilters();

echo "WomensDayHolidayRule filters: \n";
print_r($aFilters);
echo "==========================\n";

$oExecStack = $oWomensDayHolidayRule;
foreach ($aFilters as $className => $param) {
    $oFilter = new $className($oExecStack);
    $oFilter->setFilterParam($param);
    $oExecStack = $oFilter;
}

echo "Jone can't celebrate women's Day: \n";
$aUser = [
    'name' => 'Jone',
    'age' => 18,
    'gender' => 'male',
];
$oRequest = new Request();
$oResponse = new Response();
$oRequest->setPayload($aUser);

$oExecStack->execute($oRequest, $oResponse);
var_dump($oResponse);


echo "==========================\n";

echo "Lucy can celebrate women's Day: \n";
$aUser = [
    'name' => 'Jone',
    'age' => 19,
    'gender' => 'female',
];
$oRequest = new Request();
$oResponse = new Response();
$oRequest->setPayload($aUser);

$oExecStack->execute($oRequest, $oResponse);
var_dump($oResponse);
