// JavaScript Document

function add_Validate() 
{
	//Email Validation
	if (document.form_add.slttype.value=='') 
    {
       var error=""
		var error = 'Please Select Machine Type!';
		document.getElementById("add_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_add.sltspeci.value=='') 
    {
       var error=""
		var error = 'Please Select Machine Cluster!';
		document.getElementById("add_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_add.txtname.value=='') 
    {
       var error=""
		var error = 'Please fill in your Machine Name!';
		document.getElementById("add_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_add.txtip.value=='') 
    {
       var error=""
		var error = 'Please fill in your Machine IP!';
		document.getElementById("add_error_msg").innerHTML=error;
       return false;
    }
	
	var regex = /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;
    if (!regex.test(document.form_add.txtip.value)) 
    {
       var error=""
		var error = 'Please fill in your Valid Machine IP!';
		document.getElementById("add_error_msg").innerHTML=error;
       return false;
    }
    return true;
}

function modify_ip_Validate() 
{
	if (document.form_edit_ip.slttype.value=='') 
    {
       var error=""
		var error = 'Please Select Machine Type!';
		document.getElementById("edit_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_edit_ip.sltip.value=='') 
    {
       var error=""
		var error = 'Please Select Machine IP Address!';
		document.getElementById("edit_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_edit_ip.txtname.value=='') 
    {
       var error=""
		var error = 'Please fill in your Machine Name!';
		document.getElementById("edit_error_msg").innerHTML=error;
       return false;
    }
    return true;
}

function modify_name_Validate() 
{
	//Email Validation
	if (document.form_edit_name.sltname.value=='') 
    {
       var error=""
		var error = 'Please Select Machine Name!';
		document.getElementById("edit_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_edit_name.slttype.value=='') 
    {
       var error=""
		var error = 'Please Select Machine Type!';
		document.getElementById("edit_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_edit_name.sltspeci.value=='') 
    {
       var error=""
		var error = 'Please Select Machine Cluster!';
		document.getElementById("edit_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_edit_name.txtip.value=='') 
    {
       var error=""
		var error = 'Please fill in your Machine IP!';
		document.getElementById("edit_error_msg").innerHTML=error;
       return false;
    }
	
	var regex = /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;
    if (!regex.test(document.form_edit_name.txtip.value)) 
    {
       var error=""
		var error = 'Please fill in your Valid Machine IP!';
		document.getElementById("edit_error_msg").innerHTML=error;
       return false;
    }
    return true;
}


function remove_Validate() 
{
	//Email Validation
	if (document.form_remove.slttype.value=='') 
    {
       var error=""
		var error = 'Please Select Machine Type!';
		document.getElementById("remove_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_remove.txtip.value=='') 
    {
       var error=""
		var error = 'Please fill in your Machine IP!';
		document.getElementById("remove_error_msg").innerHTML=error;
       return false;
    }
	
	var regex = /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;
    if (!regex.test(document.form_remove.txtip.value)) 
    {
       var error=""
		var error = 'Please fill in your Valid Machine IP!';
		document.getElementById("remove_error_msg").innerHTML=error;
       return false;
    }
    return true;
}

function add_IPMI_ILO_Validate() 
{
	
	if (document.form_add_ipmi.txtname.value=='') 
    {
       var error=""
		var error = 'Please fill in your Machine Name!';
		document.getElementById("add_ipmi_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_add_ipmi.txtip.value=='') 
    {
       var error=""
		var error = 'Please fill in your Machine IP!';
		document.getElementById("add_ipmi_error_msg").innerHTML=error;
       return false;
    }
	
	var regex = /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;
    if (!regex.test(document.form_add_ipmi.txtip.value)) 
    {
       var error=""
		var error = 'Please fill in your Valid Machine IP!';
		document.getElementById("add_ipmi_error_msg").innerHTML=error;
       return false;
    }
    return true;
}

function addsite_Validate() 
{
	//Email Validation
	if (document.form_addsite.txtsitename.value=='') 
    {
       var error=""
		var error = 'Please fill in your Site Name!';
		document.getElementById("addsite_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_addsite.txtsiteurl.value=='') 
    {
       var error=""
		var error = 'Please fill in your URL!';
		document.getElementById("addsite_error_msg").innerHTML=error;
       return false;
    }
	
	
	if (document.form_addsite.txtpublicip.value=='') 
    {
       var error=""
		var error = 'Please fill in your Machine Public IP!';
		document.getElementById("addsite_error_msg").innerHTML=error;
       return false;
    }
	
	var regex = /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;
    if (!regex.test(document.form_addsite.txtpublicip.value)) 
    {
       var error=""
		var error = 'Please fill in your Machine Valid Public IP!';
		document.getElementById("addsite_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_addsite.txtlocalip.value=='') 
    {
       var error=""
		var error = 'Please fill in your Machine Local IP!';
		document.getElementById("addsite_error_msg").innerHTML=error;
       return false;
    }
	
	var regex = /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;
    if (!regex.test(document.form_addsite.txtlocalip.value)) 
    {
       var error=""
		var error = 'Please fill in your Machine Valid Local IP!';
		document.getElementById("addsite_error_msg").innerHTML=error;
       return false;
    }

    return true;
}

function removesite_Validate() 
{
	if (document.form_removesite.txtsitename.value=='') 
    {
       var error=""
		var error = 'Please fill in your Site Name!';
		document.getElementById("removesite_error_msg").innerHTML=error;
       return false;
    }
	
    return true;
}

function add_Validate() 
{
	//Email Validation
	if (document.form_add.slttype.value=='') 
    {
       var error=""
		var error = 'Please Select Machine Type!';
		document.getElementById("add_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_add.sltspeci.value=='') 
    {
       var error=""
		var error = 'Please Select Machine Cluster!';
		document.getElementById("add_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_add.txtname.value=='') 
    {
       var error=""
		var error = 'Please fill in your Machine Name!';
		document.getElementById("add_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_add.txtip.value=='') 
    {
       var error=""
		var error = 'Please fill in your Machine IP!';
		document.getElementById("add_error_msg").innerHTML=error;
       return false;
    }
	
	var regex = /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;
    if (!regex.test(document.form_add.txtip.value)) 
    {
       var error=""
		var error = 'Please fill in your Valid Machine IP!';
		document.getElementById("add_error_msg").innerHTML=error;
       return false;
    }
    return true;
}

function Login_Validate() 
{
	//Email Validation
	if (document.form_login.user.value=='') 
    {
       var error=""
		var error = 'Please Enter Username!';
		document.getElementById("login_error_msg").innerHTML=error;
       return false;
    }
	
	if (document.form_login.pass.value=='') 
    {
       var error=""
		var error = 'Please Enter Password!';
		document.getElementById("login_error_msg").innerHTML=error;
       return false;
    }
    return true;
}