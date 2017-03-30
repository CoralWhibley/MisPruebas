<?php
// src/UsersBundle/Form/UserType.php
 
namespace UsersBundle\Form;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
 
class UserType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('username', TextType::class, array('label' => 'Usuario: '));
        $builder->add('password', PasswordType::class, array('label' => 'Contraseña: '));
        $builder->add('email', EmailType::class, array('label' => 'E-mail: '));
        $builder->add('fechaNacimiento', BirthdayType::class, array('label' => 'Fecha de nacimiento: '));
        $builder->add('save', SubmitType::class);
    }
 
    public function getName(){
        return 'usuarios';
    }
}
?>