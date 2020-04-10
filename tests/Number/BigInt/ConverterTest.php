<?php

declare(strict_types=1);

namespace Test\Keiko\Uuid\Shortener\Number\BigInt;

use Brick\Math\BigInteger;
use Brick\Math\BigNumber;
use Keiko\Uuid\Shortener\Number\BigInt\Converter;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    /**
     * @var Converter
     */
    private $converter;

    protected function setUp(): void
    {
        $this->converter = new Converter();
    }

    /**
     * @test
     */
    public function it_should_transform_BigNumbers_into_hexadecimal_values()
    {
        // Given
        $number = BigInteger::of(254);

        // When
        $hex = $this->converter->toHex($number);

        // Then
        $this->assertEquals('fe', $hex);
    }

    /**
     * @test
     */
    public function it_should_transform_hexadecimal_values_into_BigNumbers()
    {
        // Given
        $hex = 'fd';

        // When
        $bigNumber = $this->converter->fromHex($hex);

        // Then
        $this->assertInstanceOf(BigNumber::class, $bigNumber);
        $this->assertEquals(253, $bigNumber->toInt());
    }
}
