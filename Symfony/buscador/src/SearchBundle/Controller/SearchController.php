<?php

namespace SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller{
    public function youtubeAction(){
        return new Response("Buscador videos de YT.");
    }
}