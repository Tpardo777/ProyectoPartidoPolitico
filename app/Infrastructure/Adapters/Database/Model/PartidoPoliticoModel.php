<?php
/**
 * Modelo simple para representar un partido político.
 *
 * Esta clase almacena los datos de la entidad PartidoPolítico y permite
 * inicializar sus propiedades a partir de un array asociativo.
 *

 */
class PartidoPoliticoModel
// Aquí definimos las propiedades del modelo PartidoPolitico
{
    public $id; // ID del PartidoPolítico
    public $nombre; // Nombre del PartidoPolítico
    public $eslogan;
    public $presidente;
    public $secretario;
    public $tesorero;
    public $pais;
    public $num_presidentes;
    public $num_gobernadores;
    public $num_alcaldes;
    public $num_concejales;
    public $num_congresistas;

    public function __construct(array $data = []) 
    // Constructor que inicializa las propiedades con los datos proporcionados
    {
        foreach ($data as $key => $value) { // Recorremos cada par clave-valor del array
            if (property_exists($this, $key)) { // Verificamos si la propiedad existe en la clase
                $this->$key = $value; 
            } // Aquí asignamos el valor a la propiedad
            //  correspondiente
        }
    }
}