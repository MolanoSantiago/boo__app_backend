<?php

namespace Hex\Shared\Domain\Constants;

class ExceptionMessages
{
    public const INVALID_CREDENTIALS = 'El correo electrónico o contraseña son inválidos';
    public const ERROR_USER_SAVE = 'Error al intentar guardar el nuevo usuario';
    public const ERROR_USER_UNIQUE = 'El correo electrónico ya se encuentra registrado';
}
