<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Product;
use AppBundle\Entity\Category;
use AppBundle\Entity\ProductComment;

class ProductController extends Controller
{
	/**
	 * @Route("/product")
	 */
	public function showAllAction()
	{
		$products = $this->getDoctrine()
						->getRepository('AppBundle:Product')
						->findAllInfo();
		return $this->render('AppBundle::product.html.twig', array('products' => $products));
	}
	
}