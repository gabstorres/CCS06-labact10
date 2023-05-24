<?php
require "config.php";
use App\Employee;

$employee = Employee::list();
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
        
        a {
            text-decoration: none;
            color: blue;
        }
        
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row header">
            <h1>LIST OF MANAGERS</h1>
        </div>
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>DEPARTMENT NUMBER</th>
                    <th>DEPARTMENT NAME</th>
                    <th>MANAGER NAME</th>
                    <th>HIRE DATE</th>
                    <th>END DATE</th>
                    <th>TOTAL YEARS</th>
                    <th>EMPLOYEES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($employee as $employee): ?>
                <tr>
                    <td><?php echo $employee->getDeptNo(); ?></td>
                    <td><?php echo $employee->getDeptName(); ?></td>
                    <td><?php echo $employee->getFullName(); ?></td>
                    <td><?php echo $employee->getHireDate(); ?></td>
                    <td>Current</td>
                    <td><?php echo $employee->getTotalYear(); ?></td>
                    <td><a href="show-employee.php?dept_no=<?php echo $employee->getDeptNo(); ?>">VIEW</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
