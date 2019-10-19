<?php declare( strict_types = 1 );
namespace CodeKandis\CodeMessageInterpreter\Tests\DataProviders\UnitTests\CodeMessageInterpreterTest;

use ArrayIterator;
use CodeKandis\CodeMessageInterpreter\CodeMessageInterpreter;
use CodeKandis\CodeMessageInterpreter\CodeMessageInterpreterException;
use CodeKandis\CodeMessageInterpreter\Tests\Fixtures\CodesFixture;
use CodeKandis\CodeMessageInterpreter\Tests\Fixtures\MessagesFixture;

/**
 * Represents a data provider providing code message interpreter class names with invalid codes and messages.
 * @package codekandis/code-message-interpreter
 * @author Christian Ramelow <info@codekandis.net>
 */
class CodeMessageInterpreterClassNamesWithInvalidCodesAndMessagesDataProvider extends ArrayIterator
{
	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		parent::__construct(
			[
				0 => [
					'codeMessageInterpreterClassName' => CodeMessageInterpreter::class,
					'codesClassName'                  => 'foobar',
					'messagesClassName'               => MessagesFixture::class,
					'expectedExceptionClassName'      => CodeMessageInterpreterException::class,
					'expectedExceptionCode'           => 1,
					'expectedExceptionMessage'        => 'The codes class `foobar` is invalid.'
				],
				1 => [
					'codeMessageInterpreterClassName' => CodeMessageInterpreter::class,
					'codesClassName'                  => CodesFixture::class,
					'messagesClassName'               => 'foobar',
					'expectedExceptionClassName'      => CodeMessageInterpreterException::class,
					'expectedExceptionCode'           => 2,
					'expectedExceptionMessage'        => 'The messages class `foobar` is invalid.'
				],
				2 => [
					'codeMessageInterpreterClassName' => CodeMessageInterpreter::class,
					'codesClassName'                  => 'foobar',
					'messagesClassName'               => 'foobar',
					'expectedExceptionClassName'      => CodeMessageInterpreterException::class,
					'expectedExceptionCode'           => 1,
					'expectedExceptionMessage'        => 'The codes class `foobar` is invalid.'
				]
			]
		);
	}
}
