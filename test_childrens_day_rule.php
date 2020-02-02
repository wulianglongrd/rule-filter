<?php
namespace RuleFilter;

use RuleFilter\Common\Request;
use RuleFilter\Common\Response;
use RuleFilter\Filters\Filter;
use RuleFilter\Rules\ChildrensDayRule;

require_once './autoload.php';

/**
 * @var $oFilter Filter
 */

$oChildrensDayRule = new ChildrensDayRule();
$aFilters = $oChildrensDayRule->getFilters();
$aFilters = array_reverse($aFilters);

echo "ChildrensDayRule filters: \n";
print_r($aFilters);
echo "==========================\n";

$oExecStack = $oChildrensDayRule;
foreach ($aFilters as $className => $param) {
    $oFilter = new $className($oExecStack);
    $oFilter->setFilterParam($param);
    $oExecStack = $oFilter;
}

echo "Jone can celebrate children's Day: \n";
$aUser = [
    'name' => 'Jone',
    'age' => 18,
    'gender' => 'male',
];
$oRequest = new Request();
$oResponse = new Response();
$oRequest->setPayload($aUser);

$oExecStack->execute($oRequest, $oResponse);
echo "=========response=================\n";
var_dump($oResponse);


echo "==========================\n";

echo "Lucy can't celebrate children's Day: \n";
$aUser = [
    'name' => 'Jone',
    'age' => 19,
    'gender' => 'female',
];
$oRequest = new Request();
$oResponse = new Response();
$oRequest->setPayload($aUser);

$oExecStack->execute($oRequest, $oResponse);

echo "=========response=================\n";
var_dump($oResponse);
