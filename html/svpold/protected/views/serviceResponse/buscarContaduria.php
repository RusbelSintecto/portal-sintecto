<table>
  <thead>
    <tr>
      <th colspan="2">Contaduría</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        <td>
            <?php 
                $jsonText = json_encode($resultado);
                echo Controller::jsonToDebug($jsonText);
            ?>
        </td>
      </tr>    
  </tbody>
</table>