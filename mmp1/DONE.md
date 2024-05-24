Ich lade JQUERY jetzt durch CDNJS!
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" 
integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" 
crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

updateTodaySong.php loese ich jetzt durch die Datenbank!
$dbh->exec("UPDATE sotd SET ID = ID + 1");

Die Landingpage wurde etwas uebersichtlicher gestalltet. 