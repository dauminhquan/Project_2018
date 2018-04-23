function showModalLec(i) {
    $("#id_lec").val(i)
    axios.get("/api/lecturer/"+i).then((data)=> {
        var inf = data.data
        $("#form_infor input[name='name_lecturer']").val(inf.name_lecturer)
        $("#form_infor input[name='address_lecturer']").val(inf.address_lecturer)
        $("#form_infor input[name='email_address_lecturer']").val(inf.email_address_lecturer)
        $("#form_infor input[name='phone_number']").val(inf.phone_number)
        axios.get("/api/department").then((data2) => {
            var dt = data2.data
            var html =''
            for (var z = 0;z < dt.length;z++)
            {
                if(data.data.id_department == dt[z].id)
                {
                    html+="<option value='"+dt[z].id+"'selected >"+dt[z].department_name+"</option>"
                }
                else {
                    html+="<option value='"+dt[z].id+"'>"+dt[z].department_name+"</option>"
                }

            }

            $("#form_infor select[name='id_department']").html(html)

        }).catch((err) => {
            console.log(err)
        })

        axios.get("/api/field").then((data2) => {

            var html =''
            for (var z = 0;z < data2.data.length;z++)
            {

                if(data2.data[z].id == data.data.id_field)
                {
                    html+="<option value='"+data2.data[z].id+"' selected>"+data2.data[z].field_name+"</option>"
                }
                else {
                    html+="<option value='"+data2.data[z].id+"'>"+data2.data[z].field_name+"</option>"
                }

            }
            $("#form_infor select[name='id_field']").html(html)

        }).catch((err) => {
            console.log(err)
        })
        $("#modal_iconified").modal("show")
    }).catch((err) => {
        console.log(err)
    })

    // lay thong

}
$(document).ready(function () {
    $("#submit_edit").click(function () {

        var id = $("#id_lec").val()

        axios.put("/api/lecturer/"+id,{
            name_lecturer : $("#form_infor input[name='name_lecturer']").val(),
            address_lecturer: $("#form_infor input[name='address_lecturer']").val(),
            email_address_lecturer : $("#form_infor input[name='email_address_lecturer']").val(),
            phone_number : $("#form_infor input[name='phone_number']").val(),
            id_department: $("#form_infor select[name='id_department']").val(),
            id_field :$("#form_infor select[name='id_field']").val()
        }).then((data)=> {

            axios.get("/api/lecturer").then((data) => {
                var data1 = filData(data.data)

                $('#datatable-basic').dataTable().fnClearTable();
                $('#datatable-basic').dataTable().fnAddData(data1);
                swal({
                    title: "Thành công!",
                    text: "Thông tin đã được thay đổi!",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });
                $("#modal_iconified").modal("hide")

            }).catch((err) => {
                console.log(err)
            })
        }).catch((err) => {
            console.log(err)
        })
    })
})
function filData(data_lec){
    // name_lecturer
    //id
    //department_name - khoa
    // chu de field_name
    var td = data_lec.map(function (value,index) {
        var htmlAction = ''
        return [
            value.name_lecturer,
            value.department_name,
            value.email,
            value.email_address_lecturer,
            '<ul style="text-align: center;" class="icons-list">' +
            '   <li class="dropdown">' +
            '       <a href="#" class="dropdown-toggle" data-toggle="dropdown">' +
            '           <i class="icon-menu9"></i>' +
            '       </a>' +
            '<ul class="dropdown-menu dropdown-menu-right">' +
            '<li>' +
            '   <a href="#" onclick="showModalLec('+value.id+')">' +
            '       <i class=" icon-user"></i> Thông tin chi tiết' +
            '   </a>' +
            '</li>' +
            '<li>' +
            '   <a href="#" onclick="delete_lec('+value.id+')">' +
            '<i class="icon-user-cancel"></i> Xóa' +
            '</a>' +
            '</li>' +
            '</ul>' +
            '</li>' +
            '</ul>'
        ]
    })


    return td;
}
function delete_lec(id) {

    $("#delete_button").attr("data",id)
    $("#modal_theme_danger").modal("show")

}

var html = '<a href="#" class="dropdown-toggle" data-toggle="dropdown">\n' +
    '\t\t\t\t\t\t\t\t\t\t\t\t<i class="icon-menu9"></i>\n' +
    '\t\t\t\t\t\t\t\t\t\t\t</a>\n' +
    '\n' +
    '\t\t\t\t\t\t\t\t\t\t\t<ul class="dropdown-menu dropdown-menu-right">\n' +
    '\t\t\t\t\t\t\t\t\t\t\t\t<li><a href="#"><i class="icon-file-pdf"></i> Thông tin cá nhân</a></li>\n' +
    '\t\t\t\t\t\t\t\t\t\t\t\t<li><a href="#"><i class="icon-file-excel"></i> Xóa người dùng</a></li>\n' +
    '\t\t\t\t\t\t\t\t\t\t\t</ul>'