<?php


// Query global names for matches

//----------------------------------------------------------------------------------------
// post
function post($url, $data = '')
{
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
	curl_setopt($ch, CURLOPT_HTTPHEADER, 
		array(
			"Content-type: application/json"
			)
		);
		

	$response = curl_exec($ch);
	if($response == FALSE) 
	{
		$errorText = curl_error($ch);
		curl_close($ch);
		die($errorText);
	}
	
	$info = curl_getinfo($ch);
	$http_code = $info['http_code'];
		
	curl_close($ch);
	
	return $response;
}


//----------------------------------------------------------------------------------------


$q = "Gittenedouardia";

$q = 'Trochozonites usambarensis';

$query = array('Gittenedouardia',
'Gittenedouardia arenicola',
'Gittenedouardia conulus',
'Gittenedouardia dimera',
'Gittenedouardia drakensbergensis',
'Gittenedouardia mcbeaniana',
'Gittenedouardia meridionalis',
'Gittenedouardia natalensis',
'Gittenedouardia sp',
'Gittenedouardia spadicea',
'Gittenedouardia tumida',);


$data = new stdclass;
$data->operationName = NameResolver;
$data->variables = new stdclass;
$data->variables->names = array();

foreach ($query as $q)
{
	$name = new stdclass;
	$name->value = $q;

	$data->variables->names[] = $name;
}


$data->variables->bestMatchOnly = false;
$data->variables->dataSourceIds = array();

$data->variables->dataSourceIds[] = 9; // WoRMS

$data->query = 'query NameResolver($names: [name!]!, $dataSourceIds: [Int!], $bestMatchOnly: Boolean) {
  nameResolver(names: $names, bestMatchOnly: $bestMatchOnly, dataSourceIds: $dataSourceIds) {
    responses {
      suppliedInput
      total
      results {
        name {
          id
          value
        }
       canonicalName {
          id
          value
          valueRanked
        }        
        dataSource {
          id
          title
        }
        synonym
        taxonId        
        classification {
          path
        }
        acceptedName {
          name {
            value
          }
        }
        matchType {
          kind
          score
        }
      }
    }
  }
}
';



$url = 'https://index.globalnames.org/api/graphql';

$json = post($url, json_encode($data));

$response = json_decode($json);

print_r($response);

?>