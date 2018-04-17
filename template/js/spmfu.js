
function add_row(tableID) {

    var table = document.getElementById(tableID);
    var row_count = table.rows.length;
    if(row_count <6){

        var row = table.insertRow(row_count);
        row.id = "row"+ (row_count-1);

        row.insertCell(0);
        var cell_1 = row.insertCell(1);
        var element_1 = document.createElement("img");
        element_1.src = "../image/minus_button.png";
        element_1.id = "minus_row"+(row_count);
        cell_1.appendChild(element_1);
        document.getElementById('minus_row'+(row_count)).style.width = "32px";
        document.getElementById('minus_row'+(row_count)).onclick = function () { minus_row(this)};
        document.getElementById('minus_row'+(row_count-1)).style.visibility = "hidden";

        var cell_2 = row.insertCell(2);
        cell_2.innerHTML = "Student " + (row_count);


        var cell_3 = row.insertCell(3);
        var element_3 = document.createElement("input");
        element_3.type = "text";
        element_3.id = "full_name" +(row_count);
        element_3.name = "full_name" +(row_count);
        element_3.placeholder = "";
        cell_3.appendChild(element_3);

        var cell_4 = row.insertCell(4);
        var element_4 = document.createElement("input");
        element_4.type = "text";
        element_4.id = "student_id"+(row_count);
        element_4.name = "student_id"+(row_count);
        element_4.placeholder = "";
        cell_4.appendChild(element_4);

        var cell_5 = row.insertCell(5);
        var element_5 = document.createElement("input");
        element_5.type = "text";
        element_5.id = "phone"+(row_count);
        element_5.name = "phone"+(row_count);
        element_5.placeholder = "";
        cell_5.appendChild(element_5);

        var cell_6 = row.insertCell(6);
        var element_6 = document.createElement("input");
        element_6.type = "text";
        element_6.id = "email"+(row_count);
        element_6.name = "email"+(row_count);
        element_6.placeholder = "";
        cell_6.appendChild(element_6);

        var cell_7 = row.insertCell(7);
        var element_7 = document.createElement("input");
        element_7.type = "radio";
        element_7.id = "is_teamleader"+(row_count);
        element_7.name = "is_teamleader";
        element_7.placeholder = "";
        element_7.value = "student"+row_count;
        cell_7.appendChild(element_7);

        document.getElementById('full_name'+(row_count)).required = true;
        document.getElementById('student_id'+(row_count)).required = true;
        document.getElementById('phone'+(row_count)).required = true;
        document.getElementById('email'+(row_count)).required = true;
    }

}

function minus_row(row){
    while (row.parentNode && row.tagName.toLowerCase() != 'tr') {
        row = row.parentNode;
    }
    if (row.parentNode && row.parentNode.rows.length > 1) {
        row.parentNode.removeChild(row);

    }
    var table = document.getElementById('student_list');
    var row_count = table.rows.length;
    document.getElementById('minus_row'+(row_count-1)).style.visibility = "visible";
}

