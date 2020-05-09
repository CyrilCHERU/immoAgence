<?php
namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PropertyController extends AbstractController
{
	/**
	 * @Route("/biens", name="property_index")
	 *
	 * @return Response
	 */
	public function index(PropertyRepository $repo) :Response
	{
		$properties = $repo->findAllVisible();
			
		return $this->render('property/index.html.twig', [
			'current_menu' => 'properties',
			'properties' => $properties
		]);
	}
	
	/**
	 * @Route("/biens/{slug}-{id</+d>}", name="property_show")
	 *
	 * @return Response
	 */
	public function show($slug, $id, PropertyRepository $repo) :Response
	{
		$property = $repo->find($id);
		return $this->render('property/show.html.twig', [
			'current_menu' => 'properties',
			'property' => $property
		]);
	}
}