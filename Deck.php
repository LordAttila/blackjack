<?php
namespace blackjack;

include "Card.php";

class Deck{
    //Cards in the deck;
    public $cards = array();
    //self explaining
    private $suits = array("Clubs", "Diamonds", "Hearts", "Spades");
    //self explaining
    private $figures = array("Jack", "Queen", "King", "Ace");

    function __construct(){
        $this->generateCards();
        //$this->shuffleThe($this->cards);
        shuffle($this->cards);
    }

    //Add a single card to the deck.
    public function addCard($card){
        array_push($this->cards, $card);
    }

    //Fill the deck with cards.
    public function generateCards(){
        //cards for every suit
        //numbers 2-10 + Ace, Jack, Queen, King = 13 per suit
        foreach ($this->suits as $suit) {

            //the numbers
            for ($i=2; $i <= 10; $i++) { 
                $card = new Card();
                array_push($this->cards, $card->createCard($suit, $i));
            }

            //the figures
            foreach ($this->figures as $figure){
                array_push($this->cards, $card->createCard($suit, $figure));
            }
        }
    }

}