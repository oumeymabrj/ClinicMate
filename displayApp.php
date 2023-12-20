<?php
            $servername = "localhost";
            $username = "admin";
            $password = "";
            $dbname = "clinicmate";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM appointments ORDER BY date";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["patient"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["time"] . "</td>";
                echo "<td>" . $row["doctor"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='5'>No appointments found</td></tr>";
            }
            $conn->close();
          ?>