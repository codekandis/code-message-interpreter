<?php declare( strict_types = 1 );
namespace CodeKandis\CodeMessageInterpreter\Tests\DataProviders\UnitTests\CodeMessageInterpreterInterfaceTest;

use ArrayIterator;
use CodeKandis\CodeMessageInterpreter\CodeMessageInterpreter;
use CodeKandis\CodeMessageInterpreter\CodeMessageInterpreterException;
use CodeKandis\CodeMessageInterpreter\Tests\Fixtures\CodesFixture;
use CodeKandis\CodeMessageInterpreter\Tests\Fixtures\MessagesFixture;
use function sprintf;

/**
 * Represents a data provider providing instantiated code to message interpreters with unknown codes, expected exceptions, expected codes and expected exception messages.
 * @package codekandis/code-message-interpreter
 * @author Christian Ramelow <info@codekandis.net>
 */
class CodeMessageInterpretersWithUnknownCodesDataProvider extends ArrayIterator
{
	public function __construct()
	{
		parent::__construct(
			[
				0 => [
					'codeMessageInterpreter'     => new CodeMessageInterpreter( CodesFixture::class, MessagesFixture::class ),
					'code'                       => CodesFixture::FOURTH_CODE,
					'expectedExceptionClassName' => CodeMessageInterpreterException::class,
					'expectedExceptionCode'      => 3,
					'expectedExceptionMessage'   => sprintf(
						'The code `%s::%s` has no corresponding message in `%s`.',
						CodesFixture::class,
						'FOURTH_CODE',
						MessagesFixture::class
					)
				],
				1 => [
					'codeMessageInterpreter'     => new CodeMessageInterpreter( CodesFixture::class, MessagesFixture::class ),
					'code'                       => 1234567890,
					'expectedExceptionClassName' => CodeMessageInterpreterException::class,
					'expectedExceptionCode'      => 4,
					'expectedExceptionMessage'   => 'The code `1234567890` is unknown.'
				]
			]
		);
	}
}
