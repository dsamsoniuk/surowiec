<?php
// src/Controller/DefaultController.php
// ...
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

use App\Service\MessageGenerator;

class DefaultController extends Controller
{
    /**
     * @Route("/admin")
     */
    public function admin(MessageGenerator $messageGenerator)
    {
        $usr= $this->get('security.token_storage')->getToken()->getUser();
        // $usr->getUsername();
        $message = $messageGenerator->getHappyMessage();
        // $this->addFlash('success', $message);
       
        return new Response('<html><body>Admin page <br> Czesc, '.$usr->getUsername().'! <br> WIADOMOSC:'.$message.'</body></html>');
    }
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render(
            'default.html.twig'
        );
        // return new Response('<html><body>glowna ^/ </body></html>');
    }

}