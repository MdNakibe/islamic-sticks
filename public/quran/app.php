<?php

$saveDir = __DIR__ . '/text-edition/';
if (!is_dir($saveDir)) {
  mkdir($saveDir, 0755, true); // Create the directory if it doesn't exist
}

// Make the initial request to get the links
$response = file_get_contents('http://api.alquran.cloud/v1/edition');
$links = json_decode($response, true);

// Loop through the links and make a request to each one
foreach ($links['data'] as $index => $item) {
  $filename = $saveDir . $item['identifier'] . '.json';
  $response = file_get_contents('https://api.alquran.cloud/v1/quran/'.$item['identifier']);
  file_put_contents($filename, json_encode(json_decode($response)->data));
  echo "Saved $index \n";
}


/*
import os
import requests


link = 'http://api.alquran.cloud/v1/edition'
save_dir = './text-edition'

# Make request to get links
response = requests.get(link)
links = response.json()

# Loop through links and make requests
for i, link in enumerate(links):
    try:
        response = requests.get(f"https://api.alquran.cloud/v1/quran/{item['identifier']}")
        file_name = f"{item['identifier']}.json"
        file_path = os.path.join(save_dir, file_name)

        # Write response data to file
        with open(file_path, 'w') as f:
            f.write(response.text)
        
        print(f"Response data saved to file: {file_path}")

    except requests.exceptions.RequestException as e:
        print(f"Error making request to link: {link}", e)

*/