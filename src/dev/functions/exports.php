<?php
class PackageManager {
    protected static $fileManager;
    protected static $package;
    public static function check(){
        if(!static::$fileManager) static::$fileManager = new Filemanager(BASE_PATH);
        if(!(static::$package = static::$fileManager->json('package.json', true))){
            static::$package = new Arr(json_decode('{"name": "gomee_business","author": {"name": "Doãn LN", "email": "doanln16@gmail.com", "url": "http://doanl2.chinhlatoi.vn"}, "exports":{"database": {},"views": {},"assets": {},"providers":{}}}', true));
        }
    }
    public static function export($key = null, $data = null)
    {
        static::check();
        if($key) static::$package->set("exports.".$key, $data);
        return static::$fileManager->saveJson('package.json', static::$package->all());
    }

    public static function get()
    {
        static::check();
        return static::$package;
    }
}
class Composer {
    protected static $fileManager;
    /**
     * arr
     *
     * @var Arr
     */
    protected static $composer;
    protected static $manifest;
    public static function check(){
        if(!static::$fileManager) static::$fileManager = new Filemanager(BASE_PATH);
        if(!static::$composer) static::$composer = static::$fileManager->json('composer.json', true);
        if(!static::$manifest) static::$manifest = static::$fileManager->json('manifest.json', true);
        
    }
    public static function update($key = null, $data = null)
    {
        static::check();
        if($key) static::$composer->set($key, $data);
        return static::$fileManager->saveJson('composer.json', static::$composer->all());
    }

    public static function getNamespace()
    {
        static::check();
        return static::$composer->firstKey('autoload.psr-4');
    }

    public static function getPackageName()
    {
        static::check();
        return static::$manifest->firstKey('package');
    }
}


function __export($key, $data = null){
    return PackageManager::export($key, $data);
}

function exportMigration($table, $filename = null)
{
    if(!$filename) $filename = "create_{$table}_table.php";
    __export('database.migrations.'.$table, $filename);
}
function registerProvider($class){
    $package = PackageManager::get();
    $sp = $package->get('exports.providers');
    if(!$sp) $sp=[$class];
    elseif(!in_array($class, $sp)) $sp[] = $class;
    $package->set('exports.providers', $sp);
    return PackageManager::export();
}