<h1>Issues List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Label</th>
      <th>Description</th>
      <th>Status</th>
      <th>Priority</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Issues as $Issue): ?>
    <tr>
      <td><a href="<?php echo url_for('issue/edit?id='.$Issue->getId()) ?>"><?php echo $Issue->getId() ?></a></td>
      <td><?php echo $Issue->getLabel() ?></td>
      <td><?php echo $Issue->getDescription() ?></td>
      <td><?php echo $Issue->getStatusId() ?></td>
      <td><?php echo $Issue->getPriorityId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('issue/new') ?>">New</a>
