<?php

if (! function_exists('displayNotification')) {
    /**
     * Creates HTML & Bootstrap formatted notification box from session data.
     *
     * Looks for "notification" using Laravel's Session facade in the format "{type}|{message content}".
     * {type} can be either "success", "info", "warning", or "danger"; your choice will affect how the alert will appear
     * to the user.
     *
     * Example:
     * Laravel redirect: redirect("/")->with("notification", "alert|Your form failed to submit");
     * Show notification in view: {{!! displayNotification() !!}}
     *
     * @return string HTML formatted alert
     */
    function displayNotification()
    {
        if (\Illuminate\Support\Facades\Session::has("notification")) {
            list($type, $message) = explode('|', \Illuminate\Support\Facades\Session::get("notification"), 2);

            return sprintf('<div class="alert alert-%s">%s</div>', $type, $message);
        }

        return "";
    }
}

if (! function_exists('cleanUsername')) {
    /**
     * Converts to lowercase, trims whitespace, and converts a potential email address to a username by removing anything
     * that comes after an @ symbol.
     *
     * @param string $username
     * @return string
     */
    function cleanUsername($username)
    {
        $usernameArr = explode('@', $username);

        return trim(strtolower($usernameArr[0]));
    }
}