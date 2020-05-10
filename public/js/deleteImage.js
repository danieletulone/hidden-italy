// npm run dev

// $('#contactForm').on('submit',function(event){
//     event.preventDefault();

//     name = $('#name').val();
//     email = $('#email').val();
//     mobile_number = $('#mobile_number').val();
//     subject = $('#subject').val();
//     message = $('#message').val();

//     $.ajax({
//       url: "/contact-form",
//       type:"POST",
//       data:{
//         "_token": "{{ csrf_token() }}",
//         name:name,
//         email:email,
//         mobile_number:mobile_number,
//         subject:subject,
//         message:message,
//       },
//       success:function(response){
//         console.log(response);
//       },
//      });
//     });

// var element = document.getElementByClass("deleteButton");
// element.innerHTML = "PROVA PROVA";

$(document).ready(function() {

    $(".delete").click(function(event) {
       
        event.preventDefault();
  
        var id = $('#14').val();
        console.log(id);
  
    });
  
});

