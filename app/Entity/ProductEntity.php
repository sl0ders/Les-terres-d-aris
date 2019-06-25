<?php


namespace App\Entity;


class ProductEntity extends Entity
{
    public function getUrlFront()
    {
        return 'index.php?p=Products.show&id=' . $this->id;
    }
    public function getUrlAdmin()
    {
        return 'index.php?p=Admin.Products.show&id=' . $this->id;
    }

    public function getUrlAdd()
    {
        return 'index.php?p=cart.add&id='. $this->id;
    }

    public function getUrlSup()
    {
        return 'index.php?p=cart.delete&id='. $this->id;
    }

    public function getExtract()
    {
        $html = '<p>' . substr($this->description, 0, 200) . '...</p>';
        $html .= '<p><a href="' . $this->getUrlFront() . '">voir la suite</a></p>';
        return $html;
    }
}