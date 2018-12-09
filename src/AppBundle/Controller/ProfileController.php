<?php
namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Entity\UserProfileVisit;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends Controller
{
    /**
     * @Route("profile", name="your_profile")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function yourProfile()
    {
        return $this->render("profile/yourProfile.html.twig", array('user' => $this->getUser()));
    }

    /**
     * @Route("profile/{id}", name="profile")
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profile($id, Request $request)
    {
        $userIp = $request->getClientIp();
        $repo = $this->getDoctrine()->getRepository(UserProfileVisit::class);
        /** @var User $user */
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        if($repo->findOneBy(['visitorIp' => $userIp, 'userId' => $id]))
        {
            return $this->render("profile/profile.html.twig", array('user' => $user));
        }
        else
        {
            $userVisit = new UserProfileVisit();
            $userVisit->setVisitorIp($userIp);
            $userVisit->setUser($user);
            $userVisit->setUserId($id);
            $user->setFame($user->getFame() + 5);
            $user->setMoney($user->getMoney() + 1);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->persist($userVisit);
            $em->flush();
            return $this->render("profile/profile.html.twig", array('user' => $user, 'message' => "You gave " . $user->getUsername() . " 5 fame and 1$"));
        }
    }
}