<?php

namespace OSP\Services;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class deferScripts
{
    /**
     * Scripts to deferring
     * @var array
     */
    private array $scripts = [
        'jquery-ui-css',
        'bfa-font-awesome-css',
        'cookie-notice-front-css'
    ];

    /**
     * deferScripts constructor.
     */
    public function __construct() {
        add_filter( 'script_loader_tag', [ $this, 'defer' ], 100, 3 );
    }

    /**
     * Defer defined scripts
     * @param string $tag
     * @param string $handle
     * @param string $src
     * @return string
     */
    protected function defer( string &$tag, string $handle, string $src ): string {

        /**
         * We should not affect the backend
         */
        if( is_admin() ) {
            return $tag;
        }

        if( in_array( $handle, $this->scripts ) ) {
            $tag = str_replace( '></script>', ' defer></script>', $tag );
        }

        return $tag;
    }
}
