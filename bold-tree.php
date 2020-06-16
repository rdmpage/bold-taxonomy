<?php

require_once(dirname(__FILE__) . '/simplehtmldom_1_5/simple_html_dom.php');

//----------------------------------------------------------------------------------------
function get($url)
{
	
	$opts = array(
	  CURLOPT_URL =>$url,
	  CURLOPT_FOLLOWLOCATION => TRUE,
	  CURLOPT_RETURNTRANSFER => TRUE
	);
	
	$ch = curl_init();
	curl_setopt_array($ch, $opts);
	$data = curl_exec($ch);
	$info = curl_getinfo($ch); 
	curl_close($ch);
	

	
	return $data;
			
}

//----------------------------------------------------------------------------------------

$stack = array();

$root = 872; // Charopidae
$root = 85119;

$root = 50; // Amphibia
$root = 62; // Mammalia
$root = 19; // Nematoda [31609]
$root = 23; // Mollusca [223634]
$root = 497163; // Nemertea [4911]
$root = 10; // Onychophora [1165]
$root = 5; // Platyhelminthes [35597]
$root = 24818; // Porifera [6722]
$root = 392644; // Priapulida [60]
$root = 16;// Rotifera [12287]
$root = 15;// Sipuncula [1097]
$root = 26033;// Tardigrada [2755]

/*
<ul>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=11">Acanthocephala [1794]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=2">Annelida [94099]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=20">Arthropoda [9160324]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=9">Brachiopoda [293]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=7">Bryozoa [3920]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=13">Chaetognatha [1469]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=18">Chordata [807844]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=3">Cnidaria [28088]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=79455">Cycliophora [326]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=4">Echinodermata [52042]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=78956">Gnathostomulida [24]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=21">Hemichordata [225]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=23">Mollusca [223634]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=19">Nematoda [31609]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=497163">Nemertea [4911]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=10">Onychophora [1165]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=5">Platyhelminthes [35597]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=24818">Porifera [6722]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=392644">Priapulida [60]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=16">Rotifera [12287]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=15">Sipuncula [1097]</a></li>
<li><a href="/index.php/Taxbrowser_Taxonpage?taxid=26033">Tardigrada [2755]</a></li>
</ul>
*/

$root = 11; //Acanthocephala [1794]
$root = 2; //Annelida [94099]
$root = 20; //Arthropoda [9160324]
$root = 9; //Brachiopoda [293]
$root = 7; //Bryozoa [3920]
$root = 13; //Chaetognatha [1469]
$root = 18; //Chordata [807844]
//$root = 3; //Cnidaria [28088]
//$root = 79455; //Cycliophora [326]
//$root = 4; //Echinodermata [52042]
//$root = 78956; //Gnathostomulida [24]
//$root = 21; //Hemichordata [225]


//$root = 23; //Mollusca [223634]
//$root = 19; //Nematoda [31609]
//$root = 497163; //Nemertea [4911]
//$root = 10; //Onychophora [1165]
//$root = 5; //Platyhelminthes [35597]
//$root = 24818; //Porifera [6722]
//$root = 392644; //Priapulida [60]
//$root = 16; //Rotifera [12287]
//$root = 15; //Sipuncula [1097]
//$root = 26033; //Tardigrada [2755]

// missing arthropods

$root = 987854; //Acrothoracica [4]
//$root = 63; //Arachnida [441854]
//$root = 68; //Branchiopoda [19312]
//$root = 73; //Cephalocarida [27]
//$root = 75; //Chilopoda [3725]
//$root = 372; //Collembola [192602]
//$root = 979181; //Copepoda [29291]
//$root = 85; //Diplopoda [6655]
//$root = 734358; //Diplura [308]
//$root = 765970; // Hexanauplia [3]
//$root = 889450; //Ichthyostraca [206]

//$root = 82; //Insecta [8057960]
//$root = 69; //Malacostraca [182099]
//$root = 74; //Merostomata [83]
//$root = 889452; //Oligostraca_class_incertae_sedis [1]
//$root = 80; //Ostracoda [7060]
//$root = 493944; //Pauropoda [97]
//$root = 83; //Pentastomida [4]
//$root = 734357; //Protura [225]
//$root = 26059; //Pycnogonida [3650]
//$root = 84; //Remipedia [36]
//$root = 80390; //Symphyla [191]
//$root = 981579; //Thecostraca [17260]


$root = 87070; // Archaeognatha [4976]
$root = 532340; // Blattodea [32005]
$root = 413; // Coleoptera [685248]

$roots = array(

87070,
532340,

// missign Coleoptera

530045, 
167375, 
384691, 
530048, 
353322, 
170115, 
889436, 
167319, 
168735, 
530049, 
379944, 
170098, 
181243, 
197085, 
318219, 
530053, 
471581, 
111683, 
165879, 
530054, 
1052,   
1108,   
111681, 
310193, 
167204, 
1131,   
948,    
755748, 
530056, 
1751,   
103775, 
167596, 
530057, 
167209, 
1813,   
111680, 
942888, 
167703, 
24402,  
530059, 
1037,   
);

foreach ($roots as $root)
{

	$stack = array();

	$stack[] = $root;

	$count = 1;

	while (count($stack) > 0)
	{
		$id = array_pop($stack);
	
		// API to get data
	
		$json = get('http://v3.boldsystems.org/index.php/API_Tax/TaxonData?taxId=' . $id . '&dataTypes=basic');
	
		// echo $json . "\n";
	
		$obj = json_decode($json);
	
		if ($obj)
		{
	
			$keys = array();
			$values = array();
	
			foreach ($obj as $k => $v)
			{
				$keys[] = $k;
				$values[] = '"' . addcslashes($v, '"') . '"';
			}
	
			//print_r($keys);
			//print_r($values);
	
			if (count($keys) != 0)
			{	
				echo 'REPLACE INTO bold(' . join(',', $keys) . ') VALUES (' . join(',', $values) . ');' . "\n";
			}

			// Web page to get children (FFS)
			$html = get('http://v3.boldsystems.org/index.php/TaxBrowser_Taxonpage?taxid=' . $id);
	
			// page info
	
			// more links?
	
			if ($html != '')
			{
				$dom = str_get_html($html);
		
				foreach ($dom->find('div[id=taxMenu] ol li a') as $a)
				{
					//echo $a->href . "\n";
			
					$child_id = $a->href;
					$child_id = str_replace('/index.php/Taxbrowser_Taxonpage?taxid=', '', $child_id);
			
					$stack[] = $child_id;
				}
			}
		}
		
		//print_r($stack);
	
		echo "-- [" . count($stack) . "]\n";
	
		// Give server a break every 10 items
		if (($count++ % 10) == 0)
		{
			$rand = rand(1000000, 3000000);
			echo "\n-- ...sleeping for " . round(($rand / 1000000),2) . ' seconds' . "\n\n";
			usleep($rand);
		}
	
	

	}
}

		
?>

