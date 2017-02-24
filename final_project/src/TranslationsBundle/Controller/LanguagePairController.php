<?php

namespace TranslationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TranslationsBundle\Entity\LanguagePair;
use TranslationsBundle\Form\LanguagePairType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class LanguagePairController extends Controller
{
     /**
     * @Route("/newLanguagePair")
     */
    public function newAction(Request $request)
    {
        $languagePair = new LanguagePair();
        $form = $this->createForm(LanguagePairType::class,$languagePair);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $languagePair = $form->getData();
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($languagePair);
            $em->flush();
            
//            return $this->redirectToRoute('translations_client_show', ['id' => $languagePair->getId()]);
        }
        return $this->render('TranslationsBundle:LanguagePair:new.html.twig', array( 'form' => $form->createView()
        
        ));
    }
    
    /**
     * @Route("/showAllLanguagePairs")
     */
    public function showAllAction()
    {
        $languagePairs = $this->getDoctrine()->getRepository('TranslationsBundle:LanguagePair')->findAll();
        return $this->render('TranslationsBundle:LanguagePair:showAll.html.twig', array(
            'languagePairs'=>$languagePairs
        ));
    }
}
