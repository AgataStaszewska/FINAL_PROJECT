<?php

namespace TranslationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TranslationsBundle\Entity\Project;
use TranslationsBundle\Form\ProjectType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProjectController extends Controller
{
    private function determineLength(UploadedFile $uploadedFile){ //to jeszcze nie działa 
        $exploded = explode('.', $uploadedFile);
        $extension = end($exploded);
    
    
        if($extension == 'docx'){
            $dataFile = "word/document.xml";

        }else{
            $dataFile = "content.xml"; }    

        $zip = new ZipArchive;

        if (true === $zip->open($uploadedFile)) {
        
        if (($index = $zip->locateName($dataFile)) !== false) { 
            $text = $zip->getFromIndex($index);
            $xml = new DOMDocument;
            $xml->loadXML($text, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
            $extracted = strip_tags($xml->saveXML());
            $length = strlen($extracted);
            return $length;
        }
        $zip->close();
    }
        return "File not found";
    }
        
    /**
     * @Route("/home")
     */  
    public function showHome(){
    
    return $this->render('TranslationsBundle:Project:home.html.twig');
    
    }

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
