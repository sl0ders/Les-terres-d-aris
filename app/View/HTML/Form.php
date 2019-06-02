<?php

namespace App\View\HTML;

class Form
{

    private $data;
    public $surround = 'p';

    public function __construct($data = array())
    {
        $this->data = $data;
    }

    private function surround($html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    protected function getValue($index)
    {
        if (is_object($this->data)) {
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
     * @param $name
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $logo, $options = [])
    {
        $type = isset($options['type']) ? $options = ['type'] : 'text';
        return $this->surround('<input type="' . $type . '" name ="' . $name . '" value="' . $this->getValue($name) . '">');
    }

    public function submit()
    {
        return $this->surround('<button type="submit">envoyer</button>');
    }
}
;