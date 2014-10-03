<ul>
	<?php foreach($project_requirements as $project){ ?>
	<li data-jstree='{"opened":true}' id="proj_<?= $project["project_id"] ?>">
		<?= $project["project_name"] ?>
		<ul>
			<?php foreach($project['project_requirements'] as $requirements) {
				$name = implode("_",explode(" ",$requirements["current_node"]->name));
				?>
				<li data-jstree='{"opened":true}' name='<?= $name?>' id='reqGroup_<?=$project["project_id"]?>_<?=$requirements["current_node"]->id?>'> <?= $requirements['current_node']->name;?>									
					<?= printProjectRequirements($requirements,$project['project_id']);?>
				</li>
			<?php } ?>
		</ul>
	</li>
	<?php } ?>
</ul>

<?php
	function printProjectRequirements($requirements,$pro_id){
		$str = '';
		$str.='<ul>';
		foreach($requirements['direct_child'] as $dc){
			$name = implode("_",explode(" ",$requirements['current_node']->name));
			$str.= '<li name='.$name.' id="reqChild_'.$pro_id.'_'.$dc->id.'_'.$dc->rgid.'">'.$dc->name.'</li>';
		}
		foreach($requirements['child_group'] as $cg){

			$name = implode("_",explode(" ",$cg['current_node']->name));
			$str.= "<li data-jstree='{\"opened\":true}' name=".$name." id='reqGroup_".$pro_id."_".$cg["current_node"]->id."'>";
			$str.= $cg['current_node']->name.printProjectRequirements($cg,$pro_id).'</li>';
		}
		$str.='</ul>';

		return $str;
	}
?>