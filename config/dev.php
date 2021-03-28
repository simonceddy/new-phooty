<?php
$csvData = new Phooty\Support\CSVData();

return [
    'surnames' => fn() => $csvData('surnames'),
    'firstNames' => fn() => $csvData('firstNames'),
];
