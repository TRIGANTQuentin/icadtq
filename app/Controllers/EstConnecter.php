<?php 
$session = session();
if($session->get('logged_in'))
{

}
else 
{
    redirect()->to('/'); 
}
?>