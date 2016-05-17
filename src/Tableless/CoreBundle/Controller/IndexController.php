<?php

namespace Tableless\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController extends Controller
{
    /**
     * @Route("/")
     * @Template("TablelessCoreBundle:IndexController:index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $posts = $em->getRepository('TablelessModelBundle:Post')->findAllInOrder();

        return [
            'posts' => $posts,
        ];
    }

    /**
     * @Route("/show/{id}")
     * @Template("TablelessCoreBundle:IndexController:show.html.twig")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('TablelessModelBundle:Post')->find($id);

        if (!$post) {
            throw $this->createNotFoundException('O post não existe! Volte para home!');
        }

        return [
            'post' => $post,
        ];
    }

}
