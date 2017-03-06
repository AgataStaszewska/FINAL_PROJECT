<?php

namespace TranslationsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProjectType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('projectName')
                ->add('length')
                ->add('client', EntityType::class, array('choice_label'=> 'name', 'class' => 'TranslationsBundle:Client', 'multiple' => false, 'expanded' => false))
                ->add('languagePair', EntityType::class, array('choice_label'=>'languagePair', 'class'=>'TranslationsBundle:LanguagePair'));
 
//                ->add('pathToSource')->add('pathToTranslation')->add('pathToVerified')->add('grade')->add('languagePair')->add('translator')->add('proofreader')->add('client')   
                
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TranslationsBundle\Entity\Project'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'translationsbundle_project';
    }


}
