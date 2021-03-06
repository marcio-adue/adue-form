<?php


namespace Tests;

class FieldTest extends TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set([
            'form.highlights_requirement' => 'none'
        ]);
    }

    /** @test */
    function renders_an_optional_field()
    {
        $this->makeTemplate('<x-field name="name" />')
            ->assertRender('
                <div class="form-group optional">
                    <label for="name"> Name </label>
                    <input name="name" type="text" class="form-control" id="name" aria-describedby="name">
                </div>
            ');

        $this->makeTemplate('<x-field name="email" type="email" />')
            ->assertRender('
                <div class="form-group optional">
                    <label for="email"> Email </label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="email">
                </div>
            ');
    }

    /** @test */
    function renders_a_required_field()
    {
        $this->makeTemplate('<x-field name="email" type="email" required />')
            ->assertRender('
                <div class="form-group required">
                    <label for="email"> Email </label>
                    <input name="email" type="email" required="required" class="form-control" id="email" aria-describedby="email">
                </div>
            ');
    }

    /** @test */
    function highlights_a_field_as_required()
    {
        $this->app['config']->set(['form.highlights_requirement' => 'required']);

        $this->makeTemplate('<x-field name="email" type="email" required />')
            ->assertRender('
                <div class="form-group required">
                    <label for="email">
                        Email
                        <span class="badge badge-danger">required</span>
                    </label>
                    <input name="email" type="email" required="required" class="form-control" id="email" aria-describedby="email">
                </div>
            ');
    }

    /** @test */
    function highlights_a_field_as_optional()
    {
        $this->app['config']->set(['form.highlights_requirement' => 'optional']);

        $this->makeTemplate('<x-field name="email" type="email" />')
            ->assertRender('
                <div class="form-group optional">
                    <label for="email">
                        Email
                        <span class="badge badge-info">optional</span>
                    </label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="email">
                </div>
            ');
    }

    /** @test */
    function highlights_a_field_as_required_in_spanish()
    {
        $this->app['config']->set(['form.highlights_requirement' => 'required']);
        $this->app['translator']->setLocale('es');
        $this->app['translator']->addLines([
            '*.required' => 'Obligatorio'
        ], 'es');

        $this->makeTemplate('<x-field name="email" type="email" required />')
            ->assertContain('<span class="badge badge-danger">Obligatorio</span>');
    }

    /** @test */
    function highlights_a_field_as_optional_in_spanish()
    {
        $this->app['config']->set(['form.highlights_requirement' => 'optional']);
        $this->app['translator']->setLocale('es');
        $this->app['translator']->addLines([
            '*.optional' => 'Opcional'
        ], 'es');

        $this->makeTemplate('<x-field name="email" type="email" />')
            ->assertContain('<span class="badge badge-info">Opcional</span>');
    }
}
