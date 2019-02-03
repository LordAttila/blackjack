<?php
namespace blackjack;

class Card{
    //Suit of the card. e.g.: Spades (S).
    private $suit;
    //"number" of the card. Can be 1-10 or Ace, Jack, Queen, King.
    private $number;
    //The point value of the card. E.g.: Clubs Ace (A) = 11.
    private $pointValue;
    //The value of the card. E.g.: Diamonds 7 = D7.
    private $value;

    function __construct(){
        
    }

    //Create a single card
    public function createCard($suit, $number){
        $this->number = $number;
        if (gettype($suit) == "string" ) {
            $this->suit = $suit;
            if (gettype($number) == "integer") {
                $this->pointValue = $number;
            }
            elseif(gettype($number == "string") && $number != "Ace"){
                $this->pointValue = 10;
            }
            else{
                $this->pointValue = 11;
            }
        }

        if (gettype($number) == "string") {
            $this->value = substr($suit, 0, 1).substr($number, 0, 1);
        }
        else{
            $this->value = substr($suit, 0, 1)."$number";
        }
        
        $card = array('pointValue' => $this->pointValue, 'value' => $this->value);
        return($card);
    }
}