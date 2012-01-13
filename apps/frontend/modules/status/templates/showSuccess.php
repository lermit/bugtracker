<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $status->getId() ?></td>
    </tr>
    <tr>
      <th>Label:</th>
      <td><?php echo $status->getLabel() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $status->getDescription() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('status/edit?id='.$status->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('status/index') ?>">List</a>
