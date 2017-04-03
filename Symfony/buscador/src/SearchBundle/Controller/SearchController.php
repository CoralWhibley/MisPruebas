<?php

namespace SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use SearchBundle\Form\SearchType;
use SearchBundle\Entity\Search;

class SearchController extends Controller{

	public function youtubeAction(Request $request){
        $url = new Search();
    	$form = $this->createForm(SearchType::class, $url);
    	$form->handleRequest($request);

    	if($form->isValid()){

    	}

        return $this->render('SearchBundle:Search:search.html.twig', array('form' => $form->createView()));
    }   
}
?>