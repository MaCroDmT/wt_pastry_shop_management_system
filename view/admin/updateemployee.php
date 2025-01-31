<?php
require_once('../../control/admin/updateemployeeController.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';
$sal = isset($_GET['salary']) ? $_GET['salary'] : '';
$pos = isset($_GET['pos']) ? $_GET['pos'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Salary and Position</title>
</head>
<body>
    <h1>Update Employee Salary and Position</h1>
    <?php if (!empty($employees)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Date of Joining</th>
                    <th>Salary</th>
                    <th>Position</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($employee['name']); ?></td>
                        <td><?php echo htmlspecialchars($employee['phone']); ?></td>
                        <td><?php echo htmlspecialchars($employee['email']); ?></td>
                        <td><?php echo htmlspecialchars($employee['address']); ?></td>
                        <td><?php echo htmlspecialchars($employee['doj']); ?></td>
                        <td><?php echo htmlspecialchars($employee['sal']); ?></td>
                        <td><?php echo htmlspecialchars($employee['pos']); ?></td>
                        <td>
                            <a href="updateemployee.php?id=<?php echo $employee['id']; ?>&salary=<?php echo urlencode($employee['sal']); ?>&pos=<?php echo urlencode($employee['pos']); ?>">
                                Select
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No Employees found.</p>
    <?php endif; ?>

    <h2>Edit Salary and Position</h2>
    <fieldset>
        <form action="../../control/admin/updateemployeeController.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <p>
                <label for="sal">Salary:</label>
                <input type="text" name="sal" id="sal" value="<?php echo htmlspecialchars($sal); ?>">
            </p>

            <p>
                <label for="pos">Position:</label>
                <select name="pos" id="pos">
                    <option value="Manager" <?php echo $pos == 'Manager' ? 'selected' : ''; ?>>Manager</option>
                    <option value="Waiter" <?php echo $pos == 'Waiter' ? 'selected' : ''; ?>>Waiter</option>
                    <option value="Cleaner" <?php echo $pos == 'Cleaner' ? 'selected' : ''; ?>>Cleaner</option>
                    <option value="Baker" <?php echo $pos == 'Baker' ? 'selected' : ''; ?>>Baker</option>
                </select>
            </p>

            <p>
                <input type="submit" name="submit" value="Update Employee">
            </p>
        </form>
    </fieldset>
</body>
</html>
