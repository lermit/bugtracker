<h1>Priorities List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Label</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($priorities as $priority): ?>
    <tr>
      <td><a href="<?php echo url_for('priority/edit?id='.$priority->getId()) ?>"><?php echo $priority->getId() ?></a></td>
      <td><?php echo $priority->getLabel() ?></td>
      <td><?php echo $priority->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('priority/new') ?>">New</a>
