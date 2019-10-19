<?php declare( strict_types = 1 );
namespace CodeKandis\CodeMessageInterpreter;

/**
 * Represents the interface of all code to message interpreters.
 * @package codekandis/code-message-interpreter
 * @author Christian Ramelow <info@codekandis.net>
 */
interface CodeMessageInterpreterInterface
{
	/**
	 * Interpretes an code and returns the appropriate message.
	 * @param int $code The code to interpret.
	 * @return string The interpreted message.
	 * @throws CodeMessageInterpreterException The code has no corresponding message.
	 * @throws CodeMessageInterpreterException The code is unknown.
	 */
	public function interpret( int $code ): string;
}
