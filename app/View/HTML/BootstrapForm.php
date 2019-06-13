<?php

namespace App\View\HTML;

class BootstrapForm extends Form
{
    /**
     * @param $html string Code HTML a entourer
     * @param $icon
     * @return string
     */
    protected function surround($html)
    {
        return "<div class='md-form'>{$html}</div>";
    }

    /**
     * @param $name string
     * @param $label
     * @param $logo
     * @param array $options
     * @return string
     */
    public function input($name, $label, $logo, $options = [])
    {
        $type = isset($options['type']) ? $options = ['type'] : 'text';
        $logo = '<i class="fas fa-' . $logo . ' prefix"></i>';
        $input = '<input type="' . $type . '" name="' . $name . '" value= "' . $this->getValue($name) . '"id="orangeForm-' . $name . '" class="form-control">';
        $label = '<label for="orangeForm-' . $name . '">' . $label . '</label>';
        return $this->surround($logo . $input . $label);
    }

    public function textarea($name, $label, $id)
    {
        return $this->surround(
            '<label>' . $label . ' </label ><textarea style="padding: 20px" cols="12" rows="12" id="' . $id . '" name = "' . $name . '" class = "form-control">' . $this->getValue($name) . '</textarea>');
    }

    public function password($name, $label, $logo)
    {
        $logo = '<i class="fas fa-' . $logo . ' prefix"></i>';
        $input = '<input type = "password" name ="' . $name . '" id="orangeForm-' . $name . '" value = "' . $this->getValue($name) . '" class = "form-control" > ';
        $label = '<label for="orangeForm-' . $name . '">' . $label . '</label >';
        return $this->surround($logo . $input . $label);
    }

    public function checkbox($label, $name)
    {
        return $this->surround(
            '<div class="custom-control custom-checkbox"><input name = "' . $name . '" type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">' . $label . '</label>
                </div>'
        );
    }

    public function number($label, $name)
    {
        return $this->surround(
            '<label>' . $label . '</label ><div class="col-1"><input type="text" name = "' . $name . '" class="form-control form-control-sm bfh-number""></div>');
    }

    /**
     * @return string
     */
    public function submit()
    {
        return $this->surround('<button type = "submit" class = "btn btn-primary" > Envoyer</button > ');
    }

    public function select($name, $label, $option)
    {
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach ($option as $k => $v) {
            $attributes = '';
            if ($k == $this->getValue($name)) {
                $attributes = ' selected';
            }
            $input .= "<option value='$k' $attributes >$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    public function redButton($name)
    {
        return '<span class="table-remove">
              <input type="button" name="' . $name . '" value="' . $this->getValue($name) . '" class="btn btn-danger btn-rounded btn-sm my-0">
              </span>';
    }
}
