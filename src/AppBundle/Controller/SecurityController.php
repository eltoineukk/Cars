<?php

namespace AppBundle\Controller;



use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
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
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            if($user->getPassword() !== $user->getRPassword())
            {
                return $this->render('security/register.html.twig', array('error' => "The passwords dont match!"));
            }
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());

            $user->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute("security_login");
        }
        return $this->render("security/register.html.twig");
    }

    /**
     * @Route("/forgot/password", name="forgot_password_page")
     */
    public function forgotPassword(Request $request)
    {
        return $this->render('security/forgotPassword.html.twig');
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {

    }
}