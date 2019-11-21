 <!-- MAIN CONTENT-->
 <?php $em_user = $this->db->get_where('tbl_admin',['email'=>$this->session->userdata('email')])->row_array(); ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="col-lg-12">
                    <div class="card">
                                    <div class="card-header">Account</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Account Profile</h3>
                                        </div>
                                        <hr>
                                        <?php if($success = $this->session->flashdata('response') ):?>
                                            <div class="alert alert-success alert-dismissable">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                <?php echo $success; ?> <a class="alert-link" href="#"></a>.
                                            </div>
                                            <?php endif; ?>
                                            <?php if($error = $this->session->flashdata('msg') ):?>
                                            <div class="alert alert-danger alert-dismissable">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                <?php echo $error; ?> <a class="alert-link" href="#"></a>.
                                            </div>
                                            <?php endif; ?>

                                            <?php if($success = $this->session->flashdata('response2') ):?>
                                            <div class="alert alert-success alert-dismissable">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                <?php echo $success; ?> <a class="alert-link" href="#"></a>.
                                            </div>
                                            <?php endif; ?>
                                            <?php if($error = $this->session->flashdata('msg2') ):?>
                                            <div class="alert alert-danger alert-dismissable">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                <?php echo $error; ?> <a class="alert-link" href="#"></a>.
                                            </div>
                                            <?php endif; ?>
                                        <form action="Account_edit" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                            <input type="text" name="id" value="<?php echo $em_user['user_Id'] ?>" hidden>
                                                <label for="cc-payment" class="control-label mb-1">Name</label>
                                                <input  name="name" type="text" value="<?php echo $em_user['name'] ?>" class="form-control"  readonly>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Email</label>
                                                <input  name="email" type="text" value="<?php echo $em_user['email'] ?>" class="form-control "readonly>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Status</label>
                                                <input id="cc-number" name="cc-number" type="text" value="<?php echo $em_user['status'] ?>" class="form-control " readonly>
                                                 
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Password</label>
                                                        <input  name="Password" type="password" id="Password" class="form-control cc-exp" value="" >
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Confirm Password</label>
                                                    <div class="input-group">
                                                        <input  name="CPassword" type="password" id="CPassword" class="form-control cc-cvc" value="">
                                                    </div>
                                                    <span id="message" style="margin-left: 19px;"></span>
                                                </div>
                                            </div>
                                            <div><br>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">บันทึก</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>