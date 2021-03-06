<?php
  	require $_SERVER['DOCUMENT_ROOT']."/secure/core.php";
	
	//Sample search for Dimitar Berbatov
	$search = $s->playersearch('0','1','gold','f442','attacker','9','13','144','','','','');
 	$results = json_decode($search, true);
 	
 	//Sample search for player formation cards
 	$search1 = $s->trainingsearch('0','1',"gold", "playerFormation", "", "", "", "");
 	$results1 = json_decode($search1, true);
 	
 	//Clean results for viewing pleasure
 	$EASW_KEY = explode("=",$info['EASW_KEY']);
	$EASF_SESS = explode("=",$info['EASF_SESS']);
	$PHISH_KEY = explode("-",$info['PHISHKEY']);
	$XSID = explode(":",$info['XSID']);
 	
 	$orig_formation = $results['auctionInfo'][0]['itemData']['formation'];
 	$remove_f = explode("f",$orig_formation);
 	$new_formation = wordwrap($remove_f[1],1,'-',true);
?>
<html>
	<head>
		<title>Sample FUT13 Page</title>
	</head>

	<body>
		<?php
			
			//display the connection info on the screen
 			echo "<b>Your EA Connection Details</b>:<br />";
 			echo "EASW Key : " . $EASW_KEY[1] . "<br />";
 			echo "EASF Session : " . $EASF_SESS[1] . "<br />";
			echo "Phishing Key : " . $PHISH_KEY[1] . "<br />";
 			echo "Session ID : " . $XSID[1] . "<br /><br />";
 			
 			//display your marketplace data
 			echo "<b>Your Marketplace Data</b>:<br />";
 			echo "Total Coins : ". $results['credits'] ."<br />";
 			echo "Total Bid Tokens : ". $results['bidTokens']['count'] ."<br /><br />";
 			
 			//sample marketplace search
 			echo "<b>Sample Marketplace Search</b>:<br />";
 			echo "Trade ID : ".$results['auctionInfo'][0]['tradeId']."<br />";
 			echo "Buy now price : ".$results['auctionInfo'][0]['buyNowPrice']."<br />";
 			echo "Seller Name : ".$results['auctionInfo'][0]['sellerName']."<br />";
 			echo "Formation : ".$new_formation."<br />";
 			
 			//sample formation search
 			echo "<b>Sample Formation Search</b>:<br />";
 			echo "Trade ID : ".$results1['auctionInfo'][0]['tradeId']."<br />";
 			echo "Buy now price : ".$results1['auctionInfo'][0]['buyNowPrice']."<br />";
 			echo "Seller Name : ".$results1['auctionInfo'][0]['sellerName']."<br />";
 			echo "ResourceID : ".$results1['auctionInfo'][0]['itemData']['resourceId']."<br />";
		?>
	</body>
	
	<footer>
		<h3>All Credits go to <a href="https://github.com/curt2008/Fifa13-Ultimate-Team-PHP-App">curt2008</a></h3>
	</footer>
</html>
