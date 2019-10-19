<?php declare( strict_types = 1 );
namespace CodeKandis\CodeMessageInterpreter\Tests\UnitTests;

use CodeKandis\CodeMessageInterpreter\Tests\DataProviders\UnitTests\CodeMessageInterpreterTest\CodeMessageInterpreterClassNamesWithInvalidCodesAndMessagesDataProvider;
use CodeKandis\CodeMessageInterpreter\Tests\DataProviders\UnitTests\CodeMessageInterpreterTest\CodeMessageInterpreterClassNamesWithValidCodesAndMessagesDataProvider;
use Iterator;
use PHPUnit\Framework\TestCase;

/**
 * Represents the test case to test objects against the `CodeMessageInterpreter`.
 * @package codekandis/codes-message-interpreter
 * @author Christian Ramelow <info@codekandis.net>
 */
class CodeMessageInterpreterTest extends TestCase
{
	/**
	 * Provides code message interpreter class names with valid codes and messages.
	 * @return Iterator The code message interpreter class names with valid codes and messages.
	 */
	public function CodeMessageInterpreterClassNamesWithValidCodesAndMessagesDataProvider(): Iterator
	{
		return new CodeMessageInterpreterClassNamesWithValidCodesAndMessagesDataProvider();
	}

	/**
	 * Tests if the instantiation of the code message interpreter returns correctly.
	 * @param string $codeMessageInterpreterClassName The class name of the code message interpreter to instantiate.
	 * @param string $codesClassName The class name of the codes.
	 * @param string $messagesClassName The class name of the messages.
	 * @param string $expectedCodeMessageInterpreterClassName The expected class name the code message interpreter is an instance of.
	 * @dataProvider CodeMessageInterpreterClassNamesWithValidCodesAndMessagesDataProvider
	 */
	public function testIfInstantiationReturnsCorrectly( string $codeMessageInterpreterClassName, string $codesClassName, string $messagesClassName, string $expectedCodeMessageInterpreterClassName ): void
	{
		$codeMessageInterpreter = new $codeMessageInterpreterClassName( $codesClassName, $messagesClassName );

		static::assertInstanceOf( $expectedCodeMessageInterpreterClassName, $codeMessageInterpreter );
	}

	/**
	 * Provides code message interpreter class names with invalid codes and messages.
	 * @return Iterator The code message interpreter class names with invalid codes and messages.
	 */
	public function codeMessageInterpreterClassNamesWithInvalidCodesAndMessagesDataProvider(): Iterator
	{
		return new CodeMessageInterpreterClassNamesWithInvalidCodesAndMessagesDataProvider();
	}

	/**
	 * Tests if the instantiation of the code message interpreter throws exceptions on invalid codes class name or messages class name.
	 * @param string $codeMessageInterpreterClassName The class name of the code interpreter to instantiate.
	 * @param string $codesClassName The class name of the codes.
	 * @param string $messagesClassName The class name of the messages.
	 * @param string $expectedExceptionClassName The class name of the expected exception.
	 * @param int $expectedExceptionCode The code of the expected exception.
	 * @param string $expectedExceptionMessage The message of the expected exception.
	 * @dataProvider codeMessageInterpreterClassNamesWithInvalidCodesAndMessagesDataProvider
	 */
	public function testIfInstantiationThrowsExceptionsOnInvalidCodesOrMessagesClassName( string $codeMessageInterpreterClassName, string $codesClassName, string $messagesClassName, string $expectedExceptionClassName, int $expectedExceptionCode, string $expectedExceptionMessage ): void
	{
		$this->expectException( $expectedExceptionClassName );
		$this->expectExceptionCode( $expectedExceptionCode );
		$this->expectExceptionMessage( $expectedExceptionMessage );

		new $codeMessageInterpreterClassName( $codesClassName, $messagesClassName );
	}
}
