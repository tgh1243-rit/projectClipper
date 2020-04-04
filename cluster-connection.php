<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client(
    'mongodb+srv://jmp7978:admin@clipper01-vjpy8.gcp.mongodb.net/test?retryWrites=true&w=majority');

echo "Connection to database successful. <br>";

$airline = $client->airline;
$short = $airline->short;
$document = $short->findOne();

highlight_string("<?php\n\$data =\n" . var_export($document, true) . ";\n?>");
?>