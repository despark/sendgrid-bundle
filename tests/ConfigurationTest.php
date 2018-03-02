<?php


namespace Tests\Despark\SendGridBundle;


use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Tests\Despark\SendGridBundle\Resources\TestKernel;

class ConfigurationTest extends KernelTestCase
{
    protected function setUp()
    {
        $this->bootKernel();
    }

    /**
     * @return string
     */
    protected static function getKernelClass()
    {
        require_once __DIR__.'/Resources/TestKernel.php';

        return TestKernel::class;
    }

    /**
     *
     */
    public function testApiKey()
    {
        $sendGrid = self::$kernel->getContainer()->get(\SendGrid::class);

        $headers = $sendGrid->client->getHeaders();
        $this->assertEquals('Authorization: Bearer foo%bar', $headers[0]);

        $expectedCurlOptions = ['foo', 'bar'];
        $curlOptions = $sendGrid->client->getCurlOptions();
        $this->assertEquals($expectedCurlOptions, $curlOptions);

        $this->assertEquals('https://localhost', $sendGrid->client->getHost());

    }

}