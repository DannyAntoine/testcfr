
$(function(){
    var $sections=$('.form-section');
    function navigateTo(index){
   
        $sections.removeClass('current').eq(index).addClass('current');
        $('.form-navigation .previous').toggle(index>0);
        var atTheEnd = index >= $sections.length - 1;
        $('.form-navigation .next').toggle(!atTheEnd);
        $('.form-navigation [Type=submit]').toggle(atTheEnd);

        //const step= document.querySelector('.step'+index);
        //step.style.backgroundColor="#17a2b8";
        //step.style.color="white";
    }
    function curIndex(){
        return $sections.index($sections.filter('.current'));
    }
    
    $('.form-navigation .previous').click(function(){
        navigateTo(curIndex() - 1);
   
    });

   

// test
// handles the next function 
$('.form-navigation .next').click(function(){
   // alert("you push the next button from progress .js");
   var currentIndex =curIndex();
   if(currentIndex <$sections.length -1){
       navigateTo(currentIndex + 1);
   }
   
   });


    $sections.each(function(index,section){
        $(section).find(':input').attr('data-parsley-group','block-'+index);
    });
    navigateTo(0);


   
});