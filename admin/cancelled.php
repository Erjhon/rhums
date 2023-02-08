<?php if($_settings->chk_flashdata('success')): ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
    </script>
<?php endif;?>
<style>
    #selectAll{
        top:0
    }
</style>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h2 class="card-title text-center">List of Cancelled Appointments</h2>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row" style="display:none" id="selected_opt">
                <div class="w-100 d-flex">
                    <div class="col-2">
                        <label for="" class="controllabel"> With Selected:</label>
                    </div>
                    <div class="col-3">
                        <select id="w_selected" class="custom-select select" >
                            <option value="pending">Mark as Done</option>
                            <option value="cancelled">Mark as Cancelled</option>
                            <option value="confirmed">Mark as Confirmed</option>
                            <option value="delete">Delete</option>
                        </select>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="button" id="selected_go">Go</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-stripped" id="indi-list">
                    <colgroup>
                        <col width="1%">
                        <col width="5%">
                        <col width="10%">
                        <col width="25%">
                        <col width="20%">
                        <col width="20%">
                        <col width="100%">
                    </colgroup>
                    <thead>
                        <tr>
                            <td class="text-center"><div class="form-check">
                                <input type="checkbox" class="form-check-input" id="selectAll">
                            </div></td>
                            <th class="text-center">#</th>
                            <th>Appointment No.</th>
                            <th>Patient Name</th>
                            <th>Reason</th>
                            <th>Schedule</th>
                            <!-- <th>Type</th> -->
                            <th>Cancelled By</th>
                            <!-- <th>Creation Date</th> -->
                            <th>Date Cancelled</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $qry = $conn->query("SELECT p.*,a.sched_date,a.reason,a.status,a.cancelled_by,a.cancelled_time,a.id as aid from `patient_list` p inner join `appointments` a on p.id = a.patient_id WHERE a.status = 2 order by unix_timestamp(a.date_sched) desc ");

                        while($row = $qry->fetch_assoc()):
                            ?>

                            <tr>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input invCheck" value="<?php echo $row['id'] ?>">
                                    </div>
                                </td>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td><b>PA-<?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?> <?php echo $row['mname'] ?>. <?php echo $row['lname'] ?></td>
                                    <td><?php echo $row['reason'] ?></td>
                                    <td><?php echo date("M d, Y h:i A",strtotime($row['sched_date'])) ?></td>
                                    <td><?php echo $row['cancelled_by'] ?></td>
                                    <!-- <td><?php echo $row['name'] ?></td> -->
                                    <td><?php echo date("M d, Y h:i A",strtotime($row['cancelled_time'])) ?></td>
                                    <!-- <td><?php echo date("M d, Y h:i A",strtotime($row['date_created'])) ?></td> -->
                                    <td class="text-center">
                                        <?php 
                                        switch($row['status']){ 
                                            case(0): 
                                            echo '<span class="badge badge-info">Done</span>';
                                            break; 
                                            case(1): 
                                            echo '<span class="badge badge-success">Confirmed</span>';
                                            break; 
                                            case(2): 
                                            echo '<span class="badge badge-warning">Cancelled</span>';
                                            break; 
                                            default: 
                                            echo '<span class="badge badge-secondary">NA</span>';
                                        } 
                                        ?>
                                    </td>
                                                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <script>
$(document).on('click', '.add_record', function(){
    var id = $(this).data('id');
    var reason = $(this).data('reason');

    switch(true) {
        case (reason == 'Check-up'):
            window.location.href = "<?php echo base_url; ?>admin/?page=add-record&id=" + id;
            break;
        case (reason == 'Animals Bite'):
            window.location.href = "<?php echo base_url; ?>admin/?page=add-recordAB&id=" + id;
            break;
        case (reason == 'Immunization for Child' || reason == 'Immunization for Senior Citizens'):
            window.location.href = "<?php echo base_url; ?>admin/?page=add-immunization&id=" + id;
            break;
    }
});
</script>
        <script>
            var indiList;
            $(document).ready(function(){
                $('.view_data').click(function(){
                    uni_modal("Appointment Details","appointments/view_details.php?id="+$(this).attr('data-id'))
                })
                $('#create_new').click(function(){
                    uni_modal("Appointment Form","appointments/manage_appointment.php",'mid-large')
                })
                $('.edit_data').click(function(){
                    uni_modal("Edit Appointment Details","appointments/edit_appointment.php?id="+$(this).attr('data-id'),'mid-large')
                })
                $('#selectAll').change(function(){
// if($(this).is(":checked") == true){
//  $('.invCheck').prop("checked",true)
// }else{
//  $('.invCheck').prop("checked",false)
// }
                    var _this = $(this)
                    count = indiList.api().rows().data().length
                    for($i = 0 ; $i < count; $i++){
                        var node = indiList.api().row($i).node()
                        console.log($(node).find('.invCheck'))
                        if(_this.is(":checked") == true){
                            $(node).find('.invCheck').prop("checked",true)
                            $('#selected_opt').show('slow')
                        }else{
                            $(node).find('.invCheck').prop("checked",false)
                            $('#selected_opt').hide('slow')
                        }
                    }
                })

            })
            $(function(){
                indiList = $('#indi-list').dataTable({
                    columnDefs:[{
                        targets:[0,5],
                        orderable:false
                    }],
                    order:[[1,'asc']],
                });
// console.log(indiList)
                $(indiList.fnGetNodes()).find('.invCheck').change(function(){
                    if($(this).is(":checked")==true){
                        if($('#selected_opt').is(':visible') == false){
                            $('#selected_opt').show('slow')
                        }

                    }else{
                        if($(indiList.fnGetNodes()).find('.invCheck:checked').length <= 0){
                            if($('#selected_opt').is(':visible') == true){
                                $('#selected_opt').hide('slow')
                            }
                        }
                    }
                    if($(indiList.fnGetNodes()).find('.invCheck:checked').length == $(indiList.fnGetNodes()).find('.invCheck').length){
                        $('#selectAll').prop('checked',true)
                    }else if($(indiList.fnGetNodes()).find('.invCheck:checked').length <= 0){
                        $('#selectAll').prop('checked',false)
                    }else{
                        $('#selectAll').prop('checked',false)
                    }
                })

                $('#selected_go').click(function(){
                    start_loader();
                    var ids = [];
                    $(indiList.fnGetNodes()).find('.invCheck:checked').each(function(){
                        ids.push($(this).val())
                    })
                    var _action = $('#w_selected').val()
                    $.ajax({
                        url:_base_url_+'classes/Master.php?f=multiple_action',
                        method:"POST",
                        data:{ids:ids,_action:_action},
                        dataType:'json',
                        error:err=>{
                            console.log(err)
                            alert_toast("An error occured",'error');
                            end_loader();
                        },
                        success:function(resp){
                            if(typeof resp =='object' && resp.status == 'success'){
                                location.reload();
                            }else if(resp.status == 'failed' && !!resp.msg){
                                alert_toast(resp.msg,'error');
                                end_loader()
                            }else{
                                alert_toast("An error occured",'error');
                                end_loader();
                                console.log(resp)
                            }
                        }
                    })
                })
            })
        </script>