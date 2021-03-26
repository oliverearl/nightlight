<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */
class Mock_Libraries_Email
{
    private array $data = [];

    /**
     * @var bool return value of send()
     */
    public bool $return_send = true;

    public function initialize(): void
    {
        //
    }

    /**
     * @param string $from
     */
    public function from(string $from): void
    {
        $this->data['from'] = $from;
    }

    /**
     * @param string $to
     */
    public function to(string $to): void
    {
        $this->data['to'] = $to;
    }

    /**
     * @param string $bcc
     */
    public function bcc(string $bcc): void
    {
        $this->data['bcc'] = $bcc;
    }

    /**
     * @param string $subject
     */
    public function subject(string $subject): void
    {
        $this->data['subject'] = $subject;
    }


    /**
     * @param string $message
     */
    public function message(string $message): void
    {
        $this->data['message'] = $message;
    }

    /**
     * @return bool
     */
    public function send(): bool
    {
        return $this->return_send;
    }

    /**
     * @return array
     */
    public function _get_data(): array
    {
        return $this->data;
    }
}
