<?php
   // Printing out the results in a table
   
   foreach ($results as $row) {
      echo "<tr><td>".$row['name']."</td><td>".$row['COUNT(team.clubID)']."</td></tr>";
   }   
echo <<<_END
   </table>   
</body>
_END;
}

?>