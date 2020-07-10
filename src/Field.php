<?php


namespace Adue;

use Illuminate\View\Component;

class Field extends Component
{
    /**
     * @var String
     */
    public $name;

    public function __construct(String $name)
    {
        $this->name = $name;
    }

    public function render()
    {
        return view('adue-form::field');
    }
}