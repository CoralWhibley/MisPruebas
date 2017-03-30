<?php 
    namespace UsersBundle\Servicios;
    use Symfony\Component\HttpFoundation\Response;
    
    class Formater{
        function __construct($decimales) {
            $this->decimal = $decimales;
         }
     
         function redondear($num){
            return round($num, $this->decimal);
         }
    }
?>