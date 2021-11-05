<?php
namespace App\Controller\Front;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ProductController extends AbstractController
{
    /**
     * @Route("/front/products/", name="front_product_list")
    */
    public function adminProducts(ProductRepository $productRepository)
    {
        $products=$productRepository->findAll();
        return $this->render('front/products.html.twig', ['products'=>$products]);
    }

    /**
     * @Route("/front/product/{id}", name="front_show_product")
    */
    public Function showProduct($id, ProductRepository $productRepository)
    {
        $product=$productRepository->find($id);
        return $this->render('front/product.html.twig', ['product'=>$product]);
    }
}