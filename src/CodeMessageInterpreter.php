<?php declare( strict_types = 1 );
namespace CodeKandis\CodeMessageInterpreter;

use ReflectionClass;
use ReflectionException;
use function sprintf;

/**
 * Represents a code message interpreter.
 * @package codekandis/code-message-interpreter
 * @author Christian Ramelow <info@codekandis.net>
 */
class CodeMessageInterpreter implements CodeMessageInterpreterInterface
{
	/**
	 * Stores the reflected codes class.
	 * @var ReflectionClass
	 */
	private $reflectedCodeClass;

	/**
	 * Stores the reflected messages class.
	 * @var ReflectionClass
	 */
	private $reflectedMessageClass;

	/**
	 * Constructor method.
	 * @throws CodeMessageInterpreterException The codes class does not exist.
	 * @throws CodeMessageInterpreterException The messages class does not exist.
	 */
	public function __construct( string $codesClassName, string $messagesClassName )
	{
		$this->initReflectedClasses( $codesClassName, $messagesClassName );
	}

	/**
	 * Initializes the reflected codes and messages classes.
	 * @throws CodeMessageInterpreterException The codes class does not exist.
	 * @throws CodeMessageInterpreterException The messages class does not exist.
	 */
	private function initReflectedClasses( string $codesClassName, string $messagesClassName ): void
	{
		try
		{
			$this->reflectedCodeClass = new ReflectionClass( $codesClassName );
		}
		catch ( ReflectionException $exception )
		{
			$message = sprintf(
				'The codes class `%s` is invalid.',
				$codesClassName
			);
			throw new CodeMessageInterpreterException( $message, 1 );
		}
		try
		{
			$this->reflectedMessageClass = new ReflectionClass( $messagesClassName );
		}
		catch ( ReflectionException $exception )
		{
			$message = sprintf(
				'The messages class `%s` is invalid.',
				$messagesClassName
			);
			throw new CodeMessageInterpreterException( $message, 2 );
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function interpret( int $code ): string
	{
		$interpretedMessage     = '';
		$reflectedCodeConstants = $this->reflectedCodeClass->getConstants();
		foreach ( $reflectedCodeConstants as $reflectedCodeConstantName => $reflectedCodeConstantValue )
		{
			if ( $reflectedCodeConstantValue === $code )
			{
				$interpretedMessage = $this->reflectedMessageClass->getConstant( $reflectedCodeConstantName );
				if ( false === $interpretedMessage )
				{
					$exceptionMessage = sprintf(
						'The code `%s::%s` has no corresponding message in `%s`.',
						$this->reflectedCodeClass->getName(),
						$reflectedCodeConstantName,
						$this->reflectedMessageClass->getName()
					);
					throw new CodeMessageInterpreterException( $exceptionMessage, 3 );
				}
				break;
			}
		}

		if ( '' === $interpretedMessage )
		{
			$exceptionMessage = sprintf(
				'The code `%s` is unknown.',
				$code
			);
			throw new CodeMessageInterpreterException( $exceptionMessage, 4 );
		}

		return $interpretedMessage;
	}
}
