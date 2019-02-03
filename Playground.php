<?php
namespace blackjack;

include "Deck.php";
include "Player.php";

class Playground{

    function __construct(){
        $deck = new Deck();
        $deck = $deck->cards;
        
        $sam = new Player("Sam");
        $dealer = new Player("Dealer");

        for ($i=0; $i < 2; $i++) { 
            $sam->draw($deck);
            $sam->showHand();
            $dealer->draw($deck);
            $dealer->showHand();
        }

        if($sam->getScore() == 21){
            if($dealer->getScore() == 21){
                die("<p>" . $sam->name . " won!</p>");
            }
        }
        elseif ($sam->getScore() == 22 && $dealer->getScore() == 22) {
            die("<p>" . $dealer->name . " won!</p>");
        }

        //sam must stop drawing cards from the deck if their total reaches 17 or higher
        while ($sam->getScore() <= 17) {
            $sam->draw($deck);
            $sam->showHand();
            //sam has lost the game if their total is higher than 21 
            if ($sam->getScore() > 21) {
                echo "<p>" . $sam->name . " lost!</p>";
            }
        }

        //when sam has stopped drawing cards the dealer can start drawing cards from the top of the deck
        //the dealer must stop drawing cards when their total is higher than sam
        while ($dealer->getScore() < $sam->getScore() && $dealer->getScore() < 21 && $sam->getScore() <= 21) {
            $dealer->draw($deck);
            $dealer->showHand();
            if ($dealer->getScore() > 21) {
                echo "<p>" . $dealer->name . " lost!</p>";
                die("<p>" . $sam->name . " won!</p>");
            }
        }

        //If both player have equal score or Sam lost, then the Dealer win
        //Remark: This case was not defined in the specification what happens if both player have equal score.
        die("<p>" . $dealer->name . " won!</p>");
        
    }
    
}