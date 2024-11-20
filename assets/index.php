<?php
include 'frame.php';
session_start( ); 

function IsCG() {
	return ((isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], "cg")) || isset($_GET["cg"]));
}

function IsMS() {
	if ((isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], "ms")) || isset($_GET["ms"])) return true;
	if ((isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], "msstart_sdk_init")) || isset($_GET["msstart_sdk_init"])) return true;
	// Check if Referral URL exists
	return false;
}


?>
	<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">

	<title>FOOTBALL BROS! | Official Site</title>
	
	<meta name="description" content="Online multiplayer football! Bone crushing hits, long bombs, and tons more!" />
	<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="shortcut icon" type="image/png" href="./favicon.png">
	<meta name="Keywords" content="Football, Play, Free, Online, Multiplayer, Games, IO, Sports, Scrolling, Friends">
	<meta name="author" content="Blue Wizard Digital">	
	
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://footballbros.io" />
	<meta property="og:title" content="Football Bros" />
	<meta property="og:description" content="Online multiplayer football! Bone crushing hits, long bombs, and tons more!" />
	<meta property="og:image" content="https://footballbros.io/splash.jpg" />
	<link rel="manifest" href="manifest.json">

	
	<script type="text/javascript" src="./FootballBros.js?th=113"></script>
	
	<script>
		window.addEventListener ("touchmove", function (event) { event.preventDefault (); }, { capture: false, passive: false });
		if (typeof window.devicePixelRatio != 'undefined' && window.devicePixelRatio > 2) {
			var meta = document.getElementById ("viewport");
			meta.setAttribute ('content', 'width=device-width, initial-scale=' + (2 / window.devicePixelRatio) + ', user-scalable=no');
		}
		window.addEventListener('keydown', function(e) {
  			if( (e.keyCode == 32|| e.keyCode == 38 || e.keyCode == 40) && e.target == document.body) {
    		e.preventDefault();
  		}
		});		
		var aCo = '<?php echo $_SERVER["HTTP_CF_IPCOUNTRY"];?>';
	</script>
	
	<style>
		html,body { margin: 0; padding: 0; height: 100%; background: #000000; color: orange; height: 100%; width: 100%; height: 100vh; width: 100vw; margin:0; padding:0;}
		.body::-webkit-scrollbar { /* WebKit */
 			width: 0px;
		}
		#openfl-content { background: #000000; width: 100%; height: 100%; }
		#spinner {
			-webkit-transform-origin: 50% 50%; 
			-moz-transform-origin: 50% 50%; 
			-o-transform-origin: 50% 50%; 
			transform-origin: 50% 50%;
			 width: 82px; 
			 height: 81px;
			-webkit-animation: spin1 2s infinite linear;
			-moz-animation: spin1 2s infinite linear;
			-o-animation: spin1 2s infinite linear;
			-ms-animation: spin1 2s infinite linear;
			animation: spin1 2s infinite linear;
		}




		/* Main content styling */
		#more {
			display: flex;
			justify-content: space-between;
			background-color: #1a1a1a;
			padding: 40px;
			border-top: 0px solid #444;
			color: #fff;
			font-family: 'Arial', sans-serif;
		}

		.info-box {
			width: 48%;
			background-color: #222;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
		}

		h3 {
			font-size: 24px;
			color: #ffa500; /* Football-themed color */
			margin-bottom: 15px;
		}

		p, b {
			line-height: 1.6;
			font-size: 16px;
		}

		p {
			margin-bottom: 10px;
		}

		b {
			color: #ffd700; /* Highlighted question color */
		}

		.notch-top-left {
			width: 20px;
			height: 20px;
			background-color: var(--background-color, #1a1a1a);
			position: absolute;
			top: -10px;
			left: -10px;
			clip-path: polygon(100% 0, 0 100%, 100% 100%);
		}

		/* Footer styling */
		footer {
			background-color: #000;
			padding: 20px 0;
			text-align: center;
			color: #ccc;
			font-size: 14px;
			border-top: 2px solid #444;
			margin-top: 40px;
			font-family: 'Arial', sans-serif;
			border: 0;
		}

		.footer-links a {
			color: #888;
			text-decoration: none;
			margin: 0 10px;
			transition: color 0.3s ease;
		}

		.footer-links a:hover {
			color: #ffa500; /* Football-themed hover color */
		}
  	</style>


	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-GREB63PWEL"></script>

	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	if(location.hostname != "localhost") gtag('config', 'G-GREB63PWEL', { cookie_flags: 'secure;samesite=none' });
	</script>

<?php
		if(IsCG()) {
	?>
		<script src="https://sdk.crazygames.com/crazygames-sdk-v1.js"></script>
	<?php }  else if(IsMS() || isset($_GET["msstart_sdk_init"])) { ?>
		<script src="https://assets.msn.com/staticsb/statics/latest/msstart-games-sdk/msstart-v1.0.0-rc.13.min.js"></script>
		<script>window.msStart = true;</script>
	<?php }  else { ?>
		<script>
			//Interstitial ad available event
			document.addEventListener("aip_interstitialadavailable", function(e) {
				console.log("An interstitial ad is available");
			});
		</script>
		<script src="//api.adinplay.com/libs/aiptag/pub/SSK/footballbros.io/tag.min.js"></script>
	<?php } ?>

	<script>

	<?php
		if(IsCG()) {
	?>
		var gAdBlock=false;
		var lastUnitPlayed="none";
		const gCrazySDK = window.CrazyGames.CrazySDK.getInstance(); //Getting the SDK
		if (gCrazySDK)
		{
			gCrazySDK.init(); //Initializing the SDK, call as early as possible
			gCrazySDK.addEventListener('bannerRendered', (event) => {
				console.log(`Banner for container ${event.containerId} has been
				rendered!`);
			});
			gCrazySDK.addEventListener('bannerError', (event) => {
				console.log(`Banner render error: ${event.error}`);
			});		
		}
	<?php }  else { ?>
		var aiptag = aiptag || {};
		aiptag.cmd = aiptag.cmd || [];
		aiptag.cmd.display = aiptag.cmd.display || [];	aiptag.cmd.player = aiptag.cmd.player || [];
		// Settings
		aiptag.consented = false; // GDPR setting, please set this value to false if an EU user has declined or not yet accepted marketing cookies, for users outside the EU please use true and for users accepted the GDPR also use true
	


		aiptag.cmd.player.push(function() {
			adplayer = new aipPlayer({
				AIP_ADBREAK_COMPLETE: function ()  {
					console.log("Adbreak Completed");
					Main.DoneInterstitialAd(false);
				},
				AD_WIDTH: 960,
				AD_HEIGHT: 540,
				AD_DISPLAY: 'default', //default, fullscreen, center, fill
				TRUSTED: true,
				LOADING_TEXT: 'loading advertisement',
				PREROLL_ELEM: function(){return document.getElementById('preroll')},
				AIP_COMPLETE: function (state)  {
					/*******************
					 ***** WARNING *****
					*******************
					Please do not remove the PREROLL_ELEM
					from the page, it will be hidden automaticly.
					If you do want to remove it use the AIP_REMOVE callback.
					*/
					Main.DoneVideoAd();
					window.focus();
					window.document.getElementById('openfl-content').focus();
					if(state == null) state = 'null';
					console.log('Video Ad Complete: '+state);
					SendEvent('event', 'donevideo-'+lastUnitPlayed+"-"+state);
				},
				AIP_REMOVE: function ()  {
					// Here it's safe to remove the PREROLL_ELEM from the page if you want. But it's not recommend.
				}
			});
		});
	<?php } ?>


	function SetupMSNotification()
	{
		console.log("notifying");
		if(typeof $msstart !== 'undefined')
		{
			console.log("notifying2");
			var id = btoa("https://footballbros.io/sbros_364x180.png");
			$msstart.scheduleNotificationAsync({title: 'Unlock new bros now!', 
												description: 'You are just about to unlock a new Bro! Who will it be?',
												type: 1,
												minDelayInSeconds: 24*60*60
											}).then(response => {
					console.log("notification response: "+response);
				});
			$msstart.scheduleNotificationAsync({title: 'Dunk all over your bros!', 
											description: 'New bros just waiting to be dunked on! Unlock them now!',
											type: 1,
											minDelayInSeconds: 24*7*60*60
										}).then(response => {
				console.log("notification response: "+response);
			});

  		}
	}

	var msAdID;
	function LoadVideo()
	{
		if(typeof $msstart !== 'undefined')
		{
			$msstart.loadAdsAsync().then(adInstance => {
    			// Use the adInstance.instanceId to make a call to showAdsAsync
				msAdID = adInstance.instanceId;
			});		
			
			SetupMSNotification();
		}
	}

	function ShowVideo(theUnitName=null)
	{
		//Main.DoneVideoAd(true);
		//return;//! when aip is live, remove this

		console.log('SHOW_VIDEO:'+theUnitName);
		var aUnitName = "";
		if(typeof $msstart !== 'undefined')
		{
			$msstart.showAdsAsync(msAdID).then(adInstance => {
   			 	// Use the adInstance.showAdsCompletedAsync to be notified of the completion of showing the advertisement
				adInstance.showAdsCompletedAsync.then((val) => {
					console.log('MS Video Ad Complete');
					Main.DoneVideoAd();
					window.focus();
					window.document.getElementById('openfl-content').focus();
					LoadVideo();
				}).catch((err) => {
					console.log('Ms Video Ad Error');
					Main.DoneVideoAd();
					window.focus();
					window.document.getElementById('openfl-content').focus();
					LoadVideo();
				});
			});
		}
		else if(typeof gCrazySDK !== 'undefined') {
			gCrazySDK.addEventListener("adFinished", Main.DoneVideoAd); // reenable sound, enable ui
			gCrazySDK.addEventListener("adError", Main.DoneVideoAd); // reenable sound, enable ui
			gCrazySDK.requestAd();		
			console.log('CG_AD_REQUESTED');		
			SendEvent('event', 'cgvideo');
			return;
		}
		else if (typeof adplayer === 'undefined') {
			Main.DoneVideoAd(true);
			SendEvent('event', 'video_adblocked');
			console.log('VIDEO_ADBLOCKED');		

		} else {
			var aStr = 'preroll';
			//if(theUnitName != null) aStr = theUnitName;
			lastUnitPlayed = aStr;
			SendEvent('event', 'startvideo-'+aStr);

			aiptag.cmd.player.push(function() { adplayer.startVideoAd(theUnitName); });
		}
	}
	</script>

	<!-- Firebase App (the core Firebase SDK) -->
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
	<!-- Firebase Authentication -->
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
	<!-- Firebase Firestore (Database) -->
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>

	<script>
		// Your web app's Firebase configuration
  		const firebaseConfig = {
    		apiKey: "AIzaSyAFCwYdbkLozIgtH5zuGydcjk_LNhYnve0",
    		authDomain: "football-bros-8f1b3.firebaseapp.com",
    		projectId: "football-bros-8f1b3",
    		storageBucket: "football-bros-8f1b3.appspot.com",
    		messagingSenderId: "807434051106",
    		appId: "1:807434051106:web:7e2fd59782e7c13165f47b"
  		};		

		// Initialize Firebase
		firebase.initializeApp(firebaseConfig);
		const auth = firebase.auth();
		const db = firebase.firestore();
		var userData = "";

		function triggerSignIn()
		{
			var provider = new firebase.auth.GoogleAuthProvider();
			auth.signInWithPopup(provider);
		}

		// Save game data function
		function saveGameData(gameData) {
			console.log('saving gamedata:' + gameData);
			var userId = auth.currentUser.uid;
			userData = gameData;
			db.collection('users').doc(userId).set({
				gameData: gameData
			}).then(function() {
				console.log('Game data saved');
			}).catch(function(error) {
				console.error('Error saving game data:', error);
			});
		}

		// Load game data function
		function loadGameData() { return userData; }
		
		function loadGameDataAsync() {
			var userId = auth.currentUser.uid;
			db.collection('users').doc(userId).get().then(function(doc) {
				if (doc.exists) {
					userData = doc.data().gameData;
					//Main.LoadGlobals();
					console.log('Game data:', doc.data().gameData);
					if (typeof Main != "undefined")
					{
						Main.LoadDataComplete();
					}
				// Use the game data in your game
				} else {
				console.log('No such document!');
				}
			}).catch(function(error) {
				console.error('Error loading game data:', error);
			});
		}

   // Firebase auth state observer
   		auth.onAuthStateChanged(function(user) {
      		if (user) {
				loadGameDataAsync();
				SendEvent('event', 'sign_in');
				console.log('user signed in');
			} else {
				console.log('No user signed in');
				SendEvent('event', 'sign_out');
			}
    	});

		function signOut()
		{
			auth.signOut().then(() => {
				Main.SignOutComplete();
				console.log('signed out');
			});		
		}

		function isUserLoggedIn() {
			return auth.currentUser !== null;
		}		
	</script>

</head>
<body style="overflow:hidden;">
	<noscript>Enable JavaScript bro!</noscript>
	<script>   

		//alert("Globals:"+localStorage.getItem("/:Globals").length);
		/////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////
		var url = window.location.href;
		if(url.includes("www."))
		{
				url = url.replace("www.","");

				var f = document.createElement('form');
				f.action=url;
				f.method='POST';
				var i=document.createElement('input');
				i.type='hidden';
				i.name='FGlobals';
				i.value=localStorage.getItem("/:Globals");
				f.appendChild(i);

				document.body.appendChild(f);
				f.submit();
		}
		else  
		{
				var aPost = "";
				<?php if(isset($_POST['FGlobals'])) echo "aPost = '" . $_POST['FGlobals'] . "';\n"; ?>
				var aStorage = localStorage.getItem("/:Globals");
				var aLen = 0;
				if(aStorage != null && aStorage.length > 0)
				{
						aLen = aStorage.length;
				}
				if(aPost.length > aLen) localStorage.setItem("/:Globals", aPost);
				if(aPost.length > 0 && aPost.length == aLen) localStorage.setItem("/:Globals", aPost);
		}
		/////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////

	</script>

    <div id="loading" style="position: absolute; z-index: 15; top: 60%; left: 50%; transform: translate(-50%, 0); background: black;">
			<center><img src="assets/loading4.png"><br/>
			<img src="assets/fbro.png">
			<img src="assets/sbro.png">
			<img src="assets/wbro.png">
			<img src="assets/bbro.png">
			</center>
	</div>

	<div id="game2" style="width: 100%; height: 100%; ">
		<div id="openfl-content"  
			<?php if(!IsCG()) {?>
				<?php if( !isset($_SERVER['HTTP_SEC_FETCH_DEST']) || $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe' ) { ?>
					style="width: calc(100%); float:left;"  
				<?php } ?>
			<?php } ?>
		>
			<script type="text/javascript">
				lime.embed ("FootballBros", "openfl-content", 0, 0, { parameters: {} });
			</script>
		</div>
		<div id="preroll" style="width: 960px; height: 540px; display: none; position: absolute; top: 50%; left: 50%; z-index: 100; transform: translate(-50%, -50%);">
		</div>

		<div id="footballbros-io_300x250" style="width: 300px; height: 250px; visibility:hidden; display: none; position: absolute; top: 30px; left: 30px; z-index: 100;">
		</div>	
		<div id="footballbros-io_300x250_2"  style="width: 300px; height: 250px; visibility:hidden; display: none; position: absolute; top: 30px; left: 30px; z-index: 100; ">
		</div>	
		<div id="footballbros-io_player_300x600"  style="visibility:hidden; width: 300px; height: 600px; display: none; position: absolute; top: 30px; left: 30px; z-index: 100;">
		</div>	
		<div id="footballbros-io_300x600_m"  style="visibility:hidden; width: 300px; height: 600px; display: none; position: absolute; top: 30px; left: 30px; z-index: 100;">
		</div>	
		<div id="footballbros-io_728x90"  style="visibility:hidden; width: 728px; height: 90px; display: none; position: absolute; top: 30px; left: 30px; z-index: 100;">
		</div>	
		<div id="footballbros-io_728x90_m"  style="visibility:hidden; width: 728px; height: 90px; display: none; position: absolute; top: 30px; left: 30px; z-index: 100;">
		</div>	
		<div id="footballbros-io_970x250"  style="visibility:hidden; width: 970px; height: 250px; display: none; position: absolute; top: 30px; left: 30px; z-index: 100; text-align: center;">
		</div>	

		

	</div>
	<br/>
	<div id="more">
    	<div class="notch-top-left"></div>
    	<div class="info-box">
			<h3>About Football Bros</h3>
			<p>Football Bros is a simple, fast-paced football game with all kinds of crazy action! With online multiplayer gameplay, lots of plays, and all kinds of crazy football action!</p>
			<p>The controls are very simple: Use either the arrow keys or WASD to control your bro. Space bar will throw a pass, dive, or stiff arm, depending on the situation.</p>
			<p>Be sure to follow us on social media for the latest updates and info!</p>                    
    	</div>
	    <div class="info-box">
        	<h3>FAQ</h3>
        	<b>Why isn't the game loading?</b>
        	<p>You should check your internet connection and make sure our site isn't blocked. Also, disable all ad blockers.</p>
        	<b>How do I play?</b>
        	<p>Use your arrow keys and space bar! The rest is easy- pick your play and go!</p>
        	<b>Which browser should I use?</b>
        	<p>You should use Chrome. It is the only browser guaranteed to work. Football Bros has also been tested to work on Firefox and Safari, but not guaranteed.</p>
        	<b>Do you have a favorite team?</b>
        	<p>Yes, but we're not saying which one. Drop us an e-mail if you think you know.</p>
    	</div>
	</div>
	<footer>
		<div class="footer-links">
			<a href="https://bluewizard.com/terms/">Terms of Service</a> |
			<a href="https://bluewizard.com/privacypolicy/">Privacy Policy</a>
		</div>
	</footer>
	<script>
		var lastRefresh = 0;
		function ShowAd1(doRefresh)
		{
			if( /Android|webOS|iPhone|iPad|iPod|Opera Mini/i.test(navigator.userAgent) ) {
 				return;
			}
			var l = window.document.getElementById('footballbros-io_160x600');
			if(l == null) return;
			l.style.display = '';
			l.style.visibility = 'visible';

			l = window.document.getElementById('footballbros-io_160x600');
			if(l == null) return;
			l.style.display = '';
			l.style.visibility = 'visible';


			if(typeof gCrazySDK !== 'undefined')
			{
				var d = new Date();
				var ms = d.getTime();				
				if(ms-lastRefresh > 10000)
				{
					gCrazySDK.requestResponsiveBanner(["footballbros-io_160x600"]);
					lastRefresh = ms;
				}
			}
			else if(typeof aipDisplayTag !== 'undefined') 
			{
				aipDisplayTag.refresh('footballbros-io_160x600');
				aipDisplayTag.refresh('footballbros-io_160x600_2');
				SendEvent('event', 'aip_banner_requested');	
			}
			else
				SendEvent('event', 'banner_adblocked');

		}

		var lastRefresh6 = 0;
		function ShowAd6()
		{
			if( /Android|webOS|iPhone|iPad|iPod|Opera Mini/i.test(navigator.userAgent) ) {
 				return;
			}
			var l = window.document.getElementById('footballbros-io_300x250');
			if(l == null) 
			{
				return;
			}
			l.style.display = '';
			l.style.visibility = 'visible';

			if(typeof gCrazySDK !== 'undefined')
			{
				var d = new Date();
				var ms = d.getTime();				
				if(ms-lastRefresh6 > 10000)
				{
				//hndled by the first banner request
					//gCrazySDK.requestBanner([{containerId: 'footballbros-io_300x250',size: '300x250',}]);
					//gCrazySDK.requestResponsiveBanner(["footballbros-io_300x250"]);
					lastRefresh6 = ms;
				}
			}
			else if(typeof aipDisplayTag !== 'undefined')
			{
				aipDisplayTag.refresh('footballbros-io_300x250');
				SendEvent('event', 'aip_banner_requested');	
			}
			else
				SendEvent('event', 'banner_adblocked');
		}

		var lastRefresh2 = 0;
		function ShowAd2()
		{
			if( /Android|webOS|iPhone|iPad|iPod|Opera Mini/i.test(navigator.userAgent) ) {
 				return;
			}
			var l = window.document.getElementById('footballbros-io_300x250_2');
			if(l == null) return;
			l.style.display = '';
			l.style.visibility = 'visible';

			if(typeof gCrazySDK !== 'undefined')
			{
				var d = new Date();
				var ms = d.getTime();				
				if(ms-lastRefresh2 > 10000)
				{
				//hndled by the first banner request
					//gCrazySDK.requestBanner([{containerId: 'footballbros-io_300x250_2',size: '300x250',}]);
					gCrazySDK.requestResponsiveBanner(["footballbros-io_300x250", "footballbros-io_300x250_2"]);

					lastRefresh2 = ms;
				}
			}
			else if(typeof aipDisplayTag !== 'undefined')
			{
				aipDisplayTag.refresh('footballbros-io_300x250_2');
				SendEvent('event', 'aip_banner_requested');	
			}
			else
				SendEvent('event', 'banner_adblocked');
		}
		function ShowAd3()
		{
			if( /Android|webOS|iPhone|iPad|iPod|Opera Mini/i.test(navigator.userAgent) ) {
 				return;
			}
			var l = window.document.getElementById('footballbros-io_728x90');
			if(l == null) return;
			l.style.display = '';
			l.style.visibility = 'visible';
			if(typeof gCrazySDK !== 'undefined')
			{
				gCrazySDK.requestResponsiveBanner(["footballbros-io_728x90"]);
			}
			else if(typeof aipDisplayTag !== 'undefined') 
			{
				aipDisplayTag.refresh('footballbros-io_728x90');
				SendEvent('event', 'aip_banner_requested');	
			}
			else
				SendEvent('event', 'banner_adblocked');
			
		}		
		function ShowAd4()
		{
			if( /Android|webOS|iPhone|iPad|iPod|Opera Mini/i.test(navigator.userAgent) ) {
 				return;
			}
			if(window.innerWidth < 1200) return;
			var l = window.document.getElementById('footballbros-io_player_300x600');
			if(l == null) return;
			l.style.display = '';
			l.style.visibility = 'visible';
			if(typeof gCrazySDK !== 'undefined')
			{
				gCrazySDK.requestResponsiveBanner(["footballbros-io_player_300x600"]);
				//gCrazySDK.requestBanner([{containerId: 'footballbros-io_player_300x600',size: '300x600',}]);
			}
			else if(typeof aipDisplayTag !== 'undefined')
			{
				aipDisplayTag.refresh('footballbros-io_player_300x600');
				SendEvent('event', 'aip_banner_requested');	
			}
			else
				SendEvent('event', 'banner_adblocked');

		}	
		function ShowAd7()
		{
			if( /Android|webOS|iPhone|iPad|iPod|Opera Mini/i.test(navigator.userAgent) ) {
 				return;
			}
			if(window.innerWidth < 1200) return;
			var l = window.document.getElementById('footballbros-io_300x600_m');
			if(l == null) return;
			l.style.display = '';
			l.style.visibility = 'visible';
			if(typeof gCrazySDK !== 'undefined')
			{
				gCrazySDK.requestResponsiveBanner(["footballbros-io_player_300x600"]);
				//gCrazySDK.requestBanner([{containerId: 'footballbros-io_player_300x600',size: '300x600',}]);
			}
			else if(typeof aipDisplayTag !== 'undefined') 
			{
				aipDisplayTag.refresh('footballbros-io_300x600_m');
				SendEvent('event', 'aip_banner_requested');	
			}
			else
				SendEvent('event', 'banner_adblocked');

		}	
		function ShowAd8()
		{
			if( /Android|webOS|iPhone|iPad|iPod|Opera Mini/i.test(navigator.userAgent) ) {
 				return;
			}
			var l = window.document.getElementById('footballbros-io_728x90_m');
			if(l == null) return;
			l.style.display = '';
			l.style.visibility = 'visible';
			if(typeof gCrazySDK !== 'undefined')
			{
				gCrazySDK.requestResponsiveBanner(["footballbros-io_728x90"]);
			}
			else if(typeof aipDisplayTag !== 'undefined') 
			{
				aipDisplayTag.refresh('footballbros-io_728x90_m');
				SendEvent('event', 'aip_banner_requested');	
			}
			else
				SendEvent('event', 'banner_adblocked');

		}		
		function ShowAd9()
		{
			if( /Android|webOS|iPhone|iPad|iPod|Opera Mini/i.test(navigator.userAgent) ) {
 				return;
			}
			var l = window.document.getElementById('footballbros-io_970x250');
			if(l == null) return;
			l.style.display = '';
			l.style.visibility = 'visible';
			if(typeof gCrazySDK !== 'undefined')
			{
				gCrazySDK.requestResponsiveBanner(["footballbros-io_970x250"]);
			}
			else if(typeof aipDisplayTag !== 'undefined') 
			{
				aipDisplayTag.refresh('footballbros-io_970x250');
				SendEvent('event', 'aip_banner_requested');	
			}
			else
				SendEvent('event', 'banner_adblocked');

		}		



		

		function right(str, chr) 
		{
 			 return str.slice(str.length-chr,str.length);
		}		
		function SetCGInviteLink() 
		{
			if(typeof gCrazySDK !== 'undefined')
			{
				var meta = document.getElementById ("cglink");
				var aStr = meta.value;
				aStr = right(aStr, 8);
				var aCGLink = gCrazySDK.inviteLink({ roomId: aStr });
				meta.value = aCGLink;
				meta.select
				document.execCommand('Copy')
				console.log("COPIED CG URL");
			}
		}

		function ShowAdBreak() {
			//check if the adslib is loaded correctly or blocked by adblockers etc.
			if(typeof gCrazySDK !== 'undefined')
			{
				Main.DoneInterstitialAd(false);
				return;
			}

			<?php 	
					if($_SERVER['REMOTE_ADDR']=='127.0.0.1')
					{
						echo('Main.DoneInterstitialAd(false); return;');
					}
			?>
			if(typeof adplayer === 'undefined' ) {
				Main.DoneInterstitialAd(true);
				return;
			}
			aiptag.cmd.player.push(function() { adplayer.startAdBreak(); });
		}

		
		document.getElementById("openfl-content").addEventListener("wheel", doScroll);
		document.getElementById("more").addEventListener("wheel", doScroll);
		function doScroll(event) {
  			window.scroll(0, window.scrollY + event.deltaY);
		}

		
		/*setInterval(function () { 
			var l = window.document.getElementById('preroll');
			if(l != null && typeof l.style !== 'undefined' && l.style.visibility !== 'visible') {
				document.getElementById('openfl-content').focus();
				if(document.activeElement instanceof HTMLIFrameElement)
				{
					//document.activeElement.style.display = "none";
					window.focus();
					window.document.getElementById('openfl-content').focus();
				}
			}
		}, 1000);*/


/*		setInterval(function () { 
			var l = window.document.getElementById('footballbros-io_160x600');
			if(l != null && typeof l.style !== 'undefined' && l.style.visibility == 'visible') {
				ShowAd5();
			}
		}, 30000);

		setInterval(function () { 
			var l = window.document.getElementById('footballbros-io_160x600_2');
			if(l != null && typeof l.style !== 'undefined' && l.style.visibility == 'visible') {
				ShowAd1();
			}
		}, 32000);*/

		<?php
			$sessID = session_id();
			if($sessID == false || $sessID == "") $sessID = bin2hex(random_bytes(10));
			echo "var sid='$sessID'"; 
		?>

		function updateStatus(fromEvent = false)
		{
			const req = new XMLHttpRequest();
			var aStr = "recordsession.php?s="+sid;
			if(fromEvent == true)  aStr = aStr + "&e=1"
			req.open("GET", aStr);
			req.send();
		}
		function SendEvent(theEvent, theAction, theParms = '') {
			if(theParms == '') {
				gtag(theEvent, theAction);
			} else {
				gtag(theEvent, theAction, theParms);
			}
			updateStatus(true);
			//console.log("Sending event: " + theEvent + "/" + theAction + "/" + theParms);
		}
		//setInterval(function() { updateStatus, 4*60*1000);			
		//setInterval( function() { 
		//	window.scrollTo(0, 0); 
		//}, 2000 );					
		updateStatus(true);

		//setInterval(ClearAds, 2000);		

		function EmailSignup() {
			if(document.getElementById("signup") || document.getElementById("deleteme")) return;
			const iframe = document.createElement("iframe");
			iframe.src = "https://bluewizard.com/subscribe-to-bbros/";

//			iframe.style.display = "block";
			iframe.style.width = "550px";
			iframe.style.height = ""+window.innerHeight-100+"px";
			iframe.style.position = "absolute";
			iframe.style.top = "50px";
			iframe.style.left = "50%";
			iframe.style["margin-left"] = "-225px";
			//iframe.style["margin-right"] = "-275px";
			iframe.style["max-width"] = "100%";
			iframe.setAttribute("id", "signup");

			document.body.appendChild(iframe);
		}

		function GamePlayStart() {
			if(typeof gCrazySDK !== 'undefined')
			{
				console.log("GamePlayStart");
				gCrazySDK.gameplayStart();
			}
		}

		function GamePlayStop() {
			if(typeof gCrazySDK !== 'undefined')
			{
				console.log("GamePlayStop");
				gCrazySDK.gameplayStop();
			}
		}

		function HappyTime() {
			if(typeof gCrazySDK !== 'undefined')
			{
				console.log("happytime");
				gCrazySDK.happytime();
			}
		}
	</script>
</body>
</html>
