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


function globalnames_query($query)
{

	$data = new stdclass;
	$data->operationName = "NameResolver";
	$data->variables = new stdclass;
	$data->variables->names = array();

	foreach ($query as $q)
	{
		$name = new stdclass;
		$name->value = $q;

		$data->variables->names[] = $name;
	}


	$data->variables->bestMatchOnly = false;
	
	
	// https://index.globalnames.org/datasource
	
	$data->variables->dataSourceIds = array();

	$data->variables->dataSourceIds[] = 2; // Wikispecies
	$data->variables->dataSourceIds[] = 5; // Index Fungorum
	$data->variables->dataSourceIds[] = 8; // IRMNG
	$data->variables->dataSourceIds[] = 9; // WoRMS
	$data->variables->dataSourceIds[] = 11; // GBIF
	$data->variables->dataSourceIds[] = 12; // EOL
	
	$data->variables->dataSourceIds[] = 167; // IPNI
	//$data->variables->dataSourceIds[] = 168; // ION
	
	$data->variables->dataSourceIds[] = 173; // Reptile database
	$data->variables->dataSourceIds[] = 174; // MSW3

	//$data->variables->dataSourceIds[] = 181; // IRMNG

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

	// print_r($response);	
	
	$obj = new stdclass;
	
	foreach ($response->data->nameResolver->responses as $r)
	{
		$k = $r->suppliedInput;
		$obj->{$k} = array();
		
		foreach ($r->results as $result)
		{
			// filter for exact matches
			if ($result->canonicalName->valueRanked == $r->suppliedInput)
			{
				switch ($result->dataSource->id)
				{
					case 4:
						$obj->{$k}['ncbi'] = $result->taxonId;
						break;
			
			
					case 9:
						$obj->{$k}['worms'] = str_replace('urn:lsid:marinespecies.org:taxname:', '', $result->taxonId);
						break;
					
					case 11:
						$obj->{$k}['gbif'] = $result->taxonId;
						break;
					
					case 12:
						$obj->{$k}['eol'] = $result->taxonId;
						break;

					case 181:
						$obj->{$k}['irmng'] = $result->taxonId;
						break;

			
					default:
						break;
				}
			}
		}
	
	}
	
	//print_r($obj);
	
	return $obj;
}


// test
if (0)
{
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

	$query = array('Trochozonites', 'Trochozonites usambarensis');
	
	$query = array('Elisolimax');


	$obj = globalnames_query($query);
	
	print_r($obj);
}

?>