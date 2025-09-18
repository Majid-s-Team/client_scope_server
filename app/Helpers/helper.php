<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Mail helper
 */
if (!function_exists('sendMail')) {
    function sendMail($to, $identifier, $params)
    {
        return \App\Helpers\MailHelper::sendMail($to, $identifier, $params);
    }
}

/**
 * Upload Media
 */
if (!function_exists('uploadMedia')) {
    function uploadMedia($path, $file, $resize = '')
    {
        return \App\Helpers\UploadMedia::uploadMedia($path, $file, $resize);
    }
}

if (!function_exists('optimizeImage')) {
    function optimizeImage($source_path, $destination_path, $quality = 50)
    {
        return \App\Helpers\UploadMedia::optimizeImage($source_path, $destination_path, $quality);
    }
}

if (!function_exists('uploadMediaByPath')) {
    function uploadMediaByPath($path, $file, $resize = '')
    {
        return \App\Helpers\UploadMedia::uploadMediaByPath($path, $file, $resize);
    }
}

/**
 * App Setting
 */
if (!function_exists('appSetting')) {
    function appSetting($identifier, $meta_key)
    {
        return \App\Helpers\AppSetting::getAppSetting($identifier, $meta_key);
    }
}

/**
 * User Meta
 */
if (!function_exists('userMeta')) {
    function userMeta($metaKey)
    {
        return \App\Helpers\UserMeta::userMeta($metaKey);
    }
}

/**
 * Base URL
 */
if (!function_exists('base_url')) {
    function base_url($path = '')
    {
        return !empty($path) ? config('app.url') . $path : config('app.url');
    }
}

/**
 * Get record By Slug
 */
if (!function_exists('get_status_id')) {
    function get_status_id($slug)
    {
        $record = DB::table('status')->where('slug', $slug)->first();
        return $record->id ?? 0;
    }
}

/**
 * Get Authenticated User
 */
if (!function_exists('get_user')) {
    function get_user()
    {
        $user = Auth::user();
        if (!$user) {
            return null;
        }

        $record = \App\Models\User::getUserByID($user->id);
        $record->gateway_default_card_json = json_decode($record->gateway_default_card_json);
        return $record;
    }
}

/**
 * Check user session
 */
if (!function_exists('check_user_session')) {
    function check_user_session()
    {
        return Auth::check();
    }
}
function clean_number($value) {
    if ($value === null || $value === '') {
        return null;
    }
    return (float) str_replace(['$', ','], '', $value);
}


/**
 * Logout user
 */
if (!function_exists('user_logout')) {
    function user_logout()
    {
        Auth::logout();
    }
}
