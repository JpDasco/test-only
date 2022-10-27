<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Vendo Machine</h1>

        <?php 
            $drinks = array('Coke' => 15, 'Sprite' => 20, "Royal" => 20, 'Pepsi' => 15, 'Mountain Dew' => 20);
            $size = array('Regular' => 'Regular', 'Up-size (add ₱5)' => 'Up-size', 'Jumbo (add ₱10)' => 'Jumbo');
        ?>

		<form method="post">
			<fieldset style="width: 450px;">
				
                <legend>Products:</legend>
                    <?php  
                        if(isset($drinks)){
                            foreach ($drinks as $drinksKey => $drinksValue) {
                                echo "<input type='checkbox' name='cbDrinks[". $drinksKey ."]' value='". $drinksValue ."'>
                                <label>". $drinksKey." - ₱". $drinksValue ."</label><br>";
                            }
                        }
                    ?>
			</fieldset>

			<fieldset style="width: 450px;">
				
                <legend>Options:</legend>
                    <label for="txtSelect">Size</label>
                        <select name="txtSelect" id="txtSelect">
                    
                            <?php  
                                if (isset($size)) {
                                    foreach ($size as $sizesKey => $sizesValue) {
                                        echo "<option value='". $sizesValue ."'>". $sizesKey ."</option>";
                                    }
                                }
                            ?>
                        </select>

				<label for="numQuantity">Quantity</label>
				    <input type="number" name="numQuantity" id="numQuantity" min="0" max="100" value="0">

				<button type="submit" name="btnSubmit">Check Out</button>

			</fieldset>
		</form>

		<?php 		
			if (isset($_POST['btnSubmit'])) {

				if (isset($_POST['txtSelect']) && isset($_POST['cbDrinks'])) {

					$quantity = $_POST['numQuantity'];
					$size = $_POST['txtSelect'];
					$total = $_POST['cbDrinks'];

					
                        if ($quantity == 1) {
                            $term = "piece";
                        }
                        else{
                            $term = "pieces";
                        }

				
                        if ($size == 'Regular') {
                            $addOn = 0;
                        }
                        elseif ($size == 'Up-size') {
                            $addOn = 5;
                        }
                        elseif ($size == 'Jumbo') {
                            $addOn = 10;
                        }

					echo "<hr><h3>Purchase Summary: </h3>";

                        foreach ($total as $totalKey => $totalValue) {
                            echo 
                            "<ul>
                                <li>". $quantity ." ". $term ." of ". $size ." ". $totalKey ." amounting to ₱". $totalVal = 
                                intval($totalValue) * intval($quantity) + ($addOn * intval($quantity)) .
                                "</li>
                            </ul>";
                        }

					$itemsTotal = ($quantity * sizeof($total));
					$grandTotal = (array_sum($total) + $addOn * $quantity) * $quantity;

                        echo "<label><b>Total number of items: </label>". $itemsTotal ."<br>";
                        echo "<label><b>Total amount: </label>". $grandTotal;

				}
			
				else {
					echo "<hr>No selected product, Please try again.";
				}
			}
			

		?>
 
</body>
</html>