<?php
	
	$Connection = new mysqli("localhost", "eonnthni_india", "ymrUeDIZBK12qwaseqeasdadwdd", "eonnthni_india");
	
	if ($Connection->connect_error) 
		die("Connection failed: " . $Connection->connect_error);
	
	// Create URLS for tblcategory
	$SQL = 'SELECT * FROM tblcategory';
	$Query = mysqli_query($Connection, $SQL);
	
	if (file_exists('ttsitemap.xml'))
		unlink('ttsitemap.xml');
	
	sleep(2);
	
	$fileHandle = fopen('ttsitemap.xml', 'w');
	$writeToFile ='<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">';
	fwrite($fileHandle, $writeToFile);
	
	$categories[] = array();
	$numberOfCategories = 0;
	$LastMod = date('Y-m-d', time());

	//echo "<br>";
	$writeToFile = '
<url>
	<loc>https://in.huntlocals.com/</loc>
	<lastmod>'.$LastMod.'</lastmod>
	<priority>1.00</priority>
</url>';
	fwrite($fileHandle, $writeToFile);
	foreach ($Query as $Item) {
		$categories[$numberOfCategories++] = $Item['category_slug'];
		
		$URL_Structure = 'https://' . $_SERVER['SERVER_NAME'] . '/' . $Item['category_slug'];
		$LastMod = $Item['updated_at'];
 
		$dt = new DateTime($LastMod);
		$LastMod = $dt->format('Y-m-d');

			
		$writeToFile = '
<url>
	<loc>'.$URL_Structure.'</loc>
	<lastmod>'.$LastMod.'</lastmod>
	<priority>1.00</priority>
</url>';
		
		fwrite($fileHandle, $writeToFile);
	}
	
	// Create URLS for locations depending on each category
	$SQL = 'SELECT * FROM tbllocation';
	$Query = mysqli_query($Connection, $SQL);
	
	foreach ($Query as $Item) {
		foreach ($categories as $category) {
			$URL_Structure = 'https://' . $_SERVER['SERVER_NAME'] . '/' . $category . '/' . $Item['location_slug'];
// 			$LastMod = $Item['updated_at'];
			
			$writeToFile = '
<url>
	<loc>'.$URL_Structure.'</loc>
	<lastmod>'.$LastMod.'</lastmod>
	<priority>0.80</priority>
</url>';
			
			fwrite($fileHandle, $writeToFile);
		}
	}
	
	$writeToFile = '
</urlset>';
	fwrite($fileHandle, $writeToFile);
	fclose($fileHandle);
	
?>