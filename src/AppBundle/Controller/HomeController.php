<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\FindUserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home_page")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        if($request->getMethod() === "POST")
        {
            $player = $this->getDoctrine()->getRepository(User::class)
                ->findOneBy(['username' => $request->request->all()['playerName']]);
            return $this->redirectToRoute('profile',array('id' => $player->getId()));
        }
        return $this->render('index/index.html.twig');
    }
}
