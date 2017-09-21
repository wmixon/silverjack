<!DOCTYPE html>
<html>
    <head>
        <title>Lab 3: Silverjack</title>
        <link rel="stylesheet" href="/silverjack/css/Styles.css" type="text/css" /> 
    </head>
    <body>
        <main>
            <div id="wrapper">
                <h1>
                    Silverjack
                </h1>
                
            </div>
            <div>
        <?php 
        // Generate a deck of cards 
        // [0, 1, 2, ..., 51]
        // map each number to a card 
        // generate a "hand" of cards
        function mapNumberToCard($num) {
            $cardValue = ($num % 13) + 1; 
            $cardSuit = floor($num / 13); 
            $suitStr = "";
            switch($cardSuit) {
                case 0: 
                    $suitStr = "clubs"; 
                    break; 
                case 1: 
                    $suitStr = "diamonds"; 
                    break; 
                case 2: 
                    $suitStr = "hearts"; 
                    break; 
                case 3: 
                    $suitStr = "spades"; 
                    break; 
            }
            $card = array(
                'num' => $cardValue, 
                'suit' => $cardSuit, 
                'imgURL' => "./cards/".$suitStr."/".$cardValue.".png"
                ); 
            return $card; 
        }
        // Creates deck of 52 cards
        function generateDeck() {
            $cards = array(); 
            for ($i = 0; $i < 52; $i++) {
                array_push($cards, $i); 
            }
            shuffle($cards);
            return $cards; 
        }
        // A function for printing the deck unused
        function printDeck($deck) {
            for ($i = 0; $i < count($deck); $i++) {
                $cardNum = $deck[$i]; // number between 0 and 51
                $card = mapNumberToCard($cardNum); 
                echo "<img src='".$card["imgURL"]."'>"; 
            }
        }
        // Return a specific number of cards
        function generateHand($deck) {
            $hand = array(); 
            global $deck;   // Needed so cards are actually popped
            do {
                $cardNum = array_pop($deck);
                $card = mapNumberToCard($cardNum);
                $total +=  $card['num'];

                array_push($hand, $card);
            } while ($total < 35);  // So will choose more cards until more than 35
            return $hand; 
        }
        // Displays person picture, cards, and value of hand
        function displayPerson($person) {
            // show profile pic
            echo "<h2><img src='".$person["profilePicUrl"]."'width: 30%>"; 
            // iterate through $person's "cards"
            for($i = 0; $i < count($person["cards"]); $i++) {
                $card = $person["cards"][$i];
                // construct the imgURL for each card
                // translate this to HTML 
                echo "<img src='".$card["imgURL"]."'> "; 
            }
            echo calculateHandValue($person["cards"]);
            echo "</h2>";
        }
        // Calculates values of hand
        function calculateHandValue($cards) {
            $sum = 0;
            foreach ($cards as $card) {
                $sum += $card["num"]; 
            }
            return $sum; 
        }
        //Displays the winner
        function winner() {
            global $person0, $person1, $person2, $person3;  // Globals needed to transer arrays
            $pep = array(0,0,0,0,0);
            $perso0 = calculateHandValue($person0["cards"]);
            $perso1 = calculateHandValue($person1["cards"]);
            $perso2 = calculateHandValue($person2["cards"]);
            $perso3 = calculateHandValue($person3["cards"]);
            $winner = 0;
            $winNum = 0;
            $total = $perso0 + $perso1 + $perso2 + $perso3;
            for($ii=0;$ii<=3;$ii++){ 
                if ($winner<${'perso'.$ii} && ${'perso'.$ii}<43)
                {
                    $winner = ${'perso'.$ii};
                    $winNum = $ii;
                }
            }
            echo "<h3>" . ${'person'.$winNum}['name'] . " wins " . ($total - ${'perso'.$winNum}) . " points!<br>";
            for($ii=0;$ii<=3;$ii++){
                if (${'perso'.$ii} == $winner && $ii != $winNum){
                    echo ${'person'.$ii}['name'] . " also wins " . ($total - ${'perso'.$ii}) . " points!<br>";
                }
            }
            echo "</h3>";
        }
        // Generaters deck 
        $deck = generateDeck();
        // Generates each person
        $person0 = array(
            "name" => "Ravi", 
            "profilePicUrl" => "./profile_pics/ravi.png",
            "cards" => generateHand($deck)
            );
        $person1 = array(
            "name" => "Westley", 
            "profilePicUrl" => "./profile_pics/westley.png", 
            "cards" => generateHand($deck)
            );
        $person2 = array(
            "name" => "Shaikh", 
            "profilePicUrl" => "./profile_pics/shaikh.png", 
            "cards" => generateHand($deck)
            );  
        $person3 = array(
            "name" => "Gabe", 
            "profilePicUrl" => "./profile_pics/gabe.png", 
            "cards" => generateHand($deck)
            ); 
        // Shuffles order everyone is displayed in
        $randomDisplay = array(0,1,2,3);
        shuffle($randomDisplay);
        // Displays each person
        displayPerson(${'person'.$randomDisplay[0]});
        displayPerson(${'person'.$randomDisplay[1]});
        displayPerson(${'person'.$randomDisplay[2]});
        displayPerson(${'person'.$randomDisplay[3]});
        // Shows winner
        winner();
            
        ?>
    </div>    
        </main>
        <br>
        <br>
        <br>
        <form>
            <center><button type="submit" onclick="<?php displayPerson() ?>" name="displayresult" id="button">Play Again</button></center>
        </form>
        <br>
        <br>
        <div id="footer">
            <footer>&copy; Singh, Mixon, Gaerlan, Sultani 2017. <br/> Disclaimer: The information on this page might not be accurate. It's used for academic purposes. <br/>
        <img src="csumb-logo.png" alt="CSUMB Logo" /></footer>
        </div>
    </body>
</html>