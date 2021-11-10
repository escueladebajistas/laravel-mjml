<?php

namespace Tests;

use Edx\MJML\Mjml;

 /*
  * Check tests/resouces/test.blade.php to see test file.
  *
  * <mjml>
  * <mj-body>
  * <mj-text>{{ $name }}</mj-text>
  * </mj-body>
  * </mjml>
  */
class MjmlTest extends TestCase
{
    /** @test */
    public function view_file_is_rendered_correctly()
    {
        $this->assertStringContainsString(
            '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">',
            app(Mjml::class)->render('test'),
        );
    }

    /** @test */
    public function helper_function_works()
    {
        $this->assertStringContainsString(
            '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">',
            mjml('test'),
        );
    }

    /** @test */
    public function variables_are_rendered_correctly()
    {
        $this->assertStringContainsString(
            'John Doe',
            app(Mjml::class)->render('test', ['name' => 'John Doe']),
        );
    }
}