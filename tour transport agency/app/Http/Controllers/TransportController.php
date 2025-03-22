<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransportController extends Controller
{
    
    public function index()
    {
        $transfers = [
            [
                'departure' => 'Marrakech',
                'destination' => 'Casablanca Aéroport',
                'price' => 'Plus Details',
                'image' => 'casa-airo.jpg',
                'description' => 'Voyagez confortablement de Marrakech à l’aéroport de Casablanca avec notre service de transport premium.'
            ],
            [
                'departure' => 'Marrakech',
                'destination' => 'Casablanca Centre',
                'price' => 'Plus Details',
                'image' => 'casa.webp',
                'description' => 'Transfert fiable et pratique de Marrakech au centre-ville de Casablanca.'
            ],
            [
                'departure' => 'Marrakech',
                'destination' => 'Agadir',
                'price' => 'Plus Details',
                'image' => 'agadir-centre.webp',
                'description' => 'Profitez d’un voyage agréable de Marrakech à Agadir dans nos véhicules confortables.'
            ],
            [
                'departure' => 'Marrakech',
                'destination' => 'Essaouira',
                'price' => 'Plus Details',
                'image' => 'Essaouira.jpg',
                'description' => 'Détendez-vous et admirez le paysage en route de Marrakech à Essaouira.'
            ],
            [
                'departure' => 'Marrakech',
                'destination' => 'Rabat',
                'price' => 'Plus Details',
                'image' => 'rabat.JPG',
                'description' => 'Un service de transport rapide et sécurisé entre Marrakech et Rabat.'
            ],
            [
                'departure' => 'Hôtel en ville',
                'destination' => 'Hôtel en ville',
                'price' => 'Plus Details',
                'image' => 'hotel-enville.jpg',
                'description' => 'Déplacements rapides et efficaces entre hôtels dans la ville de Marrakech.'
            ],
            [
                'departure' => 'Aéroport',
                'destination' => 'Hôtel en ville',
                'price' => 'Plus Details',
                'image' => 'marrakech-airport.webp',
                'description' => 'Transfert fluide entre l’aéroport et votre hôtel en ville à Marrakech.'
            ],
            [
                'departure' => 'Aéroport',
                'destination' => 'Hôtel Palmeraie',
                'price' => 'Plus Details',
                'image' => 'palmerie.jpg',
                'description' => 'Voyagez en toute sérénité de l’aéroport à votre hôtel dans la Palmeraie.'
            ],
            [
                'departure' => 'Visite de ville',
                'destination' => 'La journée',
                'price' => 'Plus Details',
                'image' => 'visite.jpg',
                'description' => 'Explorez Marrakech toute la journée avec notre service de transport privé. 
            
                Renommée depuis toujours pour l’activité de ses commerçants et l’habileté de ses artisans, Marrakech brille aussi par la qualité de son climat et un environnement aussi exceptionnel que varié, avec sa palmeraie, ses roseraies, la proximité de l’Atlas enneigé et des vallées fleuries qui en descendent. Elle est encore aujourd’hui la capitale du Sud Marocain, toujours au carrefour des cultures, gardienne des traditions et du folklore, et riche d’un patrimoine architectural qui en fait l’un des hauts lieux du tourisme international.  
            
                **Monuments et Palaces:** Vous découvrirez la majestueuse silhouette de la Koutoubia (11e siècle) et le Palais la Bahia (19e siècle).  
            
                **La place Jemaa el Fna:** Cœur vivant de la ville, connue dans le monde entier pour son animation perpétuelle.  
            
                **Souks:** Véritables poumons économiques de la ville rouge où les artisans utilisent encore dans de nombreux domaines les anciennes techniques.  
            
                **Les Jardins Historiques:** Le jardin Majorelle et les Jardins de la Menara.'
            ],
            
            [
                'departure' => 'Mise à disposition',
                'destination' => '',
                'price' => 'Plus Details',
                'image' => 'gueliz.jpg',
                'description' => 'Service de transport sur mesure avec chauffeur privé à disposition.'
            ],
            [
                'departure' => 'Soirée restaurant',
                'destination' => '',
                'price' => 'Plus Details',
                'image' => 'soiree-evenings.jpg',
                'description' => 'Profitez d’une soirée sans stress avec notre transport vers votre restaurant préféré.'
            ],
        ];
    
       return view('transport', [
        'transfers' => $transfers,
        'meta_title' => 'Transports Privés au Maroc - Réservez Votre Véhicule',
        'meta_description' => 'Découvrez nos services de transport privé au Maroc. Transfert aéroport, déplacements en ville et trajets longue distance.',
        'meta_image' => asset('assets/images/transport/marrakech-airport.webp'),
        'meta_url' => url()->current()
    ]);
    }
    
    
}

