<?php

$testData = [];
$testData["VENDORS"] = [
    ["ID" => 1, "NAME" => "AORUS"],
    ["ID" => 2, "NAME" => "ASUS"],
];

$testData["MODELS"] = [
    ["ID" => 1, "NAME" => "5",      "VENDOR_ID" => 1],
    ["ID" => 2, "NAME" => "15",     "VENDOR_ID" => 1],
    ["ID" => 3, "NAME" => "17G",    "VENDOR_ID" => 1],

    ["ID" => 4, "NAME" => "Laptop 11",     "VENDOR_ID" => 2],
    ["ID" => 5, "NAME" => "Laptop 13",     "VENDOR_ID" => 2],
    ["ID" => 6, "NAME" => "Zenbook 13",    "VENDOR_ID" => 2],
    ["ID" => 7, "NAME" => "Vivo 15",       "VENDOR_ID" => 2],
];

$testData["NOTEBOOKS"] = [
    ["ID" => 1, "NAME" => "KE4",  "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000), "MODEL_ID" => 1],
    ["ID" => 2, "NAME" => "SE4",  "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000), "MODEL_ID" => 1],
    ["ID" => 3, "NAME" => "XE4",  "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000), "MODEL_ID" => 1],

    ["ID" => 4, "NAME" => "KE5",  "YEAR" => rand(2016, 2022), "PRICE" => rand(15000, 100000), "MODEL_ID" => 2],
    ["ID" => 5, "NAME" => "SE6",  "YEAR" => rand(2016, 2022), "PRICE" => rand(15000, 100000), "MODEL_ID" => 2],
    ["ID" => 6, "NAME" => "XE7",  "YEAR" => rand(2016, 2022), "PRICE" => rand(15000, 100000), "MODEL_ID" => 2],

    ["ID" => 7, "NAME" => "KD1", "YEAR" => rand(2016, rand(2016, 2022)),  "PRICE" => rand(15000, 100000),  "MODEL_ID" => 3],
    ["ID" => 8, "NAME" => "KD2",  "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 3],

    ["ID" => 9, "NAME" => "Laptop 11 mod 1",  "YEAR" => rand(2016, 2022),"PRICE" => rand(15000, 100000),  "MODEL_ID" => 4],
    ["ID" => 10, "NAME" => "Laptop 11 mod 2", "YEAR" => rand(2016, 2022), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 4],
    ["ID" => 11, "NAME" => "Laptop 11 mod 3", "YEAR" => rand(2016, 2022), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 4],

    ["ID" => 12, "NAME" => "Laptop 13 mod 1", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 5],
    ["ID" => 13, "NAME" => "Laptop 13 mod 2",  "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000), "MODEL_ID" => 5],
    ["ID" => 14, "NAME" => "Laptop 13 mod 3", "YEAR" => rand(2016, rand(2016, 2022)),  "PRICE" => rand(15000, 100000), "MODEL_ID" => 5],

    ["ID" => 15, "NAME" => "Zenbook 13 mod 1", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 6],
    ["ID" => 16, "NAME" => "Zenbook 13 mod 2", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 6],

    ["ID" => 17, "NAME" => "Vivo 15 mod 1", "YEAR" => rand(2016, rand(2016, 2022)),  "PRICE" => rand(15000, 100000), "MODEL_ID" => 7],
    ["ID" => 18, "NAME" => "Vivo 15 mod 2", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 19, "NAME" => "Vivo 15 mod 3", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 20, "NAME" => "Vivo 15 mod 4", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 21, "NAME" => "Vivo 15 mod 5", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 22, "NAME" => "Vivo 15 mod 6", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 23, "NAME" => "Vivo 15 mod 7", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 24, "NAME" => "Vivo 15 mod 8", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 25, "NAME" => "Vivo 15 mod 9", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 26, "NAME" => "Vivo 15 mod 10", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 27, "NAME" => "Vivo 15 mod 11", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 28, "NAME" => "Vivo 15 mod 12", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 29, "NAME" => "Vivo 15 mod 13", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 30, "NAME" => "Vivo 15 mod 14", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 31, "NAME" => "Vivo 15 mod 15", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 32, "NAME" => "Vivo 15 mod 16", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 33, "NAME" => "Vivo 15 mod 17", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 34, "NAME" => "Vivo 15 mod 18", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 35, "NAME" => "Vivo 15 mod 19", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 36, "NAME" => "Vivo 15 mod 20", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
    ["ID" => 37, "NAME" => "Vivo 15 mod 21", "YEAR" => rand(2016, rand(2016, 2022)), "PRICE" => rand(15000, 100000),  "MODEL_ID" => 7],
];

$testData["OPTIONS"] = [
    ["ID" => 1, "NAME" => "Дисплей"],
    ["ID" => 2, "NAME" => "Оперативная память"],
    ["ID" => 3, "NAME" => "Цвет"],
];

$display = ["13","14","15"];
$ram = ["4 Гб", "8 Гб"];
$color = ["Белый", "Чёрный", "Серебристый"];

$testData["NOTEBOOK_OPTIONS"] = [
    ["NOTEBOOK_ID" => 1, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 2, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 3, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 4, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 5, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 6, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 7, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 8, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 9, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 10, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 11, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 12, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 13, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 14, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 15, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 16, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 17, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 18, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 19, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 20, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 21, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 22, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 23, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 24, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 25, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 26, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 27, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 28, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 29, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 30, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 31, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 32, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 33, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 34, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 35, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 36, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
    ["NOTEBOOK_ID" => 37, "OPTIONS" => [1 => $display[rand(0, 2)],2 => $ram[rand(0, 1)],3 => $color[rand(0, 2)]]],
];
