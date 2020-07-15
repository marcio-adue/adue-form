<?php


namespace Adue;

use Illuminate\Config\Repository;
use Illuminate\View\Component;

class Field extends Component
{
    /**
     * @var String
     */
    public $name;
    /**
     * @var bool
     */
    public $required;
    /**
     * @var Repository
     */
    private $config;

    public function __construct(Repository $config, String $name, $required = false)
    {
        $this->name = $name;
        $this->required = $required;
        $this->config = $config;
    }

    public function highlightsRequired()
    {
        return $this->config->get('form.highlights_requirement') === 'required' && $this->required;
    }

    public function highlightsOptional()
    {
        return $this->config->get('form.highlights_requirement') === 'optional' && ! $this->required;
    }

    public function render()
    {
        return view('adue-form::field');
    }
}
