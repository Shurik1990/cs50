<?php
// configuration
require("../includes/config.php");
// if form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// Validate the user input for the register forn
	if(empty($_POST["username"])||empty($_POST["password"])||$_POST["password"] != $_POST["confirmation"])
	{
		if(empty($_POST["username"]))
		{
			apologize("Username is required");
		}
		else if(empty($_POST["password"]))
		{
			apologize("Password is required");
		}
		else if($_POST["password"] != $_POST["confirmation"])
		{
			apologize("Password doesn't equal the confirmation");
		}
	}else{
		// If the username already exists, an error message is displayed
		$rows = CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));
		if ($rows !== 1)
		{
		    apologize("Username already existed");
		}
		else {
			// insert the new user into the database
			$rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
			$id = $rows[0]["id"];
			$_SESSION["id"] = $id; 
			redirect("index.php");
		}
	}
}
else
{
  // else render form
  render("register_form.php", ["title" => "Register"]);
}
?>