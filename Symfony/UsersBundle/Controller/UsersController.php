<?php

namespace UsersBundle\Controller;

use UsersBundle\Form\UserType;
use UsersBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;


class UsersController extends Controller{

	public function listAction(){
		$em = $this->getDoctrine()->getManager();
        $ds = $em->getRepository("UsersBundle:Usuario");
        $rg = $ds->findAll();
        return $this->render('UsersBundle:Users:list.html.twig', array('rg' => $rg));
        die();
	}


	public function showAction($id){
		$em = $this->getDoctrine()->getEntityManager();
        $ds = $em->getRepository("UsersBundle:Usuario");
        $rg = $ds->find($id);
        if($rg==null){
        	$this->addFlash('error', "NO EXISTE.");
	            return $this->redirectToRoute('user_list');
        }
        $rg = $ds->findBy(array('id_user' => $id));
        return $this->render('UsersBundle:Users:show.html.twig', array('rg' => $rg));
        die();
	}


	public function createAction(Request $request){
		$usuario = new Usuario();
        $form = $this->createForm(UserType::class, $usuario);
 
    	$form->handleRequest($request);
 
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($usuario);
    		$flush=$em->flush();
    		 if ($flush == null) {
	        	$this->addFlash('success', "Usuario creado correctamente.");
	            return $this->redirectToRoute('user_list');
	        } else {
	        	$this->addFlash('error', "Imposible crear el usuario.");
	            return $this->redirectToRoute('user_list');
	        }
    	}
        return $this->render('UsersBundle:Users:create.html.twig', array('form' => $form->createView(), 'titulo'=>'Crear usuario.'));
	}


	public function editAction(Request $request, $id){
		$em = $this->getDoctrine()->getEntityManager();
        $ds = $em->getRepository("UsersBundle:Usuario");
        $rg = $ds->find($id);
        if($rg==null){
        	$this->addFlash('error', "NO EXISTE.");
	            return $this->redirectToRoute('user_list');
        }
        $form = $this->createForm(UserType::class, $rg);
    	$form->handleRequest($request);

    	if($form->isValid()){
	        $rg->setUsername($rg->getUsername());
	        $rg->setPassword($rg->getPassword());
            $rg->setEmail($rg->getEmail());
            $rg->setFechaNacimiento($rg->getFechaNacimiento());
	        $em->persist($rg);
	 
	       
	        $flush = $em->flush();
	        if ($flush == null) {
	        	$this->addFlash('success', "Usuario actualizado correctamente.");
	            return $this->redirectToRoute('user_list');
	        } else {
	        	$this->addFlash('error', "Imposible actualizar el usuario.");
	            return $this->redirectToRoute('user_list');
	        }
        	die();
    	}
    	return $this->render('UsersBundle:Users:create.html.twig', array('form'=>$form->createView(), 'titulo'=>'Editar usuario.'));
	}


	public function deleteAction($id){
		$em = $this->getDoctrine()->getEntityManager();
        $ds = $em->getRepository("UsersBundle:Usuario");
        $rg = $ds->find($id);
        if($rg==null){
        	$this->addFlash('error', "NO EXISTE.");
	            return $this->redirectToRoute('user_list');
        }
        $em->remove($rg);
        $flush=$em->flush();
         $flush = $em->flush();
        if ($flush == null) {
        	$this->addFlash('success', "Usuario borrado correctamente.");
            return $this->redirectToRoute('user_list');
        } else {
        	$this->addFlash('error', "Imposible borrar el usuario.");
            return $this->redirectToRoute('user_list');
        }
    	die();
	}

}