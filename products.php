<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<title>Products</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<h2>Products</h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Name.</th>
						<th>Code </th>
						<th>Family</th>
                        <th>Price</th>
						<th>Quantity</th>
					</tr>
				</thead>

				<tbody>
					<?php

                        $conn = "";
                        
                        try {
                            $servername = "localhost";
                            $dbname = "product";
                            $username = "root";
                            $password = "";
                        
                            $conn = new PDO(
                                "mysql:host=$servername; dbname=product",
                                $username, $password
                            );
                            
                            $conn->setAttribute(PDO::ATTR_ERRMODE,
                                        PDO::ERRMODE_EXCEPTION);
                            
                        } catch(PDOException $e) {
                            echo "Connection failed: "
                                . $e->getMessage();
                        }
                        
                        
						$a=1;
						$stmt = $conn->prepare(
								"SELECT * FROM user");
						$stmt->execute();
						$products = $stmt->fetchAll();
						foreach($products as $product)
						{
					?>
					<tr>
						<td>
							<?php echo $product['Name']; ?>
						</td>
						<td>
							<?php echo $product['Code']; ?>
						</td>

                        <td>
							<?php echo $product['Family']; ?>
						</td>
						<td>
							<?php echo $product['Price']; ?>
						</td>

                        <td>
							<?php echo $product['Quantity']; ?>
						</td>

						
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>

		</div>
	</div>
</body>

</html>
