<?php

namespace TranslationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TranslationsBundle\Entity\Field;
use TranslationsBundle\Form\FieldType;
use Symfony\Component\HttpFoundation\Request;

class FieldController extends Controller
{
    /**
     * @Route("/addField")
     */

    public function addFieldAction(Request $request)
    {
        $field = new Field();
        $form = $this->createForm(FieldType::class,$field);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $field = $form->getData();
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($field);
            $em->flush();
            
//            return $this->redirectToRoute('translations_client_show', ['id' => $languagePair->getId()]);
        }
        return $this->render('TranslationsBundle:Field:add_field.html.twig', array( 'form' => $form->createView()
        
        ));
    }

    /**
     * @Route("/deleteField")
     */
    public function deleteFieldAction()
    {
        return $this->render('TranslationsBundle:Field:delete_field.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/showAllFields")
     */
    public function showAllFieldsAction()
    {
        return $this->render('TranslationsBundle:Field:show_all_fields.html.twig', array(
            // ...
        ));
    }

}
