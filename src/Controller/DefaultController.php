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

        $message = $messageGenerator->getHappyMessage();
        // $this->addFlash('success', $message);
        return new Response('<html><body>Admin page WIADOMOSC:'.$message.'</body></html>');
    }
    /**
     * @Route("/")
     */
    public function index()
    {
        return new Response('<html><body>glowna ^/ </body></html>');
    }

}