<?php


namespace App\Domain\PartidoPolitico\Event;
// Aquí definimos el evento PartidoPoliticoUpdated

/**
 * Evento que indica que un partido político ha sido actualizado.
 *
 */
class PartidoPoliticoUpdated
// Aquí definimos la propiedad necesaria para el evento
{
    public int $partidoId;
    // 🔹 Constructor

    public function __construct(int $partidoId)
    // Aquí asignamos el ID recibido al atributo de la clase
    {
        $this->partidoId = $partidoId;
        // Aquí asignamos el ID recibido al atributo de la clase
    }
}