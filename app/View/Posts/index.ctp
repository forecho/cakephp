<!-- File: /app/View/Posts/index.ctp -->
<h1>Blog posts</h1>
<p><?php echo $this->Html->link('新建文章', array('controller' => 'posts', 'action' => 'add')) ?></p>
<p><a href="#" onclick='toQzoneLogin()'><img src="/img/Connect_logo_4.png"></a></p>
<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
        <th><?php echo $this->Paginator->sort('title', '标题'); ?></th>
        <th><?php echo $this->Paginator->sort('created', '创建时间'); ?></th>
        <th>操作</th>
    </tr>
 
<!-- Here is where we loop through our $posts array, printing out post info -->
 
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php 
            	echo $this->Html->link(
	            		$post['Post']['title'],
						array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])
					); 
			?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
        <td>
            <?php 
            	echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id']));
            	echo '  ';
            	echo $this->Form->postLink(
                	'Delete',
                	array('action' => 'delete', $post['Post']['id']),
                	array('confirm' => 'Are you sure?')
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php
    echo $this->Paginator->numbers(array('first'=>'首页', 'last'=>'尾页'));
?>
<script type="text/javascript">
    var childWindow;
    function toQzoneLogin()
    {
        childWindow = window.open("/oauth/index","TencentLogin","width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
    } 
    
    function closeChildWindow()
    {
        childWindow.close();
    }
</script>