<?php
namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends Controller
{
    /**
     * @Route("profile", name="your_profile")
     */
    public function yourProfile()
    {
        return $this->render("profile/yourProfile.html.twig");
    }
}