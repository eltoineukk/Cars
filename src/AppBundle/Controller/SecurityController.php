<?php

namespace AppBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login_page")
     */
    public function login(Request $request)
    {
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/register", name="register_page")
     */
    public function register(Request $request)
    {
        return $this->render('security/register.html.twig');
    }

    /**
     * @Route("/forgot/password", name="forgot_password_page")
     */
    public function forgotPassword(Request $request)
    {
        return $this->render('security/forgotPassword.html.twig');
    }
}