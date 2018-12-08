<?php
namespace AppBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HelpController extends Controller
{
    /**
     * @Route("/terms", name="terms_page")
     */
    public function termsAndConditions()
    {
        return $this->render('help/terms.html.twig');
    }
}