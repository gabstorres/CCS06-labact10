<?php
require "config.php";

use App\Employee;

if (isset($_GET['dept_no'])) {
    $dept_no = $_GET['dept_no'];
    $employees = Employee::getById($dept_no);
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
        
        a {
            text-decoration: none;
            color: blue;
        }
        
        a:hover {
            text-decoration: underline;
        }
        
        .return-btn {
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
    <a href="index.php" class="return-btn">Return</a>
    <div class="container">
        <div class="row header">
            <h1>LIST OF EMPLOYEES</h1>
        </div>
        <?php if (isset($employees) && count($employees) > 0) { ?>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>TITLE</th>
                        <th>FULL NAME</th>
                        <th>BIRTHDAY</th>
                        <th>AGE</th>
                        <th>GENDER</th>
                        <th>HIRE DATE</th>
                        <th>SALARY</th>
                        <th>SALARY HISTORY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td><?php echo $employee->getTitle(); ?></td>
                            <td><?php echo $employee->getFullName(); ?></td>
                            <td><?php echo $employee->getBirth(); ?></td>
                            <td><?php echo $employee->getAge(); ?></td>
                            <td><?php echo $employee->getGender(); ?></td>
                            <td><?php echo $employee->getStartDate(); ?></td>
                            <td><?php echo $employee->getSalary(); ?></td>
                            <td>
                                <a href="show-salary.php?emp_no=<?php echo $employee->getEmpNo(); ?>">VIEW</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No employees found for department <?php echo $dept_no; ?></p>
        <?php } ?>
    </div>
</body>
</html>
