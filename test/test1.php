<?php

require_once 'apriori.php';


/*-------------------------------------testing with dataset text file--------------------*/
$obj=new Apriori();
$obj->setDelimiter(',');	// * need
$obj->setUseTextOrArray('text'); 	// * need
$obj->process('dataset.txt');
//Frequent Itemsets
echo "<h1>Testing with dataset text file</h1>";
echo '<h1>Frequent Itemsets</h1>';
$obj->printFreqItemsets();
echo '<h3>Frequent Itemsets Array</h3>';
echo '<pre>';
print_r($obj->getFreqItemsets()); 
echo '</pre>';
//Association Rules
echo '<h1>Association Rules</h1>';
$obj->printAssociationRules();
echo '<h3>Association Rules Array</h3>';
echo '<pre>';
print_r($obj->getAssociationRules()); 
echo '</pre>';

// save to file
$obj->saveFreqItemsets('freqitemset_test.txt');
$obj->saveAssociationRules('associative_test.txt');