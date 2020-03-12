<?php
// Clase Preferencia con sus propiedades y métodos
class Preferencia   {

    private static $init= false;
    public static $timezone;
    public static $language;
    public static $music;
    public static $color;

    public static function init(){
        if (!self::$init) {
            //Cargariamos por ejemplo una DB
            $prefs['timezone'] = "Europa/Madrid";
            $prefs['language'] = "es";
            $prefs['music'] = "on";
            $prefs['color'] = "negro";

            self::$timezone = $prefs['timezone'];
            self::$language = $prefs['language'];
            self::$music = $prefs['music'];
            self::$color = $prefs['color'];

            self::$init = true;
        }

}

}
?>