<?php
return [
    'FoodMap\\V1\\Rest\\Local\\Controller' => [
        'description' => 'Cria, lista, altera e exclui pontos de interesse no mapa.',
        'collection' => [
            'description' => 'Manipula listas de pontos de interesse',
            'GET' => [
                'description' => 'Recupera uma lista de pontos de interesse,',
                'response' => '{
   "_links": {
       "self": {
           "href": "https://url_site/food-map/local"
       },
       "first": {
           "href": "https://url_site/food-map/local?page={page}"
       },
       "prev": {
           "href": "https://url_site/food-map/local?page={page}"
       },
       "next": {
           "href": "https://url_site/food-map/local?page={page}"
       },
       "last": {
           "href": "https://url_site/food-map/local?page={page}"
       }
   }
   "_embedded": {
       "local": [
           {
               "_links": {
                   "self": {
                       "href": "https://url_site/food-map/local[/:local_id]"
                   }
               }
              "latitude": "",
              "longitude": "",
              "observacao": "",
              "dt_cadastro": "",
              "dt_alteracao": "",
           }
       ]
   }
}',
            ],
            'POST' => [
                'request' => '{
   "latitude": "Latitude do ponto no mapa (obrigatório)",
   "longitude": "Longitude do ponto no mapa (obrigatório)",
   "observacao": "Observação sobre o ponto de interesse (opcional)"
}',
                'response' => '{
    "id": "",
    "latitude": "",
    "longitude": "",
    "observacao": "",
    "dt_cadastro": "",
    "dt_alteracao": "",
    "_links": {
        "self": {
            "href": "http://url_site/food-map/local/:id_local"
        }
    }
}',
                'description' => 'Cadastra um novo ponto de interesse.',
            ],
        ],
        'entity' => [
            'description' => 'Manipula e recupera pontos de interesse individualmente.',
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "https://url_site/food-map/local[/:local_id]"
       }
   }
   "latitude": "",
   "longitude": "",
   "observacao": "",
    "dt_cadastro": "",
    "dt_alteracao": "",
}',
                'description' => 'Recupera um ponto de interesse.',
            ],
            'DELETE' => [
                'response' => '',
                'request' => '',
                'description' => 'Exclui um ponto de interesse.',
            ],
            'PATCH' => [
                'description' => 'Altera um ponto de interesse',
                'request' => '{
	"latitude":"",
	"longitude":"",
	"observacao":""
}',
                'response' => '{
    "id": "",
    "latitude": "",
    "longitude": "",
    "observacao": "",
    "dt_cadastro": "",
    "dt_alteracao": "",
    "_links": {
        "self": {
            "href": "https://url_sitel/food-map/local/:id_local"
        }
    }
}',
            ],
        ],
    ],
];
