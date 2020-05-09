<?php
namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class HomeController
 *
 * @package App\Controller
 */
class HomeController extends AbstractController
{
	private $twig;
	
	public function __construct(Environment $twig)
	{
		$this->twig = $twig;
	}
	
	/**
	 * @Route("/", name="home")
	 *
	 * @return Response
	 */
	public function home(PropertyRepository $repo)
	{
		$properties = $repo->findLatest();
		return $this->render('pages/home.html.twig', [
			'properties' => $properties
		]);
	}
	
	/**
	 * @Route("/a_propos", name="about")
	 *
	 * @return Response
	 */
	public function about()
	{
		return $this->render('pages/about.html.twig');
	}
}