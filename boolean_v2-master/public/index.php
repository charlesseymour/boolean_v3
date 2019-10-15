<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../inc/header.php';

if (isAuthenticated()) { $user_id = decodeJwt('sub'); }

?>


<div class="wrapper">


<header class="banner">

  <h1>Boolean Operator AND Tutorial</h1>
 
</header>

<div class="container boolean-options">
	<div class="row">
		<button type="button" class="btn btn-outline-dark btn-lg" onclick="makeSpread('and')">AND</button>
		<button type="button" class="btn btn-outline-dark btn-lg" onclick="makeSpread('or')">OR</button>
		<button type="button" class="btn btn-outline-dark btn-lg" onclick="makeSpread('not')">NOT</button>
	</div>
</div>

    <!--<div id="buttons">

      <button id="spread_button">Get my spread</button>

    </div>-->

    <div id="boolean">

    </div>

    <div id="output">


    </div>

    <span id="feedback">
      
    </span>
	
	<span id="submitButton">

	</span>

<script>

    // Define deck and subsets
	
    var deck = [{name:"Ace of spades", location:"../images/playing_cards/cards_resized/JPEG/ace_of_spades.jpg"}, {name:"Two of spades", location:"../images/playing_cards/cards_resized/JPEG/2_of_spades.jpg"}, {name:"Three of spades", location:"../images/playing_cards/cards_resized/JPEG/3_of_spades.jpg"}, {name:"Four of spades", location:"../images/playing_cards/cards_resized/JPEG/4_of_spades.jpg"}, {name:"Five of spades", location:"../images/playing_cards/cards_resized/JPEG/5_of_spades.jpg"}, {name:"Six of spades", location:"../images/playing_cards/cards_resized/JPEG/6_of_spades.jpg"}, {name:"Seven of spades", location:"../images/playing_cards/cards_resized/JPEG/7_of_spades.jpg"}, {name:"Eight of spades", location:"../images/playing_cards/cards_resized/JPEG/8_of_spades.jpg"}, {name:"Nine of spades", location:"../images/playing_cards/cards_resized/JPEG/9_of_spades.jpg"}, {name:"Ten of spades", location:"../images/playing_cards/cards_resized/JPEG/10_of_spades.jpg"},  {name:"Jack of spades", location:"../images/playing_cards/cards_resized/JPEG/jack_of_spades2.jpg"}, {name:"Queen of spades", location:"../images/playing_cards/cards_resized/JPEG/queen_of_spades2.jpg"}, {name:"King of spades", location:"../images/playing_cards/cards_resized/JPEG/king_of_spades2.jpg"}, {name:"Ace of clubs", location:"../images/playing_cards/cards_resized/JPEG/ace_of_clubs.jpg"}, {name:"Two of clubs", location:"../images/playing_cards/cards_resized/JPEG/2_of_clubs.jpg"}, {name:"Three of clubs", location:"../images/playing_cards/cards_resized/JPEG/3_of_clubs.jpg"}, {name:"Four of clubs", location:"../images/playing_cards/cards_resized/JPEG/4_of_clubs.jpg"}, {name:"Five of clubs", location:"../images/playing_cards/cards_resized/JPEG/5_of_clubs.jpg"}, {name:"Six of clubs", location:"../images/playing_cards/cards_resized/JPEG/6_of_clubs.jpg"}, {name:"Seven of clubs", location:"../images/playing_cards/cards_resized/JPEG/7_of_clubs.jpg"}, {name:"Eight of clubs", location:"../images/playing_cards/cards_resized/JPEG/8_of_clubs.jpg"}, {name:"Nine of clubs", location:"../images/playing_cards/cards_resized/JPEG/9_of_clubs.jpg"}, {name:"Ten of clubs", location:"../images/playing_cards/cards_resized/JPEG/10_of_clubs.jpg"}, {name:"Jack of clubs", location:"../images/playing_cards/cards_resized/JPEG/jack_of_clubs2.jpg"}, {name:"Queen of clubs", location:"../images/playing_cards/cards_resized/JPEG/queen_of_clubs2.jpg"}, {name:"King of clubs", location:"../images/playing_cards/cards_resized/JPEG/king_of_clubs2.jpg"}, {name:"Ace of hearts", location:"../images/playing_cards/cards_resized/JPEG/ace_of_hearts.jpg"}, {name:"Two of hearts", location:"../images/playing_cards/cards_resized/JPEG/2_of_hearts.jpg"}, {name:"Three of hearts", location:"../images/playing_cards/cards_resized/JPEG/3_of_hearts.jpg"}, {name:"Four of hearts", location:"../images/playing_cards/cards_resized/JPEG/4_of_hearts.jpg"}, {name:"Five of hearts", location:"../images/playing_cards/cards_resized/JPEG/5_of_hearts.jpg"}, {name:"Six of hearts", location:"../images/playing_cards/cards_resized/JPEG/6_of_hearts.jpg"}, {name:"Seven of hearts", location:"../images/playing_cards/cards_resized/JPEG/7_of_hearts.jpg"}, {name:"Eight of hearts", location:"../images/playing_cards/cards_resized/JPEG/8_of_hearts.jpg"}, {name:"Nine of hearts", location:"../images/playing_cards/cards_resized/JPEG/9_of_hearts.jpg"}, {name:"Ten of hearts", location:"../images/playing_cards/cards_resized/JPEG/10_of_hearts.jpg"}, {name:"Jack of hearts", location:"../images/playing_cards/cards_resized/JPEG/jack_of_hearts2.jpg"}, {name:"Queen of hearts", location:"../images/playing_cards/cards_resized/JPEG/queen_of_hearts2.jpg"}, {name:"King of hearts", location:"../images/playing_cards/cards_resized/JPEG/king_of_hearts2.jpg"}, {name:"Ace of diamonds", location:"../images/playing_cards/cards_resized/JPEG/ace_of_diamonds.jpg"}, {name:"Two of diamonds", location:"../images/playing_cards/cards_resized/JPEG/2_of_diamonds.jpg"}, {name:"Three of diamonds", location:"../images/playing_cards/cards_resized/JPEG/3_of_diamonds.jpg"}, {name:"Four of diamonds", location:"../images/playing_cards/cards_resized/JPEG/4_of_diamonds.jpg"}, {name:"Five of diamonds", location:"../images/playing_cards/cards_resized/JPEG/5_of_diamonds.jpg"}, {name:"Six of diamonds", location:"../images/playing_cards/cards_resized/JPEG/6_of_diamonds.jpg"}, {name:"Seven of diamonds", location:"../images/playing_cards/cards_resized/JPEG/7_of_diamonds.jpg"}, {name:"Eight of diamonds", location:"../images/playing_cards/cards_resized/JPEG/8_of_diamonds.jpg"}, {name:"Nine of diamonds", location:"../images/playing_cards/cards_resized/JPEG/9_of_diamonds.jpg"}, {name:"Ten of diamonds", location:"../images/playing_cards/cards_resized/JPEG/10_of_diamonds.jpg"}, {name:"Jack of diamonds", location:"../images/playing_cards/cards_resized/JPEG/jack_of_diamonds2.jpg"}, {name:"Queen of diamonds", location:"../images/playing_cards/cards_resized/JPEG/queen_of_diamonds2.jpg"}, {name:"King of diamonds", location:"../images/playing_cards/cards_resized/JPEG/king_of_diamonds2.jpg"}];
    
    var redCards = ["Ace of hearts", "Two of hearts", "Three of hearts", "Four of hearts", "Five of hearts", "Six of hearts", "Seven of hearts", "Eight of hearts", "Nine of hearts", "Ten of hearts", "Jack of hearts", "Queen of hearts", "King of hearts", "Ace of diamonds", "Two of diamonds", "Three of diamonds", "Four of diamonds", "Five of diamonds", "Six of diamonds", "Seven of diamonds", "Eight of diamonds", "Nine of diamonds", "Ten of diamonds", "Jack of diamonds", "Queen of diamonds", "King of diamonds"]
    
    var blackCards = ["Ace of spades", "Two of spades", "Three of spades", "Four of spades", "Five of spades", "Six of spades", "Seven of spades", "Eight of spades", "Nine of spades", "Ten of spades", "Jack of spades", "Queen of spades", "King of spades", "Ace of clubs", "Two of clubs", "Three of clubs", "Four of clubs", "Five of clubs", "Six of clubs", "Seven of clubs", "Eight of clubs", "Nine of clubs", "Ten of clubs", "Jack of clubs", "Queen of clubs", "King of clubs"];
    
    var clubCards = ["Ace of clubs", "Two of clubs", "Three of clubs", "Four of clubs", "Five of clubs", "Six of clubs", "Seven of clubs", "Eight of clubs", "Nine of clubs", "Ten of clubs", "Jack of clubs", "Queen of clubs", "King of clubs"];
    
    var spadeCards = ["Ace of spades", "Two of spades", "Three of spades", "Four of spades", "Five of spades", "Six of spades", "Seven of spades", "Eight of spades", "Nine of spades", "Ten of spades", "Jack of spades", "Queen of spades", "King of spades"]
    
    var heartCards = ["Ace of hearts", "Two of hearts", "Three of hearts", "Four of hearts", "Five of hearts", "Six of hearts", "Seven of hearts", "Eight of hearts", "Nine of hearts", "Ten of hearts", "Jack of hearts", "Queen of hearts", "King of hearts"];
    
    var diamondCards = ["Ace of diamonds", "Two of diamonds", "Three of diamonds", "Four of diamonds", "Five of diamonds", "Six of diamonds", "Seven of diamonds", "Eight of diamonds", "Nine of diamonds", "Ten of diamonds", "Jack of diamonds", "Queen of diamonds", "King of diamonds"];
    
    var oddCards = ["Ace of spades", "Three of spades", "Five of spades", "Seven of spades", "Nine of spades", "Ace of clubs", "Three of clubs", "Five of clubs", "Seven of clubs", "Nine of clubs", "Ace of hearts", "Three of hearts", "Five of hearts", "Seven of hearts", "Nine of hearts", "Ace of diamonds", "Three of diamonds", "Five of diamonds", "Seven of diamonds", "Nine of diamonds"];
    
    var evenCards = ["Two of spades", "Four of spades", "Six of spades", "Eight of spades", "Ten of spades", "Two of clubs", "Four of clubs", "Six of clubs", "Eight of clubs", "Ten of clubs", "Two of hearts", "Four of hearts", "Six of hearts", "Eight of hearts", "Ten of hearts", "Two of diamonds", "Four of diamonds", "Six of diamonds", "Eight of diamonds", "Ten of diamonds"];
    
    var faceCards = ["Jack of spades", "Queen of spades", "King of spades", "Jack of clubs", "Queen of clubs", "King of clubs", "Jack of hearts", "Queen of hearts", "King of hearts", "Jack of diamonds", "Queen of diamonds", "King of diamonds"];
    
    var numberCards = ["Ace of spades", "Two of spades", "Three of spades", "Four of spades", "Five of spades", "Six of spades", "Seven of spades", "Eight of spades", "Nine of spades", "Ten of spades", "Ace of clubs", "Two of clubs", "Three of clubs", "Four of clubs", "Five of clubs", "Six of clubs", "Seven of clubs", "Eight of clubs", "Nine of clubs", "Ten of clubs", "Ace of hearts", "Two of hearts", "Three of hearts", "Four of hearts", "Five of hearts", "Six of hearts", "Seven of hearts", "Eight of hearts", "Nine of hearts", "Ten of hearts", "Ace of diamonds", "Two of diamonds", "Three of diamonds", "Four of diamonds", "Five of diamonds", "Six of diamonds", "Seven of diamonds", "Eight of diamonds", "Nine of diamonds", "Ten of diamonds"];
    
    // Define facets of cards to be used in generating booleans
    var facets=[{name:"red", subset:redCards}, {name:"black", subset:blackCards}, {name:"club", subset:clubCards}, {name:"spade", subset:spadeCards}, {name:"heart", subset:heartCards}, {name:"diamond", subset:diamondCards}, {name:"odd", subset:oddCards}, {name:"even", subset:evenCards}, {name:"face card", subset:faceCards}, {name:"number card", subset:numberCards}];

	//var buttonEl = document.getElementById("spread_button"); // test
	//buttonEl.addEventListener("click", onButtonClick); // test
	
	// Select Boolean operator 
	//var operator = 'and';
	/*$(".btn-group-toggle label").on("click", function() {
		//var filteringType = ""
		operator = $(this).attr('name');
		onButtonClick(operator);
	});*/

    // Button to generate spread and Boolean statement
    //var buttonEl = document.getElementById("spread_button");
    var makeSpread = function(operator) {
	  //alert(operator);
      //document.getElementById("spread_button").innerHTML = "New spread";
      document.getElementById("boolean").innerHTML = " ";
      document.getElementById("output").innerHTML = " ";
      document.getElementById("feedback").innerHTML = " ";
	  document.getElementById("submitButton").innerHTML = " ";
      var answers = [ ];
      var correct = [ ];
      var dealt = [ ];
      var spread = [ ];
      var correctInSpread = [ ];
      var randomNumber1 = Math.floor(Math.random()*10);
      var randomNumber2 = Math.floor(Math.random()*10);
      var left_hand = facets[randomNumber1].name;
      var right_hand = facets[randomNumber2].name;
      var leftAnswer = facets[randomNumber1].subset;
      var rightAnswer = facets[randomNumber2].subset;
      // Determine all cards from the entire deck that match the boolean statement
	  if (operator == 'and') {
		  if (leftAnswer.length <= rightAnswer.length) {
			for (i = 0; i < leftAnswer.length; i++) {
			  if (rightAnswer.indexOf(leftAnswer[i]) !== -1) {
				  correct.push(leftAnswer[i])
			  } 
			}
		  } else {
			for (i = 0; i < rightAnswer.length; i++) {
			  if (leftAnswer.indexOf(rightAnswer[i]) !== -1) {
				correct.push(rightAnswer[i])
			  } 
			};
		  };
	  } else if (operator == 'or') {
		  for (answer of leftAnswer) {
			  correct.push(answer);
		  }
		  for (answer of rightAnswer) {
			  if (!correct.includes(answer)) {
				  correct.push(answer);
			  }
		  }
	  } else {
		  correct = leftAnswer.filter( function( el ) {
			  return rightAnswer.indexOf( el ) < 0;
		  });
	  }
      // Print boolean statement
      var x = document.createElement("P");
      var t = document.createTextNode("Boolean statement" + " " + ":" + " " + left_hand + 
									  " " + operator + " " + right_hand);
      x.appendChild(t);
      document.getElementById("boolean").appendChild(x);
	  //create 21 card spread
      for (i = 0; i < 21; i++) {
        var randomNumber = Math.floor(Math.random()*52);
        var card = deck[randomNumber].name;
        //optional code for generating rows of 4 cards each
		/*var rowNumber = i % 4;
        if (rowNumber === 0) {
          var row = document.createElement("p");
		  var element = document.getElementById("output");
          element.appendChild(row);
        }*/
        if (dealt.indexOf(card) === -1) {
          var x = document.createElement("IMG");
		  x.setAttribute("src", deck[randomNumber].location);
		  x.setAttribute("alt", deck[randomNumber].name);
		  x.style.margin = "0.5%";
		  x.style.border = "5px solid transparent";
		  x.style.borderRadius = "10px";
		  x.style.cursor = "pointer";
		  document.body.appendChild(x);
          //when cards are clicked, they are highlighted and sent to the answers array
		  x.onclick = function() {
			if (this.style.border === "5px solid gold")     
            {this.style.borderColor = "transparent";
			 var index = answers.indexOf(this.alt);
             answers.splice(index, 1);
            } else {this.style.border = "5px solid gold";
			this.style.borderRadius = "10px";
			answers.push(this.alt);                    
            }
          }
		  document.getElementById("output").appendChild(x);             
		  dealt.push(card);
        } else {
          //dealt.push(card);
          i = i - 1;
        }
      }
      //submit button checks answers
	  var lineBreak = document.createElement("p");
      document.getElementById("output").appendChild(lineBreak);
      var submit_button = document.createElement('button');
	  document.getElementById("submitButton").appendChild(submit_button);
	  submit_button.style.display = "inline";
	  submit_button.style.marginTop = "20%";
      submit_button.innerHTML = 'Submit answer'; 
      submit_button.addEventListener("click", myFunction);
      function myFunction() {
        //clear previous correctInSpread
        correctInSpread = [];      
        //create correctInSpread
        for (i = 0; i < dealt.length; i++) {
          if (correct.indexOf(dealt[i]) !== -1) {
            correctInSpread.push(dealt[i]);
            
          }
        }
        //compare correctInSpread with answers
         correctInSpread.sort();
         answers.sort();
         var is_same = correctInSpread.length == answers.length && correctInSpread.every(function(element, index) {
          return element === answers[index]; 
        });
		// if logged in, add the play to the database
		<?php if (isAuthenticated()): ?>
			var date = Date.now();
			var mode = "and";
			var win = (is_same === true) ? 1 : 0;
			var user_id = "<?php echo $user_id ?>";
			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'insertPlay.php', true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.onreadystatechange = function() { 
				if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
					return;
				}
			}
			xhr.send("date=" + date + "&mode=" + mode + "&win=" + win + "&user_id=" + user_id);
		<?php endif ?>
		feedback.innerHTML = " ";
		submitButton.innerHTML = " ";
		var response = document.createElement("span");
		response.style.fontWeight = "bold";
		document.getElementById("feedback").appendChild(response);
		var cards = document.getElementsByTagName("IMG");
		for (const card of cards) {
			card.onclick = null;
		}
        if (is_same === true) {
			response.innerHTML = "Correct!  To play again, click the New Spread button.";
		} else {
			for (const card of cards) {
				if (correctInSpread.includes(card.getAttribute("alt"))) {
					card.style.borderColor = "green";
				} else {
					card.style.opacity = "0.2";
				}
			}
			response.innerHTML = "Sorry. Cards that match the Boolean (if any) are highlighted.  To play again, click the New Spread button.";
        }
      }
    }

    //buttonEl.addEventListener("click", onButtonClick); 






  </script>




<footer class="site-footer">

</footer>





</div> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>