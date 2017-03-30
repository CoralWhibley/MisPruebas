<?php 
    namespace UsersBundle\Servicios;
    use Symfony\Component\HttpFoundation\Response;
    

    class Operaciones{
        function __construct(Formater $formater) {
            $this->formater=$formater;
         }
     
         function suma ($num1, $num2) {
            $suma = $num1 + $num2;
            return $this->formater->redondear($suma);

         }
    }
?>