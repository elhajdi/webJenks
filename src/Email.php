<?php declare(strict_types=1);
/**
 *  emailing class
 */
final class Email
{
    private $email;

    private function __construct(string $email)
    {
        $this->ensureIsValidEmail($email);

        $this->email = $email;
    }

    /**
     * [fromString description]
     * @param  string $email [description]
     * @return [type]        [description]
     */
    public static function fromString(string $email): self
    {
        return new self($email);
    }

    /**
     * [__toString description]
     * @return string [description]
     */
    public function __toString(): string
    {
        return $this->email;
    }

    /**
     * [ensureIsValidEmail description]
     * @param  string $email [description]
     * @return [type]        [description]
     */
    private function ensureIsValidEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $email
                )
            );
        }
    }
}