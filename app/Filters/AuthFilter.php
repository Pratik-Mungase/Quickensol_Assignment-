<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $excludedRoutes = [
            '/',   // Login page
            '/login/register', // Registration page if available
            '/login/processRegister', // Registration page if available
            '/login/process', // Registration page if available
        ];

        $path = (!empty($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : '/';
        // Check if the route is in the excluded list
        if (in_array($path, $excludedRoutes))
            return; // Allow access without checking authentication
        if (!session()->get('isLoggedIn') or !session()->get('userId'))
            return redirect()->to('/');
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed
    }
}
