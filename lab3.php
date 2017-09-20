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
                echo "imgURL: ".$card["imgURL"]."<br>"; 
            }
        }
        
        // Return a specific number of cards
        function generateHand($deck) {
            $hand = array(); 
            
            for ($i = 0; $i < 4; $i++) {
                $cardNum = array_pop($deck);
                $card = mapNumberToCard($cardNum); 
                array_push($hand, $card); 
            }
            
            return $hand; 
        }
        
       
        $deck = generateDeck();
        $deck1 = generateDeck();
         $deck2 = generateDeck();
          $deck3 = generateDeck();
        //printDeck($deck); 
        
        
        
        // function that generates a "hand" of cards for one person (no duplicates)
        
        
            
        $person = array(
<<<<<<< HEAD
            "name" => "Ravi", 
            "profilePicUrl" => "./profile_pics/ravi.png", 
=======
            "name" => "Pete", 
            "profilePicUrl" => "./profile_pics/pete.png", 
>>>>>>> cc6b6e6aca327e041f36d142804532309cdf47d7
            "cards" => generateHand($deck)
            );
        $person2 = array(
            "name" => "Deron", 
            "profilePicUrl" => "./profile_pics/deron.png", 
            "cards" => generateHand($deck)
            );
        $person3 = array(
            "name" => "John", 
            "profilePicUrl" => "./profile_pics/john.png", 
            "cards" => generateHand($deck)
            );
        $person4 = array(
            "name" => "Harlen", 
            "profilePicUrl" => "./profile_pics/harlen.png", 
            "cards" => generateHand($deck)
            );
            
                
         $person1 = array(
            "name" => "pete", 
            "profilePicUrl" => "./profile_pics/pete.png", 
            "cards" => generateHand($deck1)
            );       
           
         $person2 = array(
            "name" => "John", 
            "profilePicUrl" => "./profile_pics/john.png", 
            "cards" => generateHand($deck2)
            );  
            
        $person3 = array(
            "name" => "harlen", 
            "profilePicUrl" => "./profile_pics/harlen.png", 
            "cards" => generateHand($deck3)
            ); 
            
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
            
            
            function displayPerson1($person1) {
                // show profile pic
                echo "<img src='".$person1["profilePicUrl"]."'width: 30%>"; 
                
                
                // iterate through $person's "cards"
                
                for($i = 0; $i < count($person1["cards"]); $i++) {
                    $card = $person1["cards"][$i];
                    
                    // construct the imgURL for each card
                    
                    // translate this to HTML 
                    echo "<img src='".$card["imgURL"]."'>"; 
                }
                
                echo calculateHandValue($person1["cards"]); 
            }
            
            function displayPerson2($person2) {
                // show profile pic
                echo "<img src='".$person2["profilePicUrl"]."'width: 30%>"; 
                
                
                // iterate through $person's "cards"
                
                for($i = 0; $i < count($person2["cards"]); $i++) {
                    $card = $person2["cards"][$i];
                    
                    // construct the imgURL for each card
                    
                    // translate this to HTML 
                    echo "<img src='".$card["imgURL"]."'>"; 
                }
                
                echo calculateHandValue($person2["cards"]); 
            }
            
            function displayPerson3($person3) {
                // show profile pic
                echo "<img src='".$person3["profilePicUrl"]."'width: 30%>"; 
                
                
                // iterate through $person's "cards"
                
                for($i = 0; $i < count($person3["cards"]); $i++) {
                    $card = $person3["cards"][$i];
                    
                    // construct the imgURL for each card
                    
                    // translate this to HTML 
                    echo "<img src='".$card["imgURL"]."'>"; 
                }
                
                echo calculateHandValue($person3["cards"]); 
            }
            
            
            function calculateHandValue($cards) {
                $sum = 0; 
                
                foreach ($cards as $card) {
                    $sum += $card["num"]; 
                }
                
                return $sum; 
            }
            
<<<<<<< HEAD
            displayPerson($person); 
            echo "<br>";
            displayPerson1($person1); 
            echo "<br>";
            displayPerson2($person2); 
            echo "<br>";
            displayPerson3($person3); 
                    
           
           
           
           
           
                $winner =calculateHandValue($person["cards"]);
                $perso1 = calculateHandValue($person1["cards"]);
                $perso2 = calculateHandValue($person2["cards"]);
                $perso3 = calculateHandValue($person3["cards"]);
              

                for($ii=1;$ii<4;$ii++){ 
                    echo "$perso.[$ii]";
                    
                    if ($winner<$perso[ii])
                    {
                        $winner = $perso[$ii];
                         echo "<h2>Winner is . $winner</h2>";
                    }
                }
                echo "<br>";
                echo "<h2>Winner is . $winner</h2>";
=======
            displayPerson($person);
            displayPerson($person2);
            displayPerson($person3);
            displayPerson($person4);
            
>>>>>>> cc6b6e6aca327e041f36d142804532309cdf47d7
            
        
        ?>
    </body>
</html>