<?php


namespace Tests;


use Adue\Form;
use Illuminate\Support\Facades\File;

class FromTest extends TestCase
{
    /** @test */
    function renders_a_form()
    {
        $form = new Form;

        $this->assertSame('<form></form>', trim($form->render()->render()));
    }

    /** @test */
    function a_template_can_render_a_form_component()
    {
        $this->assertTemplateRenders(
            '<form></form>',
            '<x-form></x-form>'
        );
    }

    protected function assertTemplateRenders($expectedHtml, $actualTemplate)
    {
        file_put_contents(__DIR__.'/views/'.md5($expectedHtml).'.blade.php', $actualTemplate);

        $this->app->view->addNamespace('_test', __DIR__.'/views/');

        $this->assertSame(
            $expectedHtml,
            trim(view('_test::'.md5($expectedHtml))->toHtml())
        );
    }
}