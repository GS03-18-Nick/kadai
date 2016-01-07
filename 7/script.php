if (isset('submit')) {

//Set timezone and get current time
date_default_timezone_set('Tokyo/Japan');
$date = date('Y/m/d H:i:s');

//Variables from Form
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$interest = $_POST['interest'];
$comment = $_POST['comment'];

if (isset('$comment')) {
$comment = trim($comment);
$comment = strip_tags($comment);
}

while ((list($key,$val) = each($interest)) ) {
  $interest .= "[" . $val . "]";
}


$csv = 'survey.csv';
$csv_open = fopen($csv, 'a');

$csv_item = "$date, $name, $email, $sex, $age, $interest, $comment\n";

fwrite($csv_open, $csv_item);

fclose($csv_open);

}