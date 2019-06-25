<?php


namespace App\Entity;


class ContactEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=Admin.contact.show&id=' . $this->id;
    }

    public function getExtract()
    {
        $html = '<p>' . substr($this->message, 0, 100) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">voir la suite</a></p>';
        return $html;
    }
}