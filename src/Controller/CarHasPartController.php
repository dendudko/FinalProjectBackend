<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Part;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CarHasPartController extends AbstractController
{
    /**
     * @Route("/car_has_part")
     */
    public function show(){
        $request = Request::createFromGlobals();
        $car = $request->query->get('car');
        $priceFrom = $request->query->get('price_from');
        $priceTo = $request->query->get('price_to');
        $part = $request->query->get('part');
        
        if ($part!=''){
            $cars = $this->getDoctrine()->getRepository(Part::class)->
                findOneBy(['id' => $part])->getCarName();
            return $this->render('/car_has_part/showcars.html.twig', ['cars'=>$cars]);
        }
        else if ($car!=''){
            $parts = $this->getDoctrine()->getRepository(Car::class)->
                findOneBy(['id' => $car])->getParts();
            $partswp = array();
            foreach ($parts as $part){
            
            if ($priceFrom <= $priceTo){
                
                if ($priceFrom!=='' && $priceTo!==''){
                    if ($part->getPartPrice()>=$priceFrom && $part->getPartPrice()<=$priceTo){
                        $partswp[]=$part;
                    }
                } else if ($priceFrom!==''){
                    if ($part->getPartPrice()>=$priceFrom){
                        $partswp[]=$part;
                    }
                } else if ($priceTo!==''){
                    if ($part->getPartPrice()<=$priceTo){
                        $partswp[]=$part;
                    }
                } else {
                     $partswp[]=$part;
                }
            }
            }
            return $this->render('/car_has_part/showparts.html.twig', ['parts'=>$partswp]);  
        }
        else{
            $cars = $this->getDoctrine()->getRepository(Car::class)->findAll();
            $parts = $this->getDoctrine()->getRepository(Part::class)->findAll();
            return $this->render('/car_has_part/index.html.twig', ['cars'=>$cars,
            'parts'=>$parts]);  
        }
    
    }
}



