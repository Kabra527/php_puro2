<?php

require_once "models/User.php";

define('LOGIN_VIEW', 'views/company/login.view.php');

class Login
{
    // Controlador Principal
    public function main()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (empty($_SESSION['session'])) {
                require_once LOGIN_VIEW;
            } else {
                header("Location:?c=Dashboard");
                exit;
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profile = new User(
                $_POST['user_email'],
                $_POST['user_pass']
            );

            $profile = $profile->login();

            if ($profile) {
                $active = $profile->getUserState();

                if ($active !== 0) {
                    $_SESSION['session'] = $profile->getRolName();
                    $_SESSION['profile'] = serialize($profile);
                    header("Location:?c=Dashboard");
                    exit;
                }

                $message = "El Usuario NO está activo";
                require_once LOGIN_VIEW;";
                return;
