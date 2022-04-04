<?php

function __export($key, $data = null){
    $fileManager = new Filemanager(SRC_PATH);
    if(!($package = $fileManager->json('package.json'. true))){
        $package = new Arr(json_decode('{"name": "gomee_business","author": {"name": "Doãn LN", "email": "doanln16@gmail.com", "url": "http://doanl2.chinhlatoi.vn"}, "exports":{"database": {},"views": {},"assets": {},"providers":{}}}', true));
    }
    $package->set("exports.".$key, $data);
    return $fileManager->saveJson('package.json', $package->all());
}

function exportMigration($table, $filename = null)
{
    if(!$filename) $filename = "create_{$table}_table.php";
    __export('database.migrations.'.$table, $filename);
}