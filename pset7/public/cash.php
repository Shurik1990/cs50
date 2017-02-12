<?php
    // configuration
    require("../includes/config.php"); 
    $users = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    // render portfolio
    render("cash_form.php", ["title" => "Cash", "users" => $users]);
?>