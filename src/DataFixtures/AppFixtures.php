<?php

namespace App\DataFixtures;

use App\Entity\Question;
use App\Entity\Answer;
use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\AsciiSlugger;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $data = [

            "Les Pokémons" => [

                "Quelle est la couleur des joues de Pikachu ?" => [
                    "Rose" => false,
                    "Rouge" => true,
                    "Bleu" => false,
                    "Noir" => false
                ],

                "De quelle région réelle la région fictive de Hoenn s'est-elle inspirée ?" => [
                    "Hawai" => false,
                    "D'une île de l'océan Pacifique appartenant au Chili" => false,
                    "Du sud du Japon" => true,
                    "De Hong Kong" => false
                ],
                
                "Parmi ces Pokéballs, une seule existe réellement. Laquelle ?" => [
                    "Destin Ball" => false,
                    "Copain Ball" => true,
                    "Extra Ball" => false,
                    "Dragon Ball" => false
                ],

                "Laquelle de ces affirmations est fausse ?" => [
                    "Mélofée aurait dû être la mascotte de Pokémon" => false,
                    "Munna faisait partie de la 1G, mais a dû être supprimé, par manque de place dans la mémoire du jeu" => false,
                    "Les développeurs voulait rajouter une évolution à Raichu, Gorochu de type Electrik/Feu" => false,
                    "Il était impossible de capturer Mew dans la 1G sans utiliser de cheatcode" => true
                ],

                "Quel est le nom du pokémon de type feu qui ressemble à un renard ?" => [
                    "Feunard" => true,
                    "Pikachu" => false,
                    "Flamiaou" => false,
                    "Pyroli" => false,
                ],

                "Quel est le pokémon le plus lourd de la première génération ?" => [
                    "Ronflex" => false,
                    "Métamorph" => false,
                    "Leviator" => false,
                    "Rhinoféros" => true,
                ],

                "Quel est le pokémon légendaire qui peut voyager dans le temps ?" => [
                    "Celebi" => true,
                    "Dialga" => false,
                    "Jirachi" => false,
                    "Mewtwo" => false,
                ],

                "Quel est le pokémon de type dragon qui a la forme d’un serpent ?" => [
                    "Draco" => true,
                    "Dracolosse" => false,
                    "Dracofeu" => false,
                    "Drattak" => false,
                ],

                "Quel est le pokémon de type glace qui a la forme d’un pingouin ?" => [
                    "Oniglali" => false,
                    "Pingoléon" => true,
                    "Givrali" => false,
                    "Sorbébé" => false,
                ]

            ],

            "Les fromages" => [

                "Quel est le nom du fromage de type pâte molle à croûte fleurie qui est originaire de Normandie ?" => [
                    "Camembert" => true,
                    "Brie" => false,
                    "Chaource" => false,
                    "Neufchâtel" => false,
                ],

                "Quel est le nom du fromage de type pâte molle à croûte lavée qui est originaire de Bourgogne ?" => [
                    "Epoisses" => true,
                    "Munster" => false,
                    "Maroilles" => false,
                    "Pont-l’Evêque" => false,
                ],

                "Quel est le nom du fromage de type pâte persillée qui est originaire d’Aveyron ?" => [
                    "Roquefort" => true,
                    "Bleu d’Auvergne" => false,
                    "Fourme d’Ambert" => false,
                    "Bleu des Causses" => false,
                ],

                "Quel est le nom du fromage de type pâte pressée non cuite qui est originaire des Pyrénées-Atlantiques ?" => [
                    "Ossau-Iraty" => true,
                    "Cantal" => false,
                    "Tomme de Savoie" => false,
                    "Saint-Nectaire" => false,
                ],

                "Quel est le nom du fromage de type pâte pressée cuite qui est originaire du Jura ?" => [
                    "Comté" => true,
                    "Emmental" => false,
                    "Beaufort" => false,
                    "Gruyère" => false,
                ],

                "Quel est le nom du fromage de type pâte non pressée non cuite qui est originaire du Pays basque ?" => [
                    "Ardi Gasna" => true,
                    "Brocciu" => false,
                    "Banon" => false,
                    "Crottin de Chavignol" => false,
                ],

                "Quel est le nom du fromage de type fromage frais qui est originaire de Provence ?" => [
                    "Brousse" => true,
                    "Faisselle" => false,
                    "Petit-suisse" => false,
                    "Carré frais" => false,
                ],

                "Quel est le nom du fromage de type pâte molle à croûte naturelle qui est originaire d’Auvergne ?" => [
                    "Saint-Nectaire" => true,
                    "Reblochon" => false,
                    "Livarot" => false,
                    "Morbier" => false,
                ],

                "Quel est le nom du fromage de type pâte pressée non cuite qui est originaire de Corse ?" => [
                    "Brocciu" => true,
                    "Ossau-Iraty" => false,
                    "Salers" => false,
                    "Laguiole" => false,
                ],

                "Quel est le nom du fromage de type pâte pressée cuite qui est originaire des Alpes ?" => [
                    "Beaufort" => true,
                    "Comté" => false,
                    "Emmental" => false,
                    "Gruyère" => false,
                ]

            ],

        "L’histoire de France" => [

            "Quel roi de France a été surnommé le Roi-Soleil ?" => [
                "Louis XIII" => false,
                "Louis XIV" => true,
                "Louis XV" => false,
                "Louis XVI" => false
            ],

            "Quelle est la date de la prise de la Bastille, symbole du début de la Révolution française ?" => [
                "14 juillet 1789" => true,
                "5 mai 1789" => false,
                "21 janvier 1793" => false,
                "18 brumaire an VIII" => false
            ],

            "Quel empereur français a mené la campagne de Russie en 1812 ?" => [
                "Napoléon Ier" => true,
                "Napoléon II" => false,
                "Napoléon III" => false,
                "Charles X" => false
            ],

            "Quel mouvement artistique est né en France au XIXe siècle et se caractérise par la représentation des impressions fugitives de la lumière et des couleurs ?" => [
                "Le romantisme" => false,
                "Le réalisme" => false,
                "L'impressionnisme" => true,
                "Le symbolisme" => false
            ],

            "Quelle guerre oppose la France et l'Allemagne de 1870 à 1871 ?" => [
                "La guerre de Sept Ans" => false,
                "La guerre franco-allemande" => true,
                "La Première Guerre mondiale" => false,
                "La Seconde Guerre mondiale" => false
            ],

            "Quel est le nom du régime politique instauré en France après la défaite de 1940 face à l'Allemagne nazie ?" => [
                "La Troisième République" => false,
                "La Quatrième République" => false,
                "L'État français ou Régime de Vichy" => true,
                "La Cinquième République" => false
            ],

            "Quel général français a lancé l'appel du 18 juin 1940 depuis Londres pour continuer la lutte contre l'Allemagne nazie ?" => [
                "Charles de Gaulle" => true,
                "Philippe Pétain" => false,
                "Jean Moulin" => false,
                "Georges Clemenceau" => false
            ],

            "Quelle est la date de la libération de Paris pendant la Seconde Guerre mondiale ?" => [
                "6 juin 1944" => false,
                "25 août 1944" => true,
                "8 mai 1945" => false,
                "9 novembre 1945" => false
            ],

            "Quel président de la République française a initié la construction du Centre Pompidou à Paris ?" => [
                "Charles de Gaulle" => false,
                "Georges Pompidou" => true,
                "Valéry Giscard d'Estaing" => false,
                "François Mitterrand" => false
            ],

            "Quel événement social et culturel secoue la France en mai 1968 ?" => [
                "La guerre d'Algérie" => false,
                "Le mouvement hippie" => false,
                "Les manifestations étudiantes et ouvrières" => true,
                "La coupe du monde de football" => false
            ]
        ]
    ];

        $slugger = new AsciiSlugger();

        foreach ($data as $themeText => $themeData) {
            $theme = new Theme();
            $theme->setText($themeText)
                  ->setSlug($slugger->slug($theme->getText())->lower());

            foreach ($themeData as $questionText => $questionData) {
                $question = new Question();
                $question->setText($questionText)
                         ->setSlug($slugger->slug($questionText));

                $manager->persist($question);

                $theme->addQuestion($question);

                foreach ($questionData as $textAnswer => $answerValue)
                {
                    $answer = new Answer();
                    $answer->setText($textAnswer)
                           ->setCorrect($answerValue);

                    $manager->persist($answer);

                    $question->addAnswer($answer);

                    $manager->persist($question);
                }
            }

            $manager->persist($theme);
        }

        $manager->flush();
    }
}
