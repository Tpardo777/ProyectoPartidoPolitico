<?php

namespace App\Domain\PartidoPolitico\Event;
// Aquí definimos el evento PartidoPoliticoDeleted

/**
 * Evento que indica que una entidad PartidoPolitico ha sido eliminada.
 *
 * Propiedades:
 * - $partidoPoliticoId: Identificador único de la entidad PartidoPolitico.
 *
 * Ejemplo de uso:
 *   $evento = new PartidoPoliticoDeleted(123);
 */
class PartidoPoliticoDeleted
// Aquí definimos la propiedad necesaria para el evento
{
    public int $partidoPoliticoId;
    // 🔹 Constructor

    public function __construct(int $partidoPoliticoId)
    // Aquí asignamos el ID recibido al atributo de la clase
    {
        $this->partidoPoliticoId = $partidoPoliticoId;
        // Aquí asignamos el ID recibido al atributo de la clase
    }
}