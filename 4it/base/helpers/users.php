<?php
use Illuminate\Support\Facades\Auth;
/**
 * @param $capability
 *
 * @return bool
 */
function current_user_can( $capability ) {
    $current_user = Auth::user();
    /**
     * @var \App\User $current_user
     */
    if ( empty( $current_user ) ) {
        return false;
    }
    $args = array_slice( func_get_args(), 1 );
    $args = array_merge( array( $capability ), $args );

    return call_user_func_array( array( $current_user, 'can' ), $args );
}

function current_user_is( $role ) {
    $current_user = Auth::user();
    /**
     * @var \App\User $current_user
     */
    if ( empty( $current_user ) ) {
        return false;
    }

    return $current_user->is( $role );
}

function current_user_id() {
    return get_current_user_id();
}

function get_current_user_id() {
    $current_user = Auth::user();
    /**
     * @var \App\User $current_user
     */
    if ( empty( $current_user ) ) {
        return false;
    }

    return $current_user->id;
}

/**
 * @return App\User | null
 */
function current_user() {
    return Auth::user();
}

/**
 * @param $key
 *
 * @return mixed|null
 */
function user_meta( $key ) {
    $args = func_get_args();
    if ( $user = current_user() ) {
        return $user->meta( ...$args );
    }

    return null;
}

function generate_random_password( $length = 12, $special_chars = true, $extra_special_chars = false ) {

    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    if ( $special_chars ) {
        $chars .= '!@#$%^&*()';
    }
    if ( $extra_special_chars ) {
        $chars .= '-_ []{}<>~`+=,.;:/?|';
    }

    $password = '';
    for ( $i = 0; $i < $length; $i ++ ) {
        $password .= substr( $chars, mt_rand( 0, strlen( $chars ) - 1 ), 1 );
    }

    /**
     * Filters the randomly-generated password.
     *
     * @since 3.0.0
     *
     * @param string $password The generated password.
     */
    return $password;
}