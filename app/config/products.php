<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    
    $productos = array(
        "pizzas"=>array(
                    array("nombre"=>"Bacon Crispy Gourmet",
                          "imagen"=>"img/Bacon_Crispy_Gourmet-3064.jpg",
                          "precio"=>array("individual"=>5.99,
                                          "media"=>7.99,
                                          "familiar"=>11.99)
                          ),
                    array("nombre"=>"Barbacoa Gourmet",
                          "imagen"=>"img/Barbacoa_Gourmet-3069.jpg",
                          "precio"=>array("individual"=>5.99,
                                          "media"=>7.99,
                                          "familiar"=>11.99)
                          ),
                    array("nombre"=>"Barbacoa Pulled pork",
                          "imagen"=>"img/Barbacoa_Pulled_pork-3074.jpg",
                          "precio"=>array("individual"=>3.99,
                                          "media"=>5.99,
                                          "familiar"=>8.99)
                          ),
                    array("nombre"=>"Carbonara Gourmet Queso",
                          "imagen"=>"img/Carbonara_Gourmet_Queso-3079.jpg",
                          "precio"=>array("individual"=>5.99,
                                          "media"=>7.99,
                                          "familiar"=>11.99)
                          ),
                          array("nombre"=>"Carnivora Gourmet",
                          "imagen"=>"img/Carnivora_Gourmet-3084.jpg",
                          "precio"=>array("individual"=>4.99,
                                          "media"=>5.99,
                                          "familiar"=>10.99)
                          ),
                          array("nombre"=>"Extrema con Pollo",
                          "imagen"=>"img/Extrema_con_Pollo-3186.png",
                          "precio"=>array("individual"=>5.99,
                                          "media"=>7.99,
                                          "familiar"=>11.99)
                          ),
                          array("nombre"=>"Extrema de Queso Caramelizada",
                          "imagen"=>"img/Extrema_de_Queso_Caramelizada-3181.png",
                          "precio"=>array("individual"=>5.99,
                                          "media"=>7.99,
                                          "familiar"=>11.99)
                          ),
    
                ),
        "bebidas"=>array(
                        array("nombre"=>"Lata el Aguila 1900",
                            "imagen"=>"img/_Lata_el_Aguila_1900-1508.jpg",
                            "precio"=>1.99),
                        array("nombre"=>"Aquarius Limon 500ml",
                            "imagen"=>"img/Aquarius_Limon_500ml_-2515.jpg",
                            "precio"=>3.99),
                        array("nombre"=>"Coca-Cola Original(330ml)",
                            "imagen"=>"img/Coca-Cola_Original_(330_ml_)-1451.jpg",
                            "precio"=>2.99),
                            array("nombre"=>"Coca-Cola Original 500ml",
                            "imagen"=>"img/Coca-Cola_Original_500ml_-2747.jpg",
                            "precio"=>1.49),
                            array("nombre"=>"Coca-Cola Zero 500ml",
                            "imagen"=>"img/Coca-Cola_Zero_500ml_-2752.jpg",
                            "precio"=>1.49),
                            array("nombre"=>"Fanta Limon 330ml",
                            "imagen"=>"img/Fanta_Limon_330ml_-2777.jpg",
                            "precio"=>3.39),
                            array("nombre"=>"Fanta Limon 500ml",
                            "imagen"=>"img/Fanta_Limon_500ml_-2761.jpg",
                            "precio"=>2.99),
                            array("nombre"=>"Fanta Naranja 330ml",
                            "imagen"=>"img/Fanta_Naranja_330ml_-2772.jpg",
                            "precio"=>1.99),
                            array("nombre"=>"Fanta Naranja 500ml",
                            "imagen"=>"img/Fanta_Naranja_500ml_-2767.jpg",
                            "precio"=>2.19),
                            array("nombre"=>"Lata Buckler Radler",
                            "imagen"=>"img/Lata_Buckler_Radler-28.jpg",
                            "precio"=>2.59),
                            array("nombre"=>"Lata Buckler Sin Alcohol",
                            "imagen"=>"img/Lata_Buckler_Sin_Alcohol-36.jpg",
                            "precio"=>1.99),
                            array("nombre"=>"Nestea Te Negro Limon 500ml",
                            "imagen"=>"img/Nestea_Te_Negro_Limon_500ml_-2530.jpg",
                            "precio"=>2.39),
                ),
        "postres"=>array(
            array("nombre"=>"Chocolate Fudge Brownie(465ml)",
                "imagen"=>"img/Chocolate_Fudge_Brownie_(465ml)-1622.jpg",
                "precio"=>2.99),
            array("nombre"=>"Chunkey Monkey (465ml)",
                "imagen"=>"img/Chunkey_Monkey_(465ml)-1626.jpg",
                "precio"=>1.59),
            array("nombre"=>"Donazzo de Telepizza con La Dulzzona",
                "imagen"=>"img/Donazzo_de_Telepizza_con_La_Dulzzona-3258.png",
                "precio"=>2.19),
            array("nombre"=>"Frigopie",
                "imagen"=>"img/Frigopie-391.jpg",
                "precio"=>1.99),
            array("nombre"=>"Helado Cornetto Nocilla",
                "imagen"=>"img/Helado_Cornetto_Nocilla-1469.jpg",
                "precio"=>2.19),
            array("nombre"=>"Magnum Startchaser",
                "imagen"=>"img/Magnum_Startchaser_440-2893.jpg",
                "precio"=>1.79),
                array("nombre"=>"Sweet Pizzolinos",
                "imagen"=>"img/Sweet_Pizzolinos-2883.png",
                "precio"=>0.99),
                array("nombre"=>"Tarrina Magnum Almond",
                "imagen"=>"img/Tarrina_Magnum_Almond-1662.jpg",
                "precio"=>2.99),
                array("nombre"=>"Tarrina Magnum Blanco y Cookie",
                "imagen"=>"img/Tarrina_Magnum_Blanco_y_Cookie-1678.jpg",
                "precio"=>1.99),
                array("nombre"=>"Telepizza con Suchard",
                "imagen"=>"img/Telepizza_con_Suchard-3255.png",
                "precio"=>1.59),
                array("nombre"=>"Yogurt Yogikids Fresa",
                "imagen"=>"img/Yogurt_Yogikids_Fresa-2919.jpg",
                "precio"=>2.19),
            ),
    );
    
    define("PRODUCTOS", $productos);
    
    define("CANTIDAD", array(1,2,3,4,5));
    
?>