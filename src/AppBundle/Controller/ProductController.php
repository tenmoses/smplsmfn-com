<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Product;

class ProductController extends Controller
{
	/**
	 * @Route("/product")
	 */
	public function showAllAction()
	{
		$products = $this->getDoctrine()
						->getRepository('AppBundle:Product')
						->findAll();
		return $this->render('AppBundle::index.html.twig', array('products' => $products));
	}
	
}