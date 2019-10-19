<?php declare( strict_types = 1 );
namespace CodeKandis\CodeMessageInterpreter\Tests\UnitTests;

use CodeKandis\CodeMessageInterpreter\CodeMessageInterpreterInterface;
use CodeKandis\CodeMessageInterpreter\Tests\DataProviders\UnitTests\CodeMessageInterpreterInterfaceTest\CodeMessageInterpretersWithCodesDataProvider;
use CodeKandis\CodeMessageInterpreter\Tests\DataProviders\UnitTests\CodeMessageInterpreterInterfaceTest\CodeMessageInterpretersWithUnknownCodesDataProvider;
use Iterator;
use PHPUnit\Framework\TestCase;

/**
 * Represents the test case to test objects against the `CodeMessageInterpreterInterface`.
 * @package codekandis/code-message-interpreter
 * @author Christian Ramelow <info@codekandis.net>
 */
class CodeMessageInterpreterInterfaceTest extends TestCase
{
	/**
	 * Provides instantiated code to message interpreters with valid codes and messages.
	 * @return Iterator The instantiated code to message interpreters with valid codes and messages.
	 */
	public function codeMessageInterpretersWithCodesDataProvider(): Iterator
	{
		return new CodeMessageInterpretersWithCodesDataProvider();
	}

	/**
	 * Tests if `CodeMessageInterpreterInterface::interpret()` interpretes correctly.
	 * @param CodeMessageInterpreterInterface $codeMessageInterpreter The code to message interpreter to test.
	 * @param int $code The code to interpret.
	 * @param string $expectedMessage The expected interpreted message.
	 * @dataProvider codeMessageInterpretersWithCodesDataProvider
	 */
	public function testsIfMethodInterpretReturnsMessagesCorrectly( CodeMessageInterpreterInterface $codeMessageInterpreter, int $code, string $expectedMessage ): void
	{
		$resultedMessage = $codeMessageInterpreter->interpret( $code );

		static::assertSame( $expectedMessage, $resultedMessage );
	}

	/**
	 * Provides instantiated code to message interpreters with unknown codes, expected exceptions, expected codes and expected exception messages.
	 * @return Iterator The instantiated code to message interpreters with unknown codes, expected exceptions, expected codes and expected exception messages.
	 */
	public function codeMessageInterpretersWithUnknownCodesDataProvider(): Iterator
	{
		return new CodeMessageInterpretersWithUnknownCodesDataProvider();
	}

	/**
	 * Tests if `CodeMessageInterpreterInterface::interpret()` throws an exception if an error occurred during interpretation.
	 * @param CodeMessageInterpreterInterface $codeMessageInterpreter The code to message interpreter to test.
	 * @param int $code The code to interpret.
	 * @param string $expectedExceptionClassName The class name of the expected exception.
	 * @param int $expectedExceptionCode The code of the expected exception.
	 * @param string $expectedExceptionMessage The message of the expected exception.
	 * @dataProvider codeMessageInterpretersWithUnknownCodesDataProvider
	 */
	public function testsIfMethodInterpretThrowsExceptionOnUnknownCode(
		CodeMessageInterpreterInterface $codeMessageInterpreter,
		int $code,
		string $expectedExceptionClassName,
		int $expectedExceptionCode,
		string $expectedExceptionMessage
	): void
	{
		$this->expectException( $expectedExceptionClassName );
		$this->expectExceptionCode( $expectedExceptionCode );
		$this->expectExceptionMessage( $expectedExceptionMessage );

		$codeMessageInterpreter->interpret( $code );
	}
}
