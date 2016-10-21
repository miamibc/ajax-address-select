<?php
/**
 * Created by PhpStorm.
 * User: miami
 * Date: 10/21/16
 * Time: 2:25 PM
 */

if (!isset($_POST['key']) )
  exit('You need a key');

$key = $_POST['key'];
$data = json_decode(file_get_contents('data.json'));

if (!isset($data->$key))
{
  http_response_code(204);
  exit('No options for this key');
}
?>
<option>-- Please select --</option>
<?php foreach ($data->$key as $item): ?>
<option value="<?php echo $item?>"><?php echo $item ?></option>
<?php endforeach; ?>