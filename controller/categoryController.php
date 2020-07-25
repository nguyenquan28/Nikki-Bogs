<?php
require __DIR__ . '/../model/categories.php';

class categoryController
{

    function getAll()
    {
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $category = new categoryModel();
        $data = $category->getAll($offset, $no_of_records_per_page);
        // $total_pages = $category->pagination($no_of_records_per_page);

        require_once __DIR__ . '../../views/admin/category.php';
    }

    function editStatus(){
        $id = $_GET['id'];

        if ($_GET['status']) {
            $status = 0;
        } else {
            $status = 1;
        }

        $category = new categoryModel();
        $category->changeStt($id, $status);

        header('location: index.php?c=category');
    }

    function delCat(){
        $id = $_GET['id'];

        $category = new categoryModel();
        $category->delete($id);

        header('location: index.php?c=category');
    }

    function detailcategory(){
        $id = $_GET['id'];

        $category = new categoryModel();
        $data = $category->searchByID($id);
        $result = $data->fetch_assoc();
        
        require_once __DIR__ . '../../views/admin/detailcategory.php';
    }

    function newCat(){
        require_once __DIR__ . '../../views/admin/newCat.php';
    }

    function saveCat(){  
        $name = $_POST['name'];
        $tags = $_POST['tags'];
        $des = $_POST['des'];
        $slug = '';
        $active = '1';
        $cat = new category($name, $tags, $des, $slug, $active);

        // print_r($cat);
        $catModel = new categoryModel();
        $catModel->insert($cat);

        header('location: index.php?c=category');
    }
}