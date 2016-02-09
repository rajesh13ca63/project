$(document).ready(function () {
        $("#list_records").jqGrid({
            url: "./gridlist.php",
            editurl:"addsearchdelete.php",
            datatype: "json",
            mtype: "POST",
            colNames: ["User Name", "First Name", "Last Name",
                        "Gender", "Date of Birth", "Marital-Status",
                        "Street", "City", "State",
                        "Phone no", "Eamil Id"
                        ],

            colModel: [
                { name: "username",align:"left",width:100},
                { name: "firstname",width:100,editable:true},
                { name: "lastname",width:100,editable:true},
                { name: "sex",width:50,editable:true},
                { name: "dob",width:80, editable:true},
                { name: "marital",width:60, editable:true},
                { name: "street",width:100,editable:true},
                { name: "city",width:100, editable:true},
                { name: "state",width:100, editable:true},
                { name: "phone",width:100, editable:true},
                { name: "email",width:200, editable:true}              
            ],

            pager: "#perpage",
            rowNum: 15,
            rowList: [10,20],
            sortname: "id",
            sortorder: "asc",
            height: '100%',
            width: '1100',
            selectionmode: 'singlecell',
            multiselect: true,
            editable: true,
            viewrecords: true,
            gridview: true,
            caption: "Personal Information",
            gridComplete: function(){
                var ids = jQuery("#list_records").jqGrid('getDataIDs');
                for(var i = 0;i<ids.length;i++){
                var cl = ids[i];
                be = "<input style='height:32px;width:40px;' type='button' value='Edit' onclick=\"jQuery('#list_records')";
                be += ".jqGrid('editRow','"+cl+"');\"  />"; 
                se = "<input style='height:32px;width:40px;' type='button' value='Save' onclick=\"jQuery('#list_records')";
                se += ".jqGrid('saveRow','"+cl+"');\"  />"; 
                ce = "<input style='height:32px;width:50px;' type='button' value='Cancel' onclick=\"jQuery('#list_records')";
                ce += ".jqGrid('restoreRow','"+cl+"');\" />"; 
                jQuery("#list_records").jqGrid('setRowData',ids[i],{act:be+se+ce});
                }
            }
    }); 

        $('#list_records').navGrid('#perpage', { 
                          edit: true, add: false,
                          del: true, search: true, 
                          refresh: true, view: true, 
                          position: "left", cloneToTop: true 
                          } );     
 
 });

 