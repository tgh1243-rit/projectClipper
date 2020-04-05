<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client(
    'mongodb+srv://jmp7978:admin@clipper01-vjpy8.gcp.mongodb.net/test?retryWrites=true&w=majority');

echo "Connection to database successful. <br>";

$airline = $client->airline;
$short = $airline->shortStats;
$document = $short->findOne();

highlight_string("<?php\n\$data =\n" . var_export($document, true) . ";\n?>");
?>


<?php
    // Brett additional process code

    // tests and strips html insert
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    // tests each input from form and sets to variable
    $longitude = test_input($_POST['longitude']);
    $latitude = test_input($_POST['latitude']);
    
    $latlon = array($longitude, $latitude);
    
    // assuming loc is the name of the 2dsphere index
    $documentList = short->find(array('loc' => array('$nearSphere' => $lonlat)))->limit($limit);

    foreach($documentlist as $doc) {
        var_dump($doc);
    }
?>
