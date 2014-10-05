<?php
$open_attr ="'{\"opened\":true}'";
$open_select_attr = "'{\"opened\":true,\"selected\":true}'";
$icon ="'{\"icon\":\"glyphicon glyphicon-leaf\"}'";
?>
<ul>
	<?php 
	foreach($project_requirements as $project){
		if(isset($path)){
			$proj = ($path["parent_project_node"] == $project["project_id"]) ? 1 : 0;
		}
		else $proj = 0;
		?>
		<li <?php if($proj){ ?> data-jstree=<?= $open_attr?> <?php }?> id="proj_<?= $project["project_id"] ?>">
			<?= $project["project_name"] ?>
			<ul>
				<?php 
				// var_dump($path["parent_group_nodes"]);
				foreach($project['project_requirements'] as $requirements) {
					$name = implode("_",explode(" ",$requirements["current_node"]->name));
					$isopen_node = 0;
					if(isset($path)){ 
						if(in_array($requirements["current_node"]->id, $path["parent_group_nodes"])) $isopen_node = 1; 
					}
					?>
					<li <?php if($isopen_node){ ?> data-jstree=<?= $open_attr?> <?php } ?> name='<?= $name?>' id='reqGroup_<?=$project["project_id"]?>_<?=$requirements["current_node"]->id?>'> <?= $requirements['current_node']->name;?>									
						<?php 
						if(isset($path)) echo printProjectRequirements($requirements,$project['project_id'],$path);
						else echo printProjectRequirements($requirements,$project['project_id'], NULL);
						?>
					</li>
					<?php } ?>
				</ul>
			</li>
			<?php } ?>
		</ul>

		<?php
		function printProjectRequirements($requirements,$pro_id,$path){
			$open_attr ="'{\"opened\":true}'";
			$open_select_attr = "'{\"opened\":true,\"selected\":true}'";
			$icon ="'{\"icon\":\"glyphicon glyphicon-leaf\"}'";
			$str = '';
			$str.='<ul>';
			foreach($requirements['direct_child'] as $dc){
				$name = implode("_",explode(" ",$requirements['current_node']->name));
				$str.= '<li data-jstree='.$icon.' name="'.$name.'" id="reqChild_'.$pro_id.'_'.$dc->id.'_'.$dc->rgid.'">'.$dc->name.'</li>';
			}
			foreach($requirements['child_group'] as $cg){

				$name = implode("_",explode(" ",$cg['current_node']->name));
				$isopen_node = 0;
				if($path){ 
					if(in_array($cg["current_node"]->id, $path["parent_group_nodes"])) $isopen_node=1;
				}
				if($isopen_node) $str.= "<li data-jstree=".$open_attr." name=".$name." id='reqGroup_".$pro_id."_".$cg["current_node"]->id."'>";
				else $str.= "<li name='".$name."'' id='reqGroup_".$pro_id."_".$cg["current_node"]->id."'>";

				if(isset($path)) $str.= $cg['current_node']->name.printProjectRequirements($cg,$pro_id,$path).'</li>';
				$str.= $cg['current_node']->name.printProjectRequirements($cg,$pro_id,NULL).'</li>';
			}
			$str.='</ul>';

			return $str;
		}

		?>