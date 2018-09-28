$('.checkbox').on('change', function() {
   if($('.checkbox:checked').length > 5) {
       this.checked = false;
   }
});

$('.checkbox2').on('change', function() {
   if($('.checkbox2:checked').length > 5) {
       this.checked = false;
   }
});