<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    public function createProductAction()
    {
      $user = new User();
      $user->setName('Titi');

      $product = new Product();
      $product->setName('Keyboard');
      $product->setPrice(19.99);
      $product->setDescription('Ergonomic and stylish!');

      $product->setUser($user);

      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->persist($products);
      $em->flush();

      return new Response(
          'Saved new product with id: '.$products->getId()
          .' and new user with id: '.$user->getId()
      );
    }

    public function showAction($productId)
{
    $product = $this->getDoctrine()
        ->getRepository('AppBundle:Product')
        ->findOneByIdJoinedToUser($productId);

    $user = $product->getUser();

    // ...
}

public function showProductsAction($userId)
{
    $user = $this->getDoctrine()
        ->getRepository('AppBundle:User')
        ->find($userId);

    $products = $user->getProducts();

    $product = $this->getDoctrine()
        ->getRepository('AppBundle:Product')
        ->find($productId);

    $user = $product->getUser();

    dump(get_class($user));
    die();
}


}
