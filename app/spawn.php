<?php
  ob_start();
  
  // generate random number between 1-60 for sleep()
  $sleepSeconds = rand(10,60);
  
  // get url
  $url = $_POST['url'];

  // get random first name
  $firstname_content = file("../txt/first.txt"); 
  $firstname = $firstname_content[rand(0, count($firstname_content) - 1)];

  // get random alst name
  $lastname_content = file("../txt/last.txt"); 
  $lastname = $lastname_content[rand(0, count($lastname_content) - 1)];

  // trim email list and parse it by line
  $emails = trim($_POST['emails']);
  $emails = explode("\n", $emails);

  // for each email by how many emails there are
  foreach($emails as $i => $emails) {
    // set fields
    $fields = array(
      'u' => urlencode('your id here'),
      'id' => urlencode('your id here'),
      'MERGE0' => urlencode($emails),
      'MERGE1' => urlencode($firstname),
      'MERGE2' => urlencode($lastname)
    );

    // url-ify the data for the POST
    $fields_string = "";
    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');

    // set up curl_multi inits by how many emails there are
    $mh = curl_multi_init();
    $ch[$i] = curl_init();
    curl_setopt($ch[$i], CURLOPT_RETURNTRANSFER, 1);
    curl_multi_add_handle($mh, $ch[$i]);

    curl_setopt($ch[$i],CURLOPT_URL, $url);
    curl_setopt($ch[$i],CURLOPT_POST, count($fields));
    curl_setopt($ch[$i],CURLOPT_POSTFIELDS, $fields_string);

    $result = curl_exec($ch[$i]);
    curl_close($ch[$i]);
    
    // redirect to home when done
    header('Location:index.php');
    ob_end_flush();
  }
?>
