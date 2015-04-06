<?php

namespace Medical\MedicalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\NotBlank;

class ConditionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', ['constraints' => [new NotBlank()]])
            ->add('symptoms', 'entity', [
                'class' => 'MedicalBundle:Symptom',
                'multiple' => true,
                'property' => 'name',
                'constraints' => [new NotBlank(), new Count(1)]
            ])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Medical\MedicalBundle\Entity\Condition'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'condition';
    }
}
