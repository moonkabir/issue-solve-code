;jQuery(function($) {
    var value = 4;
    total = $('.products').find('li').length;
    $(function() {
        var increment = 4;
        var startFilter = 0;
        var endFilter = increment;
        var $this = $('.products');
        var elementLength = $this.find('li').length;
        $('.listLength').text(elementLength);
        if (elementLength > 2) {
            $('.buttonToogle').show();
        }
        $('.products .product').slice(startFilter, endFilter).addClass('shown');
        $('.shownLength').text(endFilter);
        $('.products .product').not('.shown').hide();
        $('.buttonToogle .showMore').on('click', function() {
            if (elementLength > endFilter) {
                startFilter += increment;
                endFilter += increment;
                $('.products .product').slice(startFilter, endFilter).not('.shown').addClass('shown').toggle(500);
                $('.shownLength').text((endFilter > elementLength) ? elementLength : endFilter);
                if (elementLength <= endFilter) {
                    $(this).remove();
                }
                
            }
            value = endFilter;
            return value;
        });
    });
    percentage_main = value / total * 100;
    percentage = value / total * 100;
    $(document).ready(function() {
        $('#jq').LineProgressbar({
            percentage: percentage_main,
            ShowProgressCount:true
        });
    });
    $('.buttonToogle .showMore').on('click', function() {
        if (percentage_main <= 100) {
            percentage += percentage_main;
            if(percentage<100){
                $('#jq').LineProgressbar({
                    percentage: percentage,
                    ShowProgressCount:true
                });
            }else{
                $('#jq').LineProgressbar({
                    percentage: 100,
                    ShowProgressCount:true
                });
            }  
        }
    });
});