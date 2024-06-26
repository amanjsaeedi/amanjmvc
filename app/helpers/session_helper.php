<?php
session_start();

// Flash message Helper
// Example - flash('register_success','You are now registered','alert alert-danger');
// Display in view - echo flash('register_success');
function flash($name = '', $message = "", $class = 'alert alert-success')
{
    if (!empty($name)) {
        //set new session
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION['name'])) {
                unset($_SESSION['name']);
            }
            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } // use existing session
        elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}


function isLoggedIn()
{
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}