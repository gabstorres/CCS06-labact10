<?php
require "config.php";

use App\Employee;

if (isset($_GET['emp_no'])) {
    $emp_no = $_GET['emp_no'];
    $employees = Employee::getByEmpNo($emp_no);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        
        .container {
            text-align: center;
        }
        
        .header {
            color: #65ccdb;
        }
        
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
        }
        
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #65ccdb;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <button onclick="history.back()" class="btn btn-default">Return</button>
    <div class="container">
        <div class="row header">
            <h1>SALARY HISTORY</h1>
        </div>
        <?php if (isset($employees) && count($employees) > 0) { ?>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>FROM DATE</th>
                        <th>TO DATE</th>
                        <th>SALARY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td><?php echo $employee->getHireDate(); ?></td>
                            <td><?php echo $employee->getEndDate(); ?></td>
                            <td><?php echo $employee->getSalary(); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No salary history found for employee <?php echo $emp_no; ?></p>
        <?php } ?>
    </div>
</body>
</html>
