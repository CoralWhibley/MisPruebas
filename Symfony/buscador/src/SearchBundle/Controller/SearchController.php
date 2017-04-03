<?php

namespace SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use SearchBundle\Form\SearchType;
use SearchBundle\Entity\Search;
use \Google_Client;
use \Google_Service_YouTube;

class SearchController extends Controller{

	public function youtubeAction(Request $request){
        $busqueda = new Search();
    	$form = $this->createForm(SearchType::class, $busqueda);
    	$form->handleRequest($request);

    	if($form->isValid()){
    		$client = new Google_Client();

			$client->setDeveloperKey("AIzaSyD65SvNxzMgS9DsPnZnHX_J4aPE-mZ3YTk");
			
			$service = new Google_Service_YouTube($client);

			$searchResponse = $service->search->listSearch('id,snippet', array('q' => $busqueda->getSearch(), 'maxResults' => 8,));

			foreach ($searchResponse['items'] as $searchResult) {
	            if($searchResult['id']['kind']="youtube#video"){
	                $videos[]= array("title" => $searchResult['snippet']['title'], "url_img" => $searchResult['snippet']['thumbnails']['default']['url'], "fecha" => $searchResult['snippet']['publisetAt'], "canal"=>$searchResult['snippet']['channelTitle']);
    			}
    		}
    		return $this->render('SearchBundle:Search:search.html.twig', array('form' => $form->createView(),'youtube_videos' => $videos));
       	}
        return $this->render('SearchBundle:Search:search.html.twig', array('form' => $form->createView(), 'youtube_videos'=>'false'));
    }   
}
?>