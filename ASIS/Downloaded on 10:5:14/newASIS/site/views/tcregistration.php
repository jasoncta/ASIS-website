<head>
<style>

label { float: left;width: 100px }
input {  width: 275px; }
b{ margin: 300px;}
h2{ margin-left: 75px;}
span.tab{
padding: 0 10px; /* Or desired space*/
}

</style>
<script>
function validateForm()
{
    var x=document.forms["myForm"]["teamName"].value;
    if (x==null || x=="")
    {
        alert("Team name must be filled out");
        return false;
    }
    
    var y=document.forms["myForm"]["captain"].value;
    if (y==null || y=="")
    {
        alert("Captain name must be filled out");
        return false;
    }
    
    var e=document.forms["myForm"]["email"].value;
    var atpos=e.indexOf("@");
    var dotpos=e.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=e.length)
    {
        alert("Not a valid e-mail address");
        return false;
    }
    
    var z=document.forms["myForm"]["phone"].value;
    if (z==null || z=="")
    {
        alert("Phone Number must be filled out");
        return false;
    }
    
    if(!document.getElementById('ol').checked && !document.getElementById('ip').checked) {
        alert("Please choose your payment method");
        return false;
    }
    
}
</script>
</head>

<h2>Trojans Cup Registration</h2><br>

<section class="container" id="trojanscup-header">
<div class="row">
<div class="twelvecol">
<form name="myForm" action="/completingRegistration" onsubmit="return validateForm();" method="post">
    <label>Team Name:</label> <input type="text" name="teamName"><br>
    <label>Captain:</label> <input type="text" name="captain"><br>
    <label>Email:</label>   <input type="text" name="email"><br>
    <label>Phone:</label>   <input type="text" name="phone"><br>
    <label>Jersey Color:</label>    <input type="text" name="jcolor"><br>
    <label>Payment Option:</label>
    <span class="tab"></span>
    <input type="radio" name="payment" id="ip" value="inperson"> In Person
    <span class="tab"></span>
    <input type="radio" name="payment" id="ol" value="online"> PayPal
    <br><b><input type="submit"></b>
</form>
</div>
</div>
</section>

