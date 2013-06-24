<?php 
use PHPBootstrap\Widget\Tree\TreeNode;
use PHPBootstrap\Widget\Tree\Tree;
?>
<fieldset>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>Tree</em>
		<?php
		$ui = new Tree('treeview');
		$node1 = new TreeNode('item-1', 'Item 1');
		$node2 = new TreeNode('item-1.1', 'Item 1.1');
		$node2->addNode(new TreeNode('item-1.1.1', 'Item 1.1.1'));
		$node2->addNode(new TreeNode('item-1.1.2', 'Item 1.1.2'));
		$node2->addNode(new TreeNode('item-1.1.3', 'Item 1.1.3'));
		$node1->addNode($node2);
		$node1->addNode(new TreeNode('item-1.2', 'Item 1.2'));
		$ui->addNode($node1);
		
		$node1 = new TreeNode('item-2', 'Item 2');
		$node2 = new TreeNode('item-2.1', 'Item 2.1');
		$node2->addNode(new TreeNode('item-2.1.1', 'Item 2.1.1'));
		$node2->addNode(new TreeNode('item-2.1.2', 'Item 2.1.2'));
		$node2->addNode(new TreeNode('item-2.1.3', 'Item 2.1.3'));
		$node1->addNode($node2);
		$node1->addNode(new TreeNode('item-2.2', 'Item 2.2', null, false));
		$ui->addNode($node1);
		$ui->render();
		?>
	</div>
	<script type="text/javascript">
	$(function(){
		$('#treeview li').each(function(i, item) {
			$('span:first', item).append('<a href="#" class="btn btn-link btn-mini"><i class="icon-remove"></i></a><a href="#" class="btn btn-link btn-mini"><i class="icon-plus"></i></a>');
		});
	});
	</script>
</fieldset>