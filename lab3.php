<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        
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
        
        
        function generateDeck() {
            $cards = array(); 
        
            for ($i = 0; $i < 52; $i++) {
                array_push($cards, $i); 
            }
            
            
            shuffle($cards); 
            
            return $cards; 
 
        }
        
        
        function printDeck($deck) {
            for ($i = 0; $i < count($deck); $i++) {
                $cardNum = $deck[$i]; // number between 0 and 51
                $card = mapNumberToCard($cardNum); 
                echo "<img src='".$card["imgURL"]."'>"; 
            }
        }
        
        $needToPop = 0;
        // Return a specific number of cards
        function generateHand($deck) {
            $hand = array(); 
            global $needToPop;
            do {
                $cardNum = array_pop($deck);
                $card = mapNumberToCard($cardNum);
                $total +=  $card['num'];
                $needToPop += 1;
                array_push($hand, $card);
            } while ($total < 35);
            
            return $hand; 
        }
        
       
        $deck = generateDeck();

        
        
        // function that generates a "hand" of cards for one person (no duplicates)
        
        
            
        $person0 = array(
            "name" => "Ravi", 
            "profilePicUrl" => "./profile_pics/ravi.png",
            "cards" => generateHand($deck)
            );
 
        while ( $needToPop > 0)
        {
            array_pop($deck);
            $needToPop -= 1;
        }
        
        $person1 = array(
            "name" => "Pete", 
            "profilePicUrl" => "./profile_pics/pete.png", 
            "cards" => generateHand($deck)
            );
            
        while ( $needToPop > 0)
        {
            array_pop($deck);
            $needToPop -= 1;
        }
        
        $person2 = array(
            "name" => "John", 
            "profilePicUrl" => "./profile_pics/john.png", 
            "cards" => generateHand($deck)
            );  
            
        while ( $needToPop > 0)
        {
            array_pop($deck);
            $needToPop -= 1;
        }
        
        $person3 = array(
            "name" => "Harlen", 
            "profilePicUrl" => "./profile_pics/harlen.png", 
            "cards" => generateHand($deck)
            ); 
            
        while ( $needToPop > 0)
        {
            array_pop($deck);
            $needToPop -= 1;
        }
        
        
        //array_pop($deck);
        //printDeck($deck);
        //echo "<br>";
            
            function displayPerson($person) {
                // show profile pic
                echo "<img src='".$person["profilePicUrl"]."'width: 30%>"; 
                
                
                // iterate through $person's "cards"
                
                for($i = 0; $i < count($person["cards"]); $i++) {
                    $card = $person["cards"][$i];
                    
                    // construct the imgURL for each card
                    
                    // translate this to HTML 
                    echo "<img src='".$card["imgURL"]."'>"; 
                }
                
                echo calculateHandValue($person["cards"]);
                echo "<br><br>";
            }
            
            function calculateHandValue($cards) {
                $sum = 0; 
                
                foreach ($cards as $card) {
                    $sum += $card["num"]; 
                }
                
                return $sum; 
            }
            
            displayPerson($person0); 
            echo "<br>";
            displayPerson($person1); 
            echo "<br>";
            displayPerson($person2); 
            echo "<br>";
            displayPerson($person3); 
            echo "<br>";
            
            
            function winner() {
                global $person0, $person1, $person2, $person3;
                
                $pep = array(0,0,0,0,0);
                $perso0 = calculateHandValue($person0["cards"]);
                $perso1 = calculateHandValue($person1["cards"]);
                $perso2 = calculateHandValue($person2["cards"]);
                $perso3 = calculateHandValue($person3["cards"]);
                $winner = 0;
                $winNum = 0;
                
                //echo ${'perso'.$winNum};
    
    
                for($ii=0;$ii<=3;$ii++){ 
                    //echo ${'perso'.$ii}."<br>";
                    
                    if ($winner<${'perso'.$ii} && ${'perso'.$ii}<43)
                    {
                        $winner = ${'perso'.$ii};
                        $winNum = $ii;
                    }
                }
                
                echo "<h2>Winner is " . ${'person'.$winNum}['name'] . " <img src='".${'person'.$winNum}["profilePicUrl"]."'width: 30%>";
                
                for($ii=0;$ii<=3;$ii++){
                    if (${'perso'.$ii} == $winner && $ii != $winNum){
                        echo ", " . ${'person'.$ii}['name'] . " is also a winner! <img src='".${'person'.$ii}["profilePicUrl"]."'width: 30%> </h2>";
                    }
                }
                
            }
            
            winner();
            
        ?>
    </body>
</html>