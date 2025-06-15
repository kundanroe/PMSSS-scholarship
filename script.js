$(document).ready(function(){
    $(".toggleBtn").click(function(){
      var target = $(this).data('target');
      
      // Hide all content sections except the one targeted by the clicked button
      $(".content").not("#" + target).slideUp();
  
      // Toggle the specific content section
      $("#" + target).slideToggle();
    });
  });
  