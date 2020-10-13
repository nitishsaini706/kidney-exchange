<?php 

include("../templates/db-connect.php");

$sql = "SELECT * FROM pd_pairs ORDER BY pair_id";
$result = mysqli_query($conn, $sql);
$result_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="../css/data-style.css">

<?php include("../templates/header.php") ?>

  <div class="nav-container">
    <?php include("../templates/nav-bar.php") ?>
  </div>

  <div class="wrapper">

    <div id="button_block">
      <button name="overviewBtn" id="overviewBtn">Overview</button>
      <button name="Search" id="searchBtn">Search</button>
    </div>

    <div class="overview">
      <h2 >PD Pairs</h2>

      <table>
        <tr>
          <th>Pair ID</th>
          <th>Patient ID</th>
          <th>Donor ID</th>
          <th>Hospital ID</th>
          <th>Status</th>
        </tr>

        <?php foreach($result_array as $row){ ?>
          <tr>
            <td><?php echo $row['pair_id'] ?></td>
            <td><?php echo $row['patient_id'] ?></td>
            <td><?php echo $row['donor_id'] ?></td>
            <td><?php echo $row['hosp_id'] ?></td>
            <td><?php echo $row['status'] ?></td>
          </tr>
        <?php } ?>


      </table>
    </div>

    <form method="post" action="patient-data.php" class="search">
      <input type="text" name="id" id="id" placeholder="Enter the patient id here">
      <button type="submit" id="searchBtn" name='submit' value="submit">Search</button>
    </form>

  </div>

  <script src="../scripts/data.js"></script>
</body>
</html>