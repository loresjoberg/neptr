<?php


namespace Lore\Neptr\Model\DataType\Person;

use Lore\Neptr\Model\Core\Validator;


/**
 * Class Password
 * @package Lore\Neptr\Model\DataType
 */
class Password
{
    /**
     * @var string
     */
    protected $clearText;

    /**
     * @var string
     */
    protected $hashedPassword;

    /**
     * Password constructor.
     * @param string $clearText
     */
    public function __construct($clearText)
    {
        if (!$this->validateClearText($clearText)) {
            throw new \Exception('Invalid password.');
        }
        $this->clearText = $clearText;
    }

    private function validateClearText($clearText) {
        return Validator::isSimpleStringish($clearText);
    }

}