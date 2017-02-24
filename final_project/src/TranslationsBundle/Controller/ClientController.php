<?php

namespace TranslationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TranslationsBundle\Entity\Client;
use TranslationsBundle\Form\ClientType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends Controller
{
    /**
     * @Route("/newClient")
     */
    public function newAction(Request $request)
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class,$client);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $client = $form->getData();
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            
            return $this->redirectToRoute('translations_client_show', ['id' => $client->getId()]);
        }
        return $this->render('TranslationsBundle:Client:new.html.twig', array( 'form' => $form->createView()
        
        ));
    }
    
    /**
     * @Route("/show/{id}")
     */
    public function showAction(Client $client)
    {
        return $this->render('TranslationsBundle:Client:show.html.twig', array(
            'client'=>$client   
        ));
    }
    
    /**
     * @Route("/showAll")
     */
    public function showAllAction()
    {
        $clients = $this->getDoctrine()->getRepository('TranslationsBundle:Client')->findAll();
        return $this->render('TranslationsBundle:Client:showAll.html.twig', array(
            'clients'=>$clients
        ));
    }
    
    /**
     * @Route("/modify/{id}")
     */
    public function modifyAction(Request $request, Client $client)
    {

        $form = $this->createForm(ClientType::class,$client);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $client = $form->getData();
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            
            return $this->redirectToRoute('translations_client_show', ['id' => $client->getId()]); //tu dwa returny, bo jeden się wykonuje, jak wejdzie w ifa, a drugi, jak nie wejdzie
        }
       
        return $this->render('TranslationsBundle:Client:modify.html.twig', array(
           'form'=>$form->createView()
        ));
    }
}
