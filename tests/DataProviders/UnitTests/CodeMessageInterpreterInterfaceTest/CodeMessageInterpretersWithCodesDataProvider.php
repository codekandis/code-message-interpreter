<?php declare( strict_types = 1 );
namespace CodeKandis\CodeMessageInterpreter\Tests\DataProviders\UnitTests\CodeMessageInterpreterInterfaceTest;

use ArrayIterator;
use CodeKandis\CodeMessageInterpreter\CodeMessageInterpreter;
use CodeKandis\CodeMessageInterpreter\Tests\Fixtures\CodesFixture;
use CodeKandis\CodeMessageInterpreter\Tests\Fixtures\MessagesFixture;

/**
 * Represents a data provider providing instantiated code to message interpreters with valid codes and messages.
 * @package codekandis/code-message-interpreter
 * @author Christian Ramelow <info@codekandis.net>
 */
class CodeMessageInterpretersWithCodesDataProvider extends ArrayIterator
{
	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		parent::__construct(
			[
				0 => [
					'codeMessageInterpreter' => new CodeMessageInterpreter( CodesFixture::class, MessagesFixture::class ),
					'code'                   => CodesFixture::FIRST_CODE,
					'expectedMessage'        => MessagesFixture::FIRST_CODE
				],
				1 => [
					'codeMessageInterpreter' => new CodeMessageInterpreter( CodesFixture::class, MessagesFixture::class ),
					'code'                   => CodesFixture::SECOND_CODE,
					'expectedMessage'        => MessagesFixture::SECOND_CODE
				],
				2 => [
					'codeMessageInterpreter' => new CodeMessageInterpreter( CodesFixture::class, MessagesFixture::class ),
					'code'                   => CodesFixture::THIRD_CODE,
					'expectedMessage'        => MessagesFixture::THIRD_CODE
				]
			]
		);
	}
}
