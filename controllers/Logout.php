<?php

namespace Controllers;

use Models\User;

class Logout
{
    public function main()
    {
        session_destroy();
        header("Location:/");
        exit;
    }
}


