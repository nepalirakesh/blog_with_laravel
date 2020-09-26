
@yield('text_editor')
<script>
    function startTime() {
        let today = new Date();
        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        let ampm= h>=12?'pm':'am';
        h=h%12;
        h= h?h:12;
        m= m<10?'0'+m:m;

        //thsialdfidskkks sidslsdfkjsdlfsdkfskdfjdsf
        document.getElementById('txt').innerHTML =
            h + ":" + m + " " + ampm;
        var t = setTimeout(startTime, 500);
    }

    // add zero in front of numbers < 10 5=05
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        ;
        return i;
    }

</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
