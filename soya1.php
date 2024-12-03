<?php
echo "\n\nJoin diskusi channel https://t.me/Si_New_Bie\n\n";
function nama() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://ninjaname.horseridersupply.com/indonesian_name.php");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $ex = curl_exec($ch);
    preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);
    $fullName = $name[2][mt_rand(0, 14)];
    $nameParts = explode(' ', $fullName);
    
    if (count($nameParts) > 2) {
        $firstName = $nameParts[0];
        $lastName = $nameParts[1];
    } else {
        $firstName = $nameParts[0];
        $lastName = isset($nameParts[1]) ? $nameParts[1] : '';
    }
    
    return [$firstName, $lastName];
}


function generateRandomDOB() {
    $year = 2022;
    $month = rand(1, 12);
    $day = rand(1, cal_days_in_month(CAL_GREGORIAN, $month, $year));
    return sprintf('%04d-%02d-%02d', $year, $month, $day);
}

$filename = 'wa.txt';

if (file_exists($filename)) {
    $file = fopen($filename, 'r');
    while (($phone = fgets($file)) !== false) {
        $phone = trim($phone);
	list($firstName, $lastName) = nama();
        $url = 'https://lead.hellohealthgroup.com/api/campaign/kosioj0q0muqedv/lead';

        $data = [
            "url" => "https://hellosehat.com/festival-soya-2024/?fbclid=IwZXh0bgNhZW0CMTEAAR0LpJO1TNNHQ1ENuXdJpS3mySVVO1LtmVUxGUjew5e2ne4NxXTZ_bdCjSI_aem_puZPJwfjnXcO0F7qekPVTA#ambil-voucher-special",
            "title_article" => "Soya Generasi Maju • Hello Sehat",
            "referrer" => "https://hellosehat.com/festival-soya-2024/?fbclid=IwZXh0bgNhZW0CMTEAAR0LpJO1TNNHQ1ENuXdJpS3mySVVO1LtmVUxGUjew5e2ne4NxXTZ_bdCjSI_aem_puZPJwfjnXcO0F7qekPVTA#ambil-voucher-special",
            "meta" => [
                [
                    "key" => "name",
                    "value" => $firstName." ".$lastName,
                    "control" => "text"
                ],
                [
                    "key" => "phone",
                    "value" => "+".$phone,
                    "control" => "text"
                ],
                [
                    "key" => "child_dob",
                    "value" => generateRandomDOB(),
                    "control" => "text"
                ]
            ]
        ];

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Host: lead.hellohealthgroup.com",
            "Content-Length: " . strlen(json_encode($data)),
            "sec-ch-ua-platform: Android",
            "User-Agent: Mozilla/5.0 (Linux; Android 14; M2101K6G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.6834.14 Mobile Safari/537.36",
            "Accept: application/json, text/plain, */*",
            "sec-ch-ua: \"Not A(Brand\";v=\"8\", \"Chromium\";v=\"132\", \"Android WebView\";v=\"132\"",
            "Content-Type: application/json",
            "sec-ch-ua-mobile: ?1",
            "Origin: https://hellosehat.com",
            "x-requested-with: idm.internet.download.manager.plus",
            "sec-fetch-site: cross-site",
            "sec-fetch-mode: cors",
            "sec-fetch-dest: empty",
            "Referer: https://hellosehat.com/",
            "Accept-Language: en,id-ID;q=0.9,id;q=0.8,en-US;q=0.7",
            "priority: u=1, i"
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        } else {
            echo 'Success: ' . $response . "\n";
        }

        curl_close($ch);
    }

    fclose($file);
} else {
    echo "File wa.txt tidak ditemukan.\n";
}

?>
