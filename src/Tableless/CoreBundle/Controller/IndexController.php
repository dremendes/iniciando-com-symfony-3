<?php

namespace Tableless\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template("TablelessCoreBundle:IndexController:index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $posts = $em->getRepository('TablelessModelBundle:Post')->findAllInOrder();

        /** @var  $paginator */
        $paginator  = $this->get('knp_paginator');
        $request = Request::createFromGlobals();
        $pagination = $paginator->paginate($posts, $request->query->get('page', 1), 3);

        return [
            'pagination' => $pagination,
        ];
    }

    /**
     * @Route("/show/{slug}", name="show")
     * @Template("TablelessCoreBundle:IndexController:show.html.twig")
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('TablelessModelBundle:Post')->findOneBy([
            'slug' => $slug
        ]);

        if (!$post) {
            throw $this->createNotFoundException('O post não existe! Volte para home!');
        }

        return [
            'post' => $post,
        ];
    }

}
