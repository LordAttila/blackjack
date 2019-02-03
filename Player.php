<?php
namespace blackjack;

class Player{
    //Sum score of cards in hand
    private $score;
    //Cards in hand
    private $cards = array();
    //Player name
    public $name;

    function __construct($name){
        $this->name = $name;
    }

    //Draw a card from the deck
    public function draw(&$deck){
        $drawnCard = end($deck);
        array_push($this->cards, $drawnCard);
        array_pop($deck);
        $this->score += $drawnCard['pointValue'];
    }

    //Show what cards have in the hand of the player.
    public function showHand(){
        $out = "<p>" . $this->name . ": ";
        foreach ($this->cards as $card) {
            $out .= $card['value'] . " ";
        }
        $out .= "</p>";
        echo $out;
    }

    /**
     * Get the value of score
     */ 
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @return  self
     */ 
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }
}