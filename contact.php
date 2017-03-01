<?php
try{

$name = $_POST["contact_name"];
$email = $_POST["contact_email"];
$message = $_POST["contact_message"];


# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
//use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun\Mailgun('key-b2dcb20d1046b9c8311398e39676b871');
$domain = "mg.pedropiloto.com";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => $name." <".$email.">",
    'to'      => 'Pedro Piloto <pedro@pedropiloto.com>',
    'subject' => 'Contact Form - Message from '.$name,
    'text'    => $message
));

echo "Thank you. I will be in touch with you soon";

}catch(Exception $ex){
  echo "Erro: ".$ex;
}
