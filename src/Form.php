<?php


namespace Adue;


use Illuminate\View\Component;

class Form extends Component
{

    /**
     * @var string
     */
    public $method;

    public function __construct(string $method = 'get')
    {

        $this->method = $method;
    }

    public function render()
    {
        return view('adue-form::form');
    }

}