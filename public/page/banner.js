$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready( function () {
    var table = $('#MyTable').DataTable({
    responsive: true,
    "dom": 'l<"toolbar">frtip',
    columns: [
        {target:0, responsivePriority:0,orderable:false,serachable:false},
        {target:1, responsivePriority:1},
        {target:2, width:'40%',responsivePriority:6},
        {target:3, responsivePriority:5},
        {target:4, responsivePriority:4,orderable:false,serachable:false},
        {target:5, responsivePriority:3,orderable:false,serachable:false},
        {target:6, orderable:false,responsivePriority:2},
    ],
    drawCallback: function(settings){
        if($(this).find('tbody tr').length <= 10){
            $('#MyTable_paginate').hide();
        }
    },
    });
    $("#MyTable").on('length.dt',function(e,settings,len) {
        if($(this).find('tbody tr').length <= len){
            $('#MyTable_paginate').hide();
        }
    });

    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
});

function AddBanner() {
    $('#MyModal').modal({show:true});
}
$(document).ready(function() {
    $('#readmoreLink').show();
})
function readMoreShow() {
    var show = 1;
    if(this.show == 1){
        this.show = 0;
        $('#readmoreLink').show();
    }else{
        this.show = 1;
        $('#readmoreLink').hide();
        $('#readmoreLink').val("");
    }
}

function readMoreShow2() {
    var b = $('#readmoreLinkEdit').prop('checked');
    if(b == true){
        $('#readmoreLinkE').show();
        $('#readmoreLinkE').val("");
    }else{
        $('#readmoreLinkE').hide();
        $('#readmoreLinkE').val("");
    }

}
function ShowBanner(id) {
    // $.get('/adminsipbos/website/banner/detail/'+id)
    $.ajax({
        url : '/adminsipbos/website/banner/detail/'+id,
        type : 'GET',
        cache: false,
        success:function(data) {
            DetailBanner(data,'detail');
        }
    });
}
function ShowBannerEdit(id) {
    $.ajax({
        url : '/adminsipbos/website/banner/detail/'+id,
        type : 'GET',
        cache: false,
        success:function(data) {
            DetailBanner(data,'edit');
        }
    });
}

function DetailBanner(data,type) {
    if(type == 'detail'){
        $('#ModalTitle').text('Detail Banner');
        $('#NameEdit').val(data.banner_name).attr('readonly',true);
        $('#descEdit').val(data.banner_desc).attr('readonly',true);
            if(data.read_more_link == null){
                $('#readmoreLinkEdit').attr({checked:false, disabled:true});
                $('#readmoreLinkE').hide();
            }else{
                $('#readmoreLinkEdit').attr({checked:true, disabled:true});
                $('#readmoreLinkE').show();
                $('#readmoreLinkE').val(data.read_more_link).attr({disabled:true});
            }
            if(data.contact_us == null){
                $('#contactUsE').attr({checked:false, disabled:true});
            }else{
                $('#contactUsE').attr({checked:true, disabled:true});
            }
            $('#imgE').attr('src',"/img/banner/"+data.banner_img);
        $('#imgEditRow').hide();
        $('#MyBanner2Footer').hide();
    }else{
        $('#ModalTitle').text('Edit Banner');
        $('#saveForm').text('Update Change');
        $('#NameEdit').val(data.banner_name).attr('readonly',false);
        $('#IdBanner').val(data.id)
        $('#descEdit').val(data.banner_desc).attr('readonly',false);
        $('#MyBanner2Footer').show();
        if(data.read_more_link == null){
            $('#readmoreLinkEdit').attr({checked:false,disabled:false});
            $('#readmoreLinkE').show();
            $('#readmoreLinkE').hide();
        }else{
            $('#readmoreLinkEdit').attr({checked:true,disabled:false});
            $('#readmoreLinkE').show();
            $('#readmoreLinkE').val(data.read_more_link).attr({disabled:false});;
        }
        if(data.contact_us == null){
            $('#contactUsE').attr({checked:false,disabled:false});
        }else{
            $('#contactUsE').attr({checked:true,disabled:false});
        }
        $('#imgE').attr('src',"/img/banner/"+data.banner_img);
        $('#FormAction').attr('action','/adminsipbos/website/banner/edit');
    }
    $('#MyModal2').modal('show')
}
function ActiveBanner(id) {
    $.ajax({
            url : '/adminsipbos/website/banner/active',
            type : 'POST',
            data : {'id':id},
            cache: false,
            success:function(data) {
                location.reload();
            }
        });
}
function BannerDelete(params) {
    swal({
        title: "Kamu yakin ?",
        text: "Data Tidak akan bisa dikembalikan jika sudah dihapus!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Iya, Lanjut !",
        cancelButtonText: "Tidak, Kembali !",
    }).then((Deleted) => {
        if(Deleted.value == true){
            $.ajax({
                url : '/adminsipbos/website/banner/delete',
                type : 'POST',
                data : {'id':params},
                cache: false,
                success:function(data) {
                    location.reload();
                }
            });
        }
    });
}
