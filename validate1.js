function validate()
{ 
if( document.Registration.mob.value == "" ||
           isNaN( document.Registration.mob.value) ||
           document.Registration.mob.value.length != 10 )
   {
     alert( "Please provide a Mobile No in the format 123." );
     document.Registration.mob.focus() ;
     return false;
   }
   var email = document.Registration.email.value;
  atpos = email.indexOf("@");
  dotpos = email.lastIndexOf(".");
 if (email == "" || atpos < 1 || ( dotpos - atpos < 2 )) 
 {
     alert("Please enter correct email ID")
     document.Registration.email.focus() ;
     return false;
 }
  
   if( document.Registration.pincode.value == "" ||
           isNaN( document.Registration.pincode.value) ||
           document.Registration.pincode.value.length != 6 )
   {
     alert( "Please provide a pincode in the format ######." );
     document.Registration.pincode.focus() ;
     return false;
   }
   return( true );
}