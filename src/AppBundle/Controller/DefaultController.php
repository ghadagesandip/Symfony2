<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/{_listProduct}", defaults={"_listProduct": "list-products"})
     */
    public function indexAction()
    {

        $products =  $this->getDoctrine()->getRepository('AppBundle:Product')->findAll();
        return $this->render('AppBundle:default:index.html.twig',array('products'=>$products));
    }


    /**
     * @Route("/create-product", name="create")
     */
    public function createAction(){
        $product = new Product();
        $product->setName('Fasttrack watch');
        $product->setprice('200.0');
        $product->setDescription('Good excellent product');

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return new Response('Created product with id '.$product->getId());
    }


    /**
     * @Route("/show-product/{id}", name="show")
     */
    public function showAction($id){

        $product = $this->getDoctrine()->getRepository('AppBundle:Product')->find($id);
        if(!$product){
            throw $this->createNotFoundException('No Product Found for id : '.$id);
        }

        return $this->render('AppBundle:default:show.html.twig',array('product'=>$product));
    }


    /**
     * @Route("/update-product/{id}", name="update")
     */
    public function updateAction( $id){
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AppBundle:Product')->find($id);

        if(!$product){
            throw $this->createNotFoundException('Product not found with id '.$id);
        }

        $product->setName('FastTrack Watch '.$id);
        $em->flush();


        $this->addFlash('notice', 'Product name update!');
        return $this->redirectToRoute('homepage');
    }






    /**
     * @Route("/delete-product/{id}", name="delete")
     */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AppBundle:Product')->find($id);

        if(!$product){
            throw $this->createNotFoundException('Product not found with id '.$id);
        }

        $em->remove($product);
        $em->flush();

        $this->addFlash('notice', 'Product removed with id '.$id);
        return $this->redirectToRoute('homepage');
    }
}
