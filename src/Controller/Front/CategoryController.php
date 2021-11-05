<?php
namespace App\Controller\Front;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/front/categorys", name="front_list_category")
    */
    public function adminCategorys(CategoryRepository $categoryRepository)
    {
        $categorys=$categoryRepository->findAll();
        return $this->render('front/categorys.html.twig', ['categorys'=>$categorys]);
    }

    /**
     * @Route("/front/category/{id}", name="front_show_category")
    */
    public function showCategoy($id, CategoryRepository $categoryRepository)
    {
        $category=$categoryRepository->find($id);
        return $this->render('front/category.html.twig', ['category'=>$category]);
    }
}