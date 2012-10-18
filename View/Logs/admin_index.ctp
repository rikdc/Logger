<?php echo $this->Html->addCrumb(__('System Manager'), array('controller' => 'dashboards')); ?>
<?php echo $this->Html->addCrumb(__('Logs'), null); ?>

<div class="paginator">
<?php echo $this->Paginator->counter(array(
            'format' => 'Showing records %start% to %end% of %count%'
    )); ?>
</div>
<table class="tabledata table data">
    <tr>
        <th>Date</th>
        <th>Entry</th>
        <th></th>
    </tr>
    <?php foreach ($logs as $line): ?>
    <tr>
        <td><?php echo $this->Time->niceShort($line['Log']['created']); ?></td>
        <td><?php echo Sanitize::html($line['Log']['message']); ?></td>
        <td><?php echo $this->Html->link(__('View'), array('action' => 'view', $line['Log']['id'])); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<div class="paginator">
<?php echo $this->Paginator->prev('&laquo; Prev', array('escape' => false), null, array('escape' => false, 'class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(); ?>
<?php echo $this->Paginator->next('Next &raquo;', array('escape' => false), null, array('escape' => false, 'class' => 'disabled'));?>
</div>