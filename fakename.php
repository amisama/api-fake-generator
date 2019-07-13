<?php 

	function pecah($start,$end,$content){
		$first = explode($start , $content );
		$second = explode($end , $first[1] );
		return $second[0];
	}

	$gender = getopt("g:");

	if ($gender['g']==="female") {
		$html = file_get_contents('https://namefake.com/indonesian-indonesia/female/');
	} elseif ($gender['g']==="male") {
		$html = file_get_contents('https://namefake.com/indonesian-indonesia/male/');
	} else {
		$html = file_get_contents('https://namefake.com/indonesian-indonesia/random/');
	}


	$nama['nama'] = pecah('<h2>','</h2>',$html);
	$alamat['alamat'] = pecah('</h2>','<br>',$html);
	$tgl['tanggal_lahir'] = pecah('<div class="left_h46">Date</div><div class="rght_h46">','</div>',$html);
	$umur['umur'] = pecah('<div class="left_h46">Age</div><div class="rght_h46">
','</div>',$html);
	$zodiac['zodiac'] = pecah('<div class="left_h46">Zodiac</div><div class="rght_h46">','</div>',$html);
	$phone['phone'] = pecah('<div class="left_h46">Work phone</div><div class="rght_h46">','</div>',$html);
	$website['website'] = pecah('<div class="left_h46">Website</div><div class="rght_h46"><a href="//myip-address.com/whois/','" target="_blank">',$html);
	$company['company'] = pecah('<div class="left_h46">Company</div><div class="rght_h46">','</div>',$html);
	$tinggi['tinggi'] = pecah('<div class="left_h46">Height</div><div class="rght_h46">','</div>',$html);
	$berat['berat'] = pecah('<div class="left_h46">Weight</div><div class="rght_h46">','</div>',$html);
	$darah['darah'] = pecah('<div class="left_h46">Blood type</div><div class="rght_h46">','</div>',$html);
	
	$ami = json_encode([
        'crator' => "Ami",
        'Nama' => $nama,
        'Alamat' => $alamat,
        'Tanggal Lahir' => $tgl,
        'Umur' => $umur,
        'Zodiac' => $zodiac,
        'Phone' => $phone,
        'Website' => $website,
        'Company' => $company,
        'Tinggi' => $tinggi,
        'Darah' => $darah
    ]);
echo $ami;

?>