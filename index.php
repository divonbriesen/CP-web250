<!DOCTYPE html>
<?php
$space = " "; // because it's easier than concatenating  " "  whenever you want a space and makes it more obvious
$sFirstName = 'Ali Boozang';
$sLastName =  "von Brcikenbacken";
$sMiddleName = "B.";
$sFullName = $sFirstName .$space. $sMiddleName .$space. $sLastName;
if ($sImageId = $_GET["id"])
{
	$sImageId = $_GET["id"]; // hardcoded for now
} 
else
{
	$sImageId = "00";
}

$sImageType = ".png"; // need to figure out how to dynamically get this?
$sImageName = "profileimage (" . $sImageId.")" . $sImageType; // e.g. "profileimage (002).png" to correspond with basic windows mass renaming
$sImagePath = "images/users/" . $sImageName;
$sFigCaption = "I like hot drinks";
$sOrganization = "WEB250";
$sComponentsPath = "components/";

include("content/data.php"); // bring in data assigned to php array

?>
<html>
	<head>
		<link rel = "stylesheet" href = "styles/default.css" type = "text/css" />
		<title>
			<?php echo($sOrganization . " >> " . $sFullName) ?>
		</title>
	</head>
<body>
<?php include($sComponentsPath ."header.inc"); ?>

<main>	
	<h1>Introducing <?php echo($sFirstName) ?>!!</h1>
	<figure>
		<img src="<?php echo($sImagePath) ?>" height = "350px"  alt="<?php echo($sFullName) ?>" />
		<figcaption>
			<?php echo($sFigCaption) ?>
		</figcaption>
	</figure>
	<ul>
	<?php

		echo ('<ul>');	
	  
		foreach ( $aListOfAttributeValues as $anAttribute => $aValue ) 
		{
			if (is_array($aValue)) // then you need a sublist
			{ 
				echo "<li><span class = \"attribute\">$anAttribute:</span><br>";
				echo("<ol>"); // start the sublist
				for($iCounter = 0; $iCounter < count($aValue); $iCounter++)
				{	
					echo("<li>" . $aValue[$iCounter][0] . ": " . $aValue[$iCounter][1] . " - " . $aValue[$iCounter][2] . ".</li>");
				}
																	
				echo("</li></ol>");
			}
			else //i'ts  normal list item
			{
				echo "<li><span class = \"attribute\">$anAttribute:</span> $aValue</li>";
			}
		}
			
		echo '</ul>';	
	?>
		
</main>
<?php include($sComponentsPath ."footer.inc"); ?>
</body>
</html>