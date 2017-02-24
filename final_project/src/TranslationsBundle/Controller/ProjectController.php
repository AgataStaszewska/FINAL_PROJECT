<?php

namespace TranslationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TranslationsBundle\Entity\Project;
use TranslationsBundle\Form\ProjectType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    /**
    * @Route("/newProject")
    */
    public function newAction(Request $request)
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class,$project);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $project = $form->getData();
            $em = $this->getDoctrine()->getManager();
            foreach($project->setLanguagePair() as $languagePair){
                
             $languagePair->addProject($project);
             $em->persist($languagePair);
            }
            $em->persist($project);
            $em->flush();
            
            return $this->redirectToRoute('translations_project_show', ['id' => $project->getId()]);
        }
        return $this->render('TranslationsBundle:Project:new.html.twig', array( 'form' => $form->createView()
        
        ));
    }
    
     /**
     * @Route("/showProject/{id}")
     */
    public function showAction(Project $project)
    {
        return $this->render('TranslationsBundle:Project:show.html.twig', array(
            'project'=>$project   
        ));
    }
}
