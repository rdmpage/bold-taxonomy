<?php

// Match BOLD taxa to external databases

error_reporting(E_ALL);
error_reporting(E_ALL ^ E_DEPRECATED);

require_once (dirname(__FILE__) . '/adodb5/adodb.inc.php');
require_once (dirname(__FILE__) . '/globalnames-graphql.php');

//----------------------------------------------------------------------------------------
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	'root', '', 'wikidata-taxa');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$db->EXECUTE("set names 'utf8'"); 


// 1. Just match a set of names

// 2. Match a subtree

$sql = 'SELECT * FROM bold WHERE parentname="Urocyclidae"';

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

$pages = array();

while (!$result->EOF) 
{	
	$obj = new stdclass;

	$name = $result->fields['taxon'];	


	$query = array($name);
	
	$obj = globalnames_query($query);
	
	print_r($obj);


	$result->MoveNext();
}	
