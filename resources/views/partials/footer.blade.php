<!-- footer -->
<footer class="bg-gray p-3">
    <div class="d-flex justify-content-around align-items-center">
        <img src="{{ URL('img/logo_2.png') }}" style="height: 90px;">       
        <span style="color: #ffffff; font-size: 20px;">【長榮店】<br>地址: 台南市東區長榮路三段6號<br>TEL: (06) 235-1007</span>
        <span style="color: #ffffff; font-size: 20px;">【永康店】<br>地址: 台南市永康區中山南路153號<br>TEL: (06) 2011-281</span>
    </div>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="{{ URL('js/bootstrap.min.js') }}"></script>
<script>
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 100) {        // If page is scrolled more than 100px
            $('#go-top-btn').fadeIn(200);    // Fade in the arrow
        } else {
            $('#go-top-btn').fadeOut(200);   // Else fade out the arrow
        }
    });

    $('#go-top-btn').click(function() {      // When arrow is clicked
        $('body, html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
    });
});
</script>