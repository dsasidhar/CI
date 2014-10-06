<section id="main-content">
    <section class="wrapper">
        <div class="mail-box" style="min-height:400px;">
            <aside class="lg-side">
                <div class="inbox-head">
                    <h3>Add Testcase</h3>
                </div>
                <div class="inbox-body">
                    <form role="form" id="testcaseAssign" method="post" action="<?= site_url('dashboard/')?>">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <select multiple="multiple" class="form-control" id="requirements" placeholder="Select Requirements">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select multiple="multiple" class="form-control" id="testcases" placeholder="Select Testcases">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <select name="runby" class="form-control">
                                    <option>Assigned to</option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                            </div>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Assign Testcase</button>
                    </form>
                </div>
            </aside>
        </div>
    </section>
</section>
