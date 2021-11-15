<?php

namespace ExtractXml;


class ExtractXmlData
{
    public function extractXmlFromString($existingFile) {
        if (file_exists($existingFile)) {
            $xml = simplexml_load_file($existingFile);
            echo('Xml successfully extracted from string');
            return $xml;
        }

        exit('Echec lors de l\'ouverture du fichier: '.$existingFile);
    }

    public function downloadAndStoreXmlPage(string $url, $fileNameToRecord): void
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $data = curl_exec($ch);
        file_put_contents($fileNameToRecord.'.txt', $data);
    }

}