<?php
require __DIR__ . '/vendor/autoload.php';

use League\Csv\Reader;

$csvFilePath1 = 'C:\\Users\\rowan\\Downloads\\inventory_log.csv';
$csvFilePath2 = 'C:\\Users\\rowan\\Downloads\\cookies_sales.csv';

$csv1 = Reader::createFromPath($csvFilePath1, 'r');
$csv1->setHeaderOffset(0);
$csv2 = Reader::createFromPath($csvFilePath2, 'r');
$csv2->setHeaderOffset(0);

$data1 = iterator_to_array($csv1->getRecords());
$data2 = iterator_to_array($csv2->getRecords());

foreach ($data1 as $index => $row1) {
    
    $row2 = $data2[$index];

    
    $start1 = (int)$row1['Starting Inventory'];
    $delivered1 = (int)$row1['Delivered'];
    $end1 = (int)$row1['Ending Inventory'];
    $aantal_koekjes1 = $start1 + $delivered1 - $end1;

    $sold = (int)$row2['Units Sold'];

    if ($aantal_koekjes1 !== $sold) {
        
        $date1 = $row1['Date'];
        $type1 = $row1['Cookie Type'];
        $verschil = $aantal_koekjes1 - $sold;
        echo "Datum: $date1, Type Koekje: $type1, Verschil: $verschil\n<br>";
    }
}
?>