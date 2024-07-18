<!DOCTYPE html> 

<html> 
<head>
  <meta charset="utf-8">
  <title>Azubi Africa: List</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body style="width:100%;overflow:hidden"> 


<div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="#" rel="dofollow">Guest List</a></h1>
          <button style="position:absolute;right:3rem;padding:.3rem"><a href="index.php" rel="dofollow" style="color:red">Log out</a></button>
        </div>
<!-- how we display our content -->
	<table class="styled-table">
    <thead>
        <tr>
		<!-- tr is a row, th is the header, add or remove this to see changes on column header -->
            <th>Email</th>
            <th>Name</th>
            <th>Country</th>
        </tr>
    </thead>
    <tbody>
<!-- start here -->
<!-- start here -->
	
	<!-- You will input your dynamo code here.....research on php + dynamo -->
	<!-- tr stands for table row, and td for description..... this will need to be dynamic -->
        <?php
                    require 'vendor/autoload.php';

                    // Set up AWS SDK for PHP
                    // require 'vendor/autoload.php';
                    
                    use Aws\DynamoDb\DynamoDbClient;
                    use Aws\DynamoDb\Exception\DynamoDbException;
                    use Aws\DynamoDb\Marshaler;
                    
                    $client = new DynamoDbClient([
                        'profile' => 'default',
                        'region'  => 'us-east-1',
                        'version' => 'latest',
                         'credentials' => [
                             'key'    => 'AKIAVRUVWLVS6CBF347B',
                             'secret' => 'uyLnm6KbmExmKWbY0XZNNC1KW1R20wXZeoAjUUh0z',
                        ],
                    ]);
                    
                    $marshaler = new Marshaler();
                    $tableName = 'GuestBook';
                    

                    // Specify the table name
                    // $tableName = 'GuestBook';
                    
                    // Query the table
                    // try {
                    //     $result = $client->scan([
                    //         'TableName' => $tableName,
                    //     ]);
                    
                    //     echo "<table border='1'>";
                    //     echo "<tr>";
                    
                    //     // Display table headers
                    //     foreach ($result['Items'][0] as $key => $value) {
                    //         echo "<th>" . $key . "</th>";
                    //     }
                    
                    //     echo "</tr>";
                    
                    //     // Display table rows
                    //     foreach ($result['Items'] as $item) {
                    //         echo "<tr>";
                    //         foreach ($item as $key => $value) {
                    //             echo "<td>" . $client->formatValue($value) . "</td>";
                    //         }
                    //         echo "</tr>";
                    //     }
                    
                    //     echo "</table>";
                    
                    // } catch (DynamoDbException $e) {
                    //     echo "Unable to query table:\n";
                    //     echo $e->getMessage() . "\n";
                    //
                    // }
                    

                    // Retrieve data
                    $key = $marshaler->marshalJson('
                         {
                             "Email": "fil@gmail.com"
                         }
                     ');
                    
                    $params = [
                         'TableName' => $tableName,
                         'Key' => $key
                     ];
                    
                     try {
                         $result = $client->getItem($params);
                      if (isset($result['Item'])) {
                          $item = $marshaler->unmarshalItem($result['Item']);
                            // print_r($item);

                            $members = $item;
                            foreach ($members as $x => $y) 
                            {echo "$x : $y <br>";}
                            
                            // Display the guests in a table
                            // echo '<tr>';
                            // echo '<td>' .[$y] . '</td>';
                            // echo '<td>' .['country'] . '</td>';
                            // echo '</tr>';


                        } else {
                            echo "No item found with the key.\n";
                        }
                    } catch (DynamoDbException $e) {
                       echo "Unable to retrieve item:\n";
                        echo $e->getMessage() . "\n";
                     }

                    echo '<tr>';
                    echo '<td>' .['email'] . '</td>';
                    echo '<td>' .['country'] . '</td>';
                    echo '</tr>';
                    
                  ?>
                    
                // <!-- Display the guests in a table -->
                    echo '<tr>';
                    echo '<td>' .['email'] . '</td>';
                    echo '<td>' .['country'] . '</td>';
                    echo '</tr>';
                ?>

                        
		<!-- the end of your dynamo pickups -->


    </tbody>
</table>

<!-- styles for our table .... dont tamper -->
<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 20%;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
</style>


<div class="padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" >
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
</body>
</html>