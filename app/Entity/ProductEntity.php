<?php


namespace App\Entity;


class ProductEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=products.show&id=' . $this->id;
    }

    public function getExtract()
    {
        $html = '<p>' . substr($this->content, 0, 200) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">voir la suite</a></p>';
        return $html;
    }
}