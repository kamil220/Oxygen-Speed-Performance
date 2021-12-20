<?php

namespace OSP\Services;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class removeScripts
{
    /**
     * Scripts to deferring
     * @var array
     */
    private array $scripts = [
        'wp-block-library',
        'wp-block-library-theme',
        'wc-block-style',
    ];

    /**
     * deferScripts constructor.
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'remove' ], 100 );
    }

    /**
     * Remove unused scripts
     */
    public function remove() {

        if( !$this->scripts ) {
            return;
        }

        foreach( $this->scripts as $handle ) {
            wp_dequeue_style( $handle );
        }
    }
}
