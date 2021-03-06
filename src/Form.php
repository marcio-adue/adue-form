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

    public function httpMethod()
    {
        if ($this->spoofedMethod()) {
            return 'post';
        }

        return $this->method;
    }

    public function spoofedMethod()
    {
        return in_array($this->method, ['put', 'patch', 'delete']);
    }

    public function render()
    {
        return view('adue-form::form');
    }
}
