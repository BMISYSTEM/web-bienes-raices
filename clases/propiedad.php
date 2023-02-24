<?php

namespace app;

class propiedad{
//base de datos 
    protected static $db;
    protected static $columnasdb = ['id',
                                    'titulo',
                                    'precio',
                                    'imagen',
                                    'descripcion',
                                    'habitaciones',
                                    'wc',
                                    'estacionamiento',
                                    'creado',
                                    'vendedores_id'];
    //errores
    protected static $errores = [];
    public $id;
    public $titulo;
    public $precio;
    public $imagenes;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;
    public function __construct($arg = []){
        $this->id = $arg['id'] ?? '';
        $this->titulo = $arg['titulo'] ?? '';
        $this->precio = $arg['precio'] ?? '';
        $this->imagenes = $arg['imagen'] ?? 'imagen.jpg';
        $this->descripcion = $arg['descripcion'] ?? '';
        $this->habitaciones = $arg['habitaciones'] ?? '';
        $this->wc = $arg['banos'] ?? '';
        $this->estacionamiento = $arg['esta'] ?? '';
        $this->creado= date('y/m/d');
        $this->vendedores_id= $arg['vendedoresid'] ?? '';
    }
    //se encargara de guardar datos ya sanitizados 
    public function guardar($bd)
    {
        $zanitizar = $this->zanitizar();
        //convierte el arreglo en texto y se le coloca un separador para formar la cadena
        $columans_string = join(', ', array_keys($zanitizar));
        $querys = "INSERT INTO PROPIEDADES (";
        $querys .= join(', ', array_keys($zanitizar));
        $querys .= ") values ('";
        $querys .= join("','",array_values($zanitizar));
        $querys .= "');";
        // $resultado = mysqli_query($bd,$querys);
        // debugear($querys);
        $result = self::$db->query($querys);  
    }
    //definicion de la base de datos
    public static function setdb($database){
        self::$db = $database;
    }
    //recorre las columas mediante un arreglo que se definio en el la clase como protected
    public function atributos(){
        $atributos = [];
        foreach(self::$columnasdb as $columas){
            if($columas === 'id') continue;
            $atributos[$columas] = $this->$columas; 
        }
        return $atributos;
    }
    //sanitiza recorriendo el arreglo que se definio en la funcion de atributos 
    public function zanitizar(){
        $atributos = $this->atributos();
        $sanitizado = [];
        //key hace referencia a las llaves del atrreglo y value al valor
        foreach($atributos as $key=>$value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
         return $sanitizado;
    }
    //Validaciones
    public static function getErrores(){
        return self::$errores; 
    }
    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "debes añadir un titulo";
        }
        if(!$$this->precio){
            self::$errores[] = "debes añadir un precio";
        }
        if(!$$this->wc){
            self::$errores[] = "debes añadir un numero de baños";
        }
        if(!$$this->habitaciones){
            self::$errores[] = "debes añadir un numero de habitaciones";
        }
        if(!$$this->estacionamiento){
            self::$errores[] = "debes añadir un numero de estacionamientos";
        }
        if(!$$this->descripcion){
            self::$errores[] = "debes añadir una descripcion";
        }
        if(!$$this->vendedores_id){
            self::$errores[] = "debes colocar un vendedor";
        }
        if(!$$this->imagenes){
            self::$errores[] = "La imagen es obligatoria";   
        }
    }
}