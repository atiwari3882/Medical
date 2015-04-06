<?php

namespace Medical\MedicalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class SymptomType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', ['constraints' => [new NotBlank()]])
            ->add('condition', 'entity', [
                'class' => 'MedicalBundle:Condition',
                'property' => 'name',
                'mapped' => false,
                'empty_value' => 'Select condition'
            ])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Medical\MedicalBundle\Entity\Symptom'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'symptom';
    }
}
