<div class="row">
      <div class="col-md-6 mx-auto form_container">

          <div class="form_title">Edit Lecturer</div>

          <form id="editLecturerForm" class="column form_content" method="POST" action="<?=base_url("lecturer/edit/process?id=$id")?>">

              <input type="hidden" id="id_field" value="<?=$id?>"/>

              <div class="row col-md-12">
                  <!--<div class="form_item col-md-3">
                      <span class="form_label">Lecturer ID</span>
                      <input class="form_input" type="text" placeholder="ID" name="id" value=""/>
                  </div>-->

                  <div class="form_item col-md-6">
                      <span class="form_label">Lecturer Name</span>
                      <input  class="form_input" type="text" placeholder="Name" name="name" value="<?=$Lec->getName()?>"/>
                  </div class="form_item">
              </div>

                <div class="row col-md-12">

                    <div class="form_item col-md-8">
                        <span class="form_label">Email Address</span>
                        <input class="form_input" type="text" placeholder="Email Address" name="emailaddress" value="<?=$Lec->getEmailAddress()?>"/>
                    </div>

                    <div class="form_item col-md-3">
                        <span class="form_label">Short Form</span>
                        <input class="form_input" type="text" placeholder="Shortform" name="shortform" value="<?=$Lec->getShortForm()?>"/>
                    </div>
                </div>
              <div class="form_item col-md-2">
                  <button type="submit">Submit</button>
              </div>


          </form>
      </div>
</div>


<?php if(isset($_GET['error']) && $_GET['error'] == true):?>
    <div id="errorModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Error</h4>
                </div>
                <div class="modal-body">
                    <p>There was an error in your form. Please try again.</p>
                </div>
                <div class="modal-footer">
                    <button type="button"  data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        $('#errorModal').modal('show');
    </script>
<?php endif ?>


<?php if(isset($_GET['success']) && $_GET['success'] == true):?>
    <div id="successModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Success</h4>
                </div>
                <div class="modal-body">
                    <p>Lecturer Details has been edited successfully.</p>
                </div>
                <div class="modal-footer">
                    <button type="button"  data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        $('#successModal').modal('show');
    </script>
<?php endif ?>

    <script src="<?=base_url('/assets/js/validation/edit_lecturer_validation.js')?>"></script>

    <style>
        label.error{
            color:red;
            font-size:12px;
            margin:0px;
            margin-left:5px;
        }
    </style>

