<?php

defined('IN_CODOF') or die();

/*
 * @CODOLICENSE
 */

/*
 * Easy reference to all constants used by codoforum
 */

/*
 * Assumes load.php includes this file
 */

/*
 * defined in index.php
 */



define('CODO_DEBUG', 1);
define('DISPLAY_ERRORS', 'ON');
define('MODE', 'PRODUCTION'); //Can be DEVELOPMENT or PRODUCTION

define('SEF', 0); //Search engine freindly urls , 1=> enable , 0=> disable
define('SYSPATH', ABSPATH . 'sys/');
define('CONTROLLERS_DIR', SYSPATH . 'Controller/');

define('DATA_REL_PATH', 'sites/' . CODO_SITE . '/');
define('DATA_PATH', ABSPATH . DATA_REL_PATH); //user data is stored
define('ASSET_DIR', DATA_PATH . 'assets/');
define('CAT_IMGS', 'assets/img/cats/'); //path where category images are stored
define('CAT_ICON_IMGS', 'assets/img/cats/icons/'); //path where category icon images are stored

define('AVATAR_PATH', DATA_PATH . 'assets/img/profiles/'); //path where default avatar is stored
define('SMILEY_PATH', 'assets/img/smileys/');

define('PROFILE_IMG_PATH', 'assets/img/profiles/');
define('PROFILE_ICON_PATH', 'assets/img/profiles/icons/');

//Default user roles
define('ROLE_ADMIN', 4);
define('ROLE_MODERATOR', 3);
define('ROLE_USER', 2);
define('ROLE_GUEST', 1);
define('ROLE_UNVERIFIED', 5);
define('ROLE_BANNED', 6);

define('NEW_CONTENT_TIME', time() - (60 * 60 * 24 * 30)); //content before 30 days is not considered new

define('CODOFORUM_PATH', '');

class Constants {

    const MODE_DEVELOPMENT = 'PRODUCTION';
    const MODE_PRODUCTION = 'PRODUCTION';

    /**
     * The very beginning
     * @param $path
     */
    public static function pre_config($path) {

        define('THEME_DIR', DATA_PATH . 'themes/');
        define('DEF_THEME_DIR', THEME_DIR . 'velux_prime/');
        
        
        define('PLUGIN_DIR', DATA_PATH . 'plugins/');

        $ruri = str_replace("index.php", "", $path);


        define('SALT', 'd4F54@4ed!!ef');

        $duri = $ruri . CODOFORUM_PATH;
        
        if (!SEF) {
            define('RURI', $ruri . 'index.php?u=/');
            define('NRURI', RURI);            
        } else {
            define('RURI', $ruri);
            define('NRURI', $ruri . 'index.php?u=/');
        }


        define('DURI', $duri . 'sites/' . CODO_SITE . '/');
        define('DEF_THEME_PATH', DURI . 'themes/velux_prime/');
        define('ASSET_URL', DURI . 'assets/');
        define('PLUGIN_PATH', DURI . 'plugins/');
    }

    /**
     * After config.php is loaded, DB connection not yet made
     * @param $CONF
     */
    public static function post_config($CONF) {

        define('UID', $CONF['UID']);
        define('SECRET', $CONF['SECRET']);
        define('PREFIX', $CONF['PREFIX']);

    }

    /**
     * After database connection has been made and everything is setup
     * @param $views_dirA
     */
    public static function post_boot($views_dir) {

        define('LOCALE', Util::get_opt('default_language'));
        define('CURR_THEME', DURI . $views_dir);
        define('CURR_THEME_PATH', DATA_PATH . $views_dir);
    }

}
