<?php

class Session
{

    public static function alert($name, $text = null, $class = null)
    {
        if (!empty($name)) {

            if (!empty($text) && empty($_SESSION[$name])) {
                if (!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
                $_SESSION[$name] = $text;
                $_SESSION[$name . 'class'] = $class;
            } elseif (!empty($_SESSION[$name]) && empty($text)) {
                $class = !empty($_SESSION[$name . 'class']) ? $_SESSION[$name . 'class'] : 'alert alert-dismissible alert-success';
                echo '<div class="' . $class . '">' . $_SESSION[$name] . '</div>';

                unset($_SESSION[$name]);
                unset($_SESSION[$name . 'class']);
            }
        }
    }

    public static function beLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function beLoggedInAdmin()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

}
