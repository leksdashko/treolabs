<?php

namespace app\components\menu;

use app\lib\Db;

/**
 * Description of menu
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
    
    public function run(){
        $categories = $this->db->row('SELECT * FROM categories ORDER BY categories_id');
        $this->tree = $this->getTree($this->sortAsUniq($categories));
        $menuHtml = $this->getMenuHtml($this->tree);
        return $menuHtml;
    }
    
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
