<?php
// src/SearchBundle/Form/InfUrlType.php
 
namespace SearchBundle\Form;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
 
class SearchType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('search', TextType::class, array('label' => 'Vídeo: '));
        $builder->add('save', SubmitType::class);
    }
 
    public function getName(){
        return 'SearchType';
    }
}
?>