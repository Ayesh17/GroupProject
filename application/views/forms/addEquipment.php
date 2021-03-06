<div class="row">
    <div class="col-md-8 mx-auto form_container">

        <div class="form_title">Add Items</div>

        <form id="addEquipmentForm" class="column form_content" method="POST" action="<?=base_url("Equipment/process_add")?>">

            <div class="row col-md-12">
                <div class="form_item col-md-3">
                    <span class="form_label">Code</span>
                    <input class="form_input" type="text" placeholder="Code" name="code"/>
                </div>

                <div class="form_item col-md-6">
                    <span class="form_label">Type</span>
                    <select  class="form_input" type="text" placeholder="Name" name="name">
                        <option value="Laptop">Laptop</option>
                        <option value="Fan">Fan</option>
                        <option value="Converter">HDMI Converter</option>
                        <option value="Microphone">Microphone</option>
                        <option value="PortableMicrophone">Portable Microphone</option>
                        <option value="Pointer">Pointer</option>
                        <option value="Projector">Projector</option>
                        <option value="Extension">Extension Cord</option>
                    </select>
                </div>

                <div class="form_item col-md-3">
                    <span class="form_label">Description</span>
                    <input class="form_input" type="text" placeholder="Description" name="info"/>
                </div>

            </div>


            <div class="form_item col-md-3">
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
                    <p>Item has been added successfully.</p>
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

    <script src="<?=base_url('/assets/js/validation/add_equipment_validation.js')?>"></script>

    <style>
        label.error{
            color:red;
            font-size:12px;
            margin:0px;
            margin-left:5px;
        }
    </style>
