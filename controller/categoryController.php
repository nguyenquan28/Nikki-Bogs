<?php
require __DIR__ . '/../model/categories.php';

class categoryController
{

    // Get all categories
    function getAll()
    {
        Session::unset('catResults');
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $category = new categoryModel();
        $data = $category->getAll($offset, $no_of_records_per_page);
        $total_pages = $category->paginasion($no_of_records_per_page);

        require_once __DIR__ . '../../views/admin/category.php';
    }

    // Edit status categories
    function editStatus()
    {
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

    // Delete categories
    function delCat()
    {
        $id = $_GET['id'];

        $category = new categoryModel();
        $category->delete($id);

        header('location: index.php?c=category');
    }

    // Detail categories
    function detailcategory()
    {
        $id = $_GET['id'];

        $category = new categoryModel();
        $data = $category->searchByID($id);
        $result = $data->fetch_assoc();

        require_once __DIR__ . '../../views/admin/detailcategory.php';
    }

    // navigation to page new category
    function newCat()
    {
        require_once __DIR__ . '../../views/admin/newCat.php';
    }

    // Save category
    function saveCat()
    {

        if (!empty($_POST['name']) && !empty($_POST['tags']) && !empty($_POST['des'])) {
            Session::unset('CatErr');
            $category_id = (($_GET['p']) != 'edit') ? '' : $_POST['categories_id'];
            $name = $_POST['name'];
            $tags = $_POST['tags'];
            $des = $_POST['des'];
            $slug = $_POST['name'];
            $active = 0;
            $cat = new category($category_id, $name, $tags, $des, $slug, $active);

            // var_dump($cat);
            $catModel = new categoryModel();
            if(($_GET['p']) == 'edit'){
                $catModel->edit($cat);
            }else{
                $catModel->insert($cat);
            }
            header('location: index.php?c=category');
        } else {
            Session::set('CatErr', 'Input not empty!');
            header('location: index.php?c=category&a=newCat');
        }

    }

    // Search all
    function search(){
        $catModel = new categoryModel();
        if (isset($_POST["input"])) {
            $search = str_replace(", ", "|", $_POST["input"]);
            $data = $catModel->search($search);
            if(empty($data)){
                Session::unset('catResults');
                Session::set('catSearchErr', 'No results for ' . $_POST["input"]);
                header('location: index.php?c=category');
            }else{
                Session::unset('catSearchErr');
                Session::set('catResults', 'Results for ' . $_POST["input"]);
                require_once __DIR__ . '../../views/admin/category.php'; 
            }
        } else {
            Session::set('catSearchErr', 'No results for ' . $_POST["input"]);
            header('location: index.php?c=category');
        }
    }

    // Edit category
        function edit(){
            $id = $_GET['id'];
            // $catEdit = new Category();
            $catModel = new categoryModel();
            $cat = $catModel->searchByID($id)->fetch_assoc();
            print_r($cat);
            require_once __DIR__ . '../../views/admin/newCat.php';

        }
}
