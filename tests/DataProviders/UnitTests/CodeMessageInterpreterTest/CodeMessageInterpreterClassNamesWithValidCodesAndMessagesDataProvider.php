<?php declare( strict_types = 1 );
namespace CodeKandis\CodeMessageInterpreter\Tests\DataProviders\UnitTests\CodeMessageInterpreterTest;

use ArrayIterator;
use CodeKandis\CodeMessageInterpreter\CodeMessageInterpreter;
use CodeKandis\CodeMessageInterpreter\Tests\Fixtures\CodesFixture;

/**
 * Represents a data provider providing code message interpreter class names with valid codes and messages.
 * @package codekandis/code-message-interpreter
 * @author Christian Ramelow <info@codekandis.net>
 */
class CodeMessageInterpreterClassNamesWithValidCodesAndMessagesDataProvider extends ArrayIterator
{
	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		parent::__construct(
			[
				0 => [
					'codesInterpreterClassName'                       => CodeMessageInterpreter::class,
					'codesClassName'                                  => CodesFixture::class,
					'messagesClassName'                               => CodesFixture::class,
					'expectedCodeMessageInterpreterClassInstanceName' => CodeMessageInterpreter::class
				]
			]
		);
	}
}
