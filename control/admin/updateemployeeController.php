<?php
require_once('../../model/employeeModel.php');

$employeeModel = new EmployeeModel();
$employees = $employeeModel->getAllEmployees();

if (isset($_POST['submit'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $sal = isset($_POST['sal']) ? $_POST['sal'] : '';
    $pos = isset($_POST['pos']) ? $_POST['pos'] : '';

    if (!empty($id) && !empty($sal) && !empty($pos)) {
        $result = $employeeModel->updateEmployeeSalaryAndPosition($id, $sal, $pos);

        if ($result) {
            header("Location: ../../view/admin/updateemployee.php");
            exit();
        } else {
            echo "Failed to update salary and position.";
        }
    } else {
        echo "Please provide valid data for Salary and Position.";
    }
}
?>
