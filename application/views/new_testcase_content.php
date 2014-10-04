<section id="main-content">
    <section class="wrapper">
        <div class="mail-box" style="min-height:400px;">
            <aside class="lg-side">
                <div class="inbox-head">
                    <h3>Add Testcase</h3>
                </div>
                <div class="inbox-body">
                    <form role="form" id="individual" method="post" action="<?= site_url('dashboard/save_new_project')?>">
                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" class="form-control" name="testcasename" placeholder="Testcase Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" name="testcasedescription" placeholder="TestCase Description"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <textarea class="form-control" rows="4" name="expectedinput" placeholder="Expected Input"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <textarea class="form-control" rows="4" name="expectedoutput" placeholder="Expected Output"></textarea>
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
