<?php
declare(strict_types=1);

namespace Application\Form;

use Core\Form\AbstractForm;
use Zend\Http\Request;

class LoginForm extends AbstractForm
{
    /**
     * Constructor
     *
     * @param string|null $name Name of the element
     * @param array $options Options for the element
     * @param \Zend\Http\Request $request Request object
     * @param string $mode Mode of operation
     * @param string $method Send method
     * @throws \InvalidArgumentException
     * @throws \Zend\InputFilter\Exception\InvalidArgumentException
     */
    public function __construct(string $name = null, array $options = [], Request $request, string $mode = self::MODE_NEW, string $method = 'post')
    {
        parent::__construct($name, $options);

        $this->setMode($mode);
        $this->setMethod($method);
        $this->setRequest($request);
        $this->setReferer($this->getRequest());
        $this->createFormElements();
    }

    /**
     * Creates the form elements
     * 
     * @return void
     */
    protected function createFormElements()
    {
        $this->setAttribute('autocomplete', 'off');

        $this->addElement('username', 'text', 'Benutzername', [
            'required' => true,
        ])
            ->setAttribute('class', 'form-control');

        $this->addElement('password', 'password', 'Passwort', [
            'required' => true,
        ])
            ->setAttribute('class', 'form-control');

        $this->addElement('olduri', 'hidden', 'OldUri', [
            'required' => false,
        ]);
    }
}