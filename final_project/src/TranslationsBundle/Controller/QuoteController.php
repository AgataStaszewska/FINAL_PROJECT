<?php

namespace TranslationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use TranslationsBundle\Entity\LanguagePair;
use TranslationsBundle\Form\LanguagePairType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class QuoteController extends Controller{
    /**
     * @Route("/quote")
     * @param Request $request
     */
    
    public function evaluateAction(Request $request)
{
       
    $file = array('file' => 'Prepare a quote');
    $form = $this->createFormBuilder($file)
        ->add('File', FileType::class)
        ->add('languagePairs', EntityType::class, array('choice_label'=> 'languagePair', 'class' => 'TranslationsBundle:LanguagePair', 'multiple' => false, 'expanded' => true))
        ->add('field', EntityType::class, array('choice_label'=> 'field', 'class' => 'TranslationsBundle:Field', 'multiple' => false, 'expanded' => true))    
        ->add('send', SubmitType::class)
        ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // data is an array with "name", "email", and "message" keys
        $data = $form->getData();
        return $data;
    }

    return $this->render('TranslationsBundle:Quote:quote.html.twig', array('form' => $form->createView()
    ));// ... render the form
}
    
}
