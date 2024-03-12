<?php
namespace App\Libraries;

use CodeIgniter\View\View;

class MyViewCell extends View
{
    public function userData()
    {
        // Fetch user data from your database or any other source
        $userData = [
            'username' => 'JohnDoe',
            'email' => 'johndoe@example.com'
            // Add more data as needed
        ];

        return $userData;
    }
}