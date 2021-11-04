<?php
namespace App\Controller\Admin;

use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    /**
     * @Route("/admin/products/", name="admin_product_list")
    */
    public function adminProducts(ProductRepository $productRepository)
    {
        $products=$productRepository->findAll();
        return $this->render('admin/products.html.twig', ['products'=>$products]);
    }

    /**
     * @Route("/admin/product/{id}", name="admin_show_product")
    */
    public Function showProduct($id, ProductRepository $productRepository)
    {
        $product=$productRepository->find($id);
        return $this->render('admin/product.html.twig', ['product'=>$product]);
    }
}