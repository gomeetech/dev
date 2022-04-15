<?php
class Dev {
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
    public static function getComposer()
    {
        static::check();
        return static::$composer;
    }
    public static function updateComposer($key = null, $data = null)
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
        return static::$manifest->get('package');
    }
    public static function getManifest()
    {
        static::check();
        return static::$manifest;
    }

}


function registerProvider($class){
    $composer = Dev::getComposer();
    $sp = $composer->get('extra.laravel.providers');
    if(!$sp) $sp=[$class];
    elseif(!in_array($class, $sp)) $sp[] = $class;
    $composer->set('extra.laravel.providers', $sp);
    return Dev::updateComposer();
}