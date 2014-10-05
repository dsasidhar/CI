<section id="main-content">
    <section class="wrapper">
        <div class="mail-box" style="min-height:400px;">
            <aside class="lg-side">
                <div class="inbox-head">
                    <h3>Add Requirements</h3>
                </div>
                <div class="inbox-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <select name="type" class="form-control" id="reqtype">
                                <option value="default">Select Requirement Type</option>
                                <option value="group">Requirement Group</option>
                                <option value="leaf">Individual Requirement</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6"></div>
                    </div>
                    <form role="form" id="group" method="post" action="<?= site_url('dashboard/save_new_project')?>">
                        <div class="form-group">
                           <select name="parent" class="form-control"  id="parentid">
                                <option value="default">Select Project</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="requirementname" placeholder="Requirement Group Name">
                        </div>
                        <div class="form-group">
                           <select name="parent" class="form-control"  id="parentid">
                                <option value="default">Select Parent</option>
                                <option value="null">None</option>
                                <option value="id">ReguirementGroup-Subgroup-subgroup-etc</option>
                           </select>
                        </div>                        
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Add Requirement Group</button>
                    </form>
                    <form role="form" id="individual" method="post" action="<?= site_url('dashboard/save_new_project')?>">
                        <div class="form-group">
                           <select name="parent" class="form-control"  id="parentid">
                                <option value="default">Select Project</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <select name="parent" class="form-control"  id="parentid">
                                <option value="default">Select Parent</option>
                                <option value="null">None</option>
                                <option value="id">ReguirementGroup-Subgroup-subgroup-etc</option>
                           </select>
                        </div> 
                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" class="form-control" name="requirementname" placeholder="Requirement Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <select name="type" class="form-control"  id="type">
                                    <option value="default">Select Type</option>
                                    <option value="functional">Functional</option>
                                    <option value="nonfunctional">Non-Functional</option>
                               </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="priority" class="form-control" id="priority">
                                    <option value="default">Select Priority</option>
                                    <option value="1">Very High</option>
                                    <option value="2">High</option>
                                    <option value="3">Medium</option>
                                    <option value="4">Low</option>
                                    <option value="5">Very Low</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" name="requirementdescription" placeholder="Requirement Description"></textarea>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Add Requirement</button>
                    </form>
                </div>
            </aside>
        </div>
    </section>
</section>

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
        $str.= "<li name=".$name." id='reqGroup_".$pro_id."_".$cg["current_node"]->id."'>";
        $str.= $cg['current_node']->name.printProjectRequirements($cg,$pro_id).'</li>';
    }
    $str.='</ul>';

    return $str;
}
?>
