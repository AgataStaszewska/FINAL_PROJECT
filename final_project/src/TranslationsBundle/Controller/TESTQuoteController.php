<?php

namespace TranslationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use TranslationsBundle\Entity\LanguagePair;
use TranslationsBundle\Form\LanguagePairType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TESTQuoteController extends Controller{
    /**
     * @Route("/quote2")
     * @param Request $request
     */
    
    public function quoteAction(Request $request){
        
        $form = $this->createFormBuilder()
        ->add('File', FileType::class, array('label'=>'Document (DOCX file)'))
        ->add('field', EntityType::class, array('choice_label'=> 'field', 'class' => 'TranslationsBundle:Field', 'multiple' => false, 'expanded' => true)) 
        ->add('languagePairs', EntityType::class, array('choice_label'=> 'languagePair', 'class' => 'TranslationsBundle:LanguagePair', 'multiple' => false, 'expanded' => true))        
        ->add('quote', SubmitType::class, array('attr'=>array('class'=>'quote')))
        ->getForm();
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData();
                
                $dir = "QUOTES";
                $file = $form['File']->getData();
                $fileName = $file->getClientOriginalName();
                var_dump($fileName);
//                $file->move($dir, $fileName);
                $file->move($this->getParameter('QUOTES'), $fileName);

                

        $response = new Response;
        return $response;
        
        }

        return $this->render('TranslationsBundle:Quote:quote2.html.twig', array('form' => $form->createView()
    ));
}

}