<?php
namespace App\Controller\Admin;
use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @Route("/admin/create/product", name="create_product")
    */
    public function createProduct(EntityManagerInterface $entityManagerInterface,  Request $request)
    {
        $product=new Product();
       
        $productForm=$this->createForm(ProductType::class, $product);
        $productForm->handleRequest($request);
        if($productForm->isSubmitted()&& $productForm->isValid()){
            $entityManagerInterface->persist($product);
            $entityManagerInterface->flush();
            return $this->redirectToRoute('admin_show_product',['id' => $product->getId()]);
        }
        return $this->render('admin/createProduct.html.twig', ['productForm'=>$productForm->createView()]);

    }

    /**
     * @Route("/admin/update/product/{id}", name="update_product")
    */
    public Function updateProduct($id,EntityManagerInterface $entityManagerInterface, ProductRepository $productRepository, Request $request)
    {
        $product=$productRepository->find($id);
        $productForm=$this->createForm(ProductType::class, $product);
        $productForm->handleRequest($request);
        if($productForm->isSubmitted()&& $productForm->isValid()){
            $entityManagerInterface->persist($product);
            $entityManagerInterface->flush();
            return $this->redirectToRoute('admin_show_product',['id' => $product->getId()]);
        }
        return $this->render('admin/updateProduct.html.twig', ['productForm'=>$productForm->createView(), 'product'=>$product]);

    }

    /**
     * @Route("/admin/delete/product/{id}", name="delete_product")
    */
    public function deleteProduct($id,EntityManagerInterface $entityManagerInterface, ProductRepository $productRepository)
    {
        $product=$productRepository->find($id);
        $entityManagerInterface->remove($product);
        $entityManagerInterface->flush();
        return $this->redirectToRoute('admin_product_list');
    }
}