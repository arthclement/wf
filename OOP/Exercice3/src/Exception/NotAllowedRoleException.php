<?php
namespace Exception;

class NotAllowedRoleException extends \RuntimeException {
    protected $allowedRoles;
    protected $label;

    public function __construct (
        array $allowedRoles,
        string $label,
        $message = null,
        $code = null,
        $previous = null
    ) {
        $this->allowedRoles = $allowedRoles;
        $this->label = $label;

        $message = $this->getNewMessage() . $message;

        parent::__construct($message, $code, $previous);
    }

    public function getNewMessage() {
        $allowedReference = '['.implode(',', $this->allowedRoles).']';
        $mismatchingReference = $this->label;

        $message = 'Usage of' . $mismatchingReference . 'is not allowed';
        $message .= 'Only' . $allowedReference . 'are allowed';

        return $message;
    }
}

new NotAllowedRoleException(['ROLE_USER', 'ROLE_ADMIN'], '');