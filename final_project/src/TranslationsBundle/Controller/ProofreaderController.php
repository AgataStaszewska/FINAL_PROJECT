<?php

namespace TranslationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TranslationsBundle\Entity\Proofreader;
use TranslationsBundle\Entity\LanguagePair;
use TranslationsBundle\Form\ProofreaderType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ProofreaderController extends Controller
{
     /**
     * @Route("/newProofreader")
     */
    public function newAction(Request $request)
    {
        $proofreader = new Proofreader();
        $form = $this->createForm(ProofreaderType::class,$proofreader);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $proofreader = $form->getData();
            $em = $this->getDoctrine()->getManager();
            foreach($proofreader->getLanguagePairs() as $languagePair){
                
             $languagePair->addProofreader($proofreader);
             $em->persist($languagePair);
            }
            $em->persist($proofreader);
            $em->flush();
            
            return $this->redirectToRoute('translations_proofreader_show', ['id' => $proofreader->getId()]);
        }
        return $this->render('TranslationsBundle:Proofreader:new.html.twig', array( 'form' => $form->createView()
        
        ));
    }
    
    /**
     * @Route("/showProofreader/{id}")
     */
    public function showAction(Proofreader $proofreader)
    {
        return $this->render('TranslationsBundle:Proofreader:show.html.twig', array(
            'proofreader'=>$proofreader   
        ));
    }
    
    /**
     * @Route("/showAllProofreaders")
     */
    public function showAllAction()
    {
        $proofreaders = $this->getDoctrine()->getRepository('TranslationsBundle:Proofreader')->findAll();
        return $this->render('TranslationsBundle:Proofreader:showAll.html.twig', array(
            'proofreaders'=>$proofreaders
        ));
    }
    
    /**
     * @Route("/modifyProofreader/{id}")
     */
    public function modifyAction(Request $request, Proofreader $proofreader)
    {

        $form = $this->createForm(ProofreaderType::class,$proofreader);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $client = $form->getData();
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            
            return $this->redirectToRoute('translations_proofreader_show', ['id' => $proofreader->getId()]); 
        }
       
        return $this->render('TranslationsBundle:Proofreader:modify.html.twig', array(
           'form'=>$form->createView()
        ));
    }
}
