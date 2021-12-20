<?php


namespace OSP;

use Exception;
use OSP\Services\deferScripts;
use OSP\Services\removeScripts;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class App
{
    private static $instance;
    private array $services;

    /**
     * App constructor.
     */
    private function __construct() {
        $this->loadServices();
    }

    /**
     * Singleton can't be cloned
     */
    private function __clone() {

    }

    /**
     * Do not allow to wakeup
     * @throws Exception
     */
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }

    /**
     * Service instance
     * @return App|static
     */
    public static function instance() {
        if( self::$instance === null ) {
            self::$instance = new App;
        }

        return self::$instance;
    }


    /**
     * Load services
     */
    private function loadServices(): void {
        $this->services = [
            deferScripts::class => new deferScripts(),
            removeScripts::class => new removeScripts(),
        ];
    }

    /**
     * GET app services
     * @return array
     */
    public function getServices(): array {
        return $this->services;
    }
}
