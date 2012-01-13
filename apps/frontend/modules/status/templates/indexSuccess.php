<h1>Status List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Label</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($status as $status): ?>
    <tr>
      <td><a href="<?php echo url_for('status/show?id='.$status->getId()) ?>"><?php echo $status->getId() ?></a></td>
      <td><?php echo $status->getLabel() ?></td>
      <td><?php echo $status->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('status/new') ?>">New</a>
