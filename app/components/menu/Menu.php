<?php

namespace app\components\menu;

use app\lib\Db;

/**
 * Menu widget
 *
 * @author Alexander Dashko <leksdashko@gmail.com>
 */
class Menu {
    
    private $tree;
    private $db;
    private $tpl = 'menulist';
    
    public function __construct($menuType){
        $this->tpl = $menuType;
        $this->db = new Db();
    }
    
    /**
     * Get menu html structure
     * 
     * @return type
     */
    public function run(){
        $sql = 'SELECT c.categories_id AS categories_id, c.parent_id AS parent_id, count(*) AS count_goods
                FROM products_to_categories AS p 
                INNER JOIN categories c ON p.categories_id = c.categories_id 
                GROUP BY p.categories_id 
                ORDER BY c.categories_id';
        $categories = $this->db->query($sql)->fetchAll();
        $this->tree = $this->getTree($this->sortAsUniq($categories));
        $menuHtml = $this->getMenuHtml($this->tree);
        return $menuHtml;
    }
    
    /**
     * Create tree from category list
     * 
     * @param type $data
     * @return type
     */
    private function getTree($data){
        $tree = [];
        foreach ($data as $id => &$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $data[$node['parent_id']]['childs'][$node['categories_id']] = &$node;
        }
        return $tree;
    }
    
    public function sortAsUniq($array){
        $tree = [];
        foreach ($array as $node) {
            $tree[$node['categories_id']] = $node;
        }
        return $tree;
    }
    
    public function getMenuHtml($tree){
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }
    
    public function catToTemplate($category){
        ob_start();
        require __DIR__ . '/' . $this->tpl . '.php';
        return ob_get_clean();
    }
    
}
