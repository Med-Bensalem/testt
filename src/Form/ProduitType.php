<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prix')


            ->add('category',EntityType::class,['class' => Category::class,
                'choice_label' => 'titre',
                'label' => 'Catégorie',])

            ->add('photo',FileType::class, [
                'attr'=>['class'=>'form-control form-control-sm'],
                'label'=> '',
                'data_class' => null,
                'required' => true])
            ->add('description')
            ->add('quantite',IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
