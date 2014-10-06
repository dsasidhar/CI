<section id="main-content">
    <section class="wrapper">
        <div class="mail-box" style="min-height:400px;">
            <aside class="lg-side">
                <div class="inbox-head">
                    <h3>Assign Testcase</h3>
                </div>
                <div class="inbox-body">
                    <form role="form" id="testcaseAssign" method="post" action="<?= site_url('dashboard/assign_testcase')?>">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <select id="project" >
                                    <option value="0"> Select Project</option>
                                <?php foreach($projects as $project) {?>
                                    <option value="<?= $project->id?>"> <?= $project->name?></option>
                                <?php }?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select multiple="multiple" id="requirements" name="requirements" placeholder="Select Requirements">
                                   
                                </select>
                                <input type="hidden" id="requirements_" name="requirements_"/>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <select multiple="multiple" id="testcases" name="testcases" placeholder="Select Testcases">
                                <?php foreach($testcases as $testcase){?>
                                    <option value="<?= $testcase->id?>"> <?= $testcase->name?></option>
                                <?php }?>
                                </select>
                                <input type="hidden" id="testcases_" name="testcases_"/>
                            </div>
                            <div class="form-group col-md-6">
                                <select multiple="multiple" name="assignedto" id="assignedto" class="form-control" placeholder="Assigned to">
                                <?php foreach($users as $user) {?>
                                    <option value="<?= $user->id?>"> <?= $user->Username?></option>
                                <?php }?>
                                </select>
                                <input type="hidden" id="assignedto_" name="assignedto_"/>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Assign Testcase</button>
                    </form>
                </div>
            </aside>
        </div>
    </section>
</section>
