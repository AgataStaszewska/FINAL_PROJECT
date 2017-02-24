<?php

namespace TranslationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TranslationsBundle\Entity\Translator;
use TranslationsBundle\Entity\LanguagePair;
use TranslationsBundle\Form\TranslatorType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class TranslatorController extends Controller
{
    /**
     * @Route("/newTranslator")
     */
    public function newAction(Request $request)
    {
        $translator = new Translator();
        $form = $this->createForm(TranslatorType::class,$translator);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $translator = $form->getData();
            $em = $this->getDoctrine()->getManager();
            foreach($translator->getLanguagePairs() as $languagePair){
                
             $languagePair->addTranslator($translator);
             $em->persist($languagePair);
            }
            $em->persist($translator);
            $em->flush();
            
            return $this->redirectToRoute('translations_translator_show', ['id' => $translator->getId()]);
        }
        return $this->render('TranslationsBundle:Translator:new.html.twig', array( 'form' => $form->createView()
        
        ));
    }
    
    /**
     * @Route("/showTranslator/{id}")
     */
    public function showAction(Translator $translator)
    {
        return $this->render('TranslationsBundle:Translator:show.html.twig', array(
            'translator'=>$translator   
        ));
    }
    
    /**
     * @Route("/showAllTranslators")
     */
    public function showAllAction()
    {
        $translators = $this->getDoctrine()->getRepository('TranslationsBundle:Translator')->findAll();
        return $this->render('TranslationsBundle:Translator:showAll.html.twig', array(
            'translators'=>$translators
        ));
    }
    
    /**
     * @Route("/modifyTranslator/{id}")
     */
    public function modifyAction(Request $request, Translator $translator)
    {

        $form = $this->createForm(TranslatorType::class,$translator);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $client = $form->getData();
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            
            return $this->redirectToRoute('translations_translator_show', ['id' => $translator->getId()]); 
        }
       
        return $this->render('TranslationsBundle:Translator:modify.html.twig', array(
           'form'=>$form->createView()
        ));
    }
    
}
