<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo 2</title>
</head>>
<body>
	
	<?php 
		$a=1;
		$b=2;
		function Sum() {
			global $a, $b;

			$b = $a + $b;
		}

		Sum();
		echo $b;
	?>
<select>
  <optgroup label="Swedish Cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
  </optgroup>
  <optgroup label="German Cars">
    <option value="mercedes">Mercedes</option>
    <option value="audi">Audi</option>
  </optgroup>
</select>
</body>
</html>