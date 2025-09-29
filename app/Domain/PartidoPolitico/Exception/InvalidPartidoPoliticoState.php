<?php

namespace App\Domain\PartidoPolitico\Exception;
// Aquí definimos la excepción InvalidPartidoPoliticoState

use Exception;

/**
 * Excepción lanzada cuando el estado de un partido político es inválido.
 *
 * Esta clase se utiliza para indicar que la entidad PartidoPolitico
 * ha llegado a un estado que no cumple con las reglas del dominio.
 */
class InvalidPartidoPoliticoState extends Exception {}
// Aquí definimos la excepción InvalidPartidoPoliticoState